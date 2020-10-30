<?php

namespace App\Http\Controllers;

use App\SearchBuilders\ProductSearchBuilders;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 16;

        $builder = (new ProductSearchBuilders)->onSale()->paginate($perPage, $page);

        if ($search = $request->input('search', '')) {
            // 将搜索词根据空格拆分成数组，并且过滤空想
            $keyWords = array_filter(explode(' ', $search));
            $builder->onKeyWord($keyWords);
        }

        /** 排序处理 */
        if ($order = $request->input('order', '')) {
            // 是否有排序 asc desc
            if (\preg_match('/^(.+)_(asc|desc)$/', $order, $match)) {
                if (in_array($match[1], ['price', 'rating', 'sold_count'])) {
//                    $params['body']['sort'] = [[$match[1] => $match[2]]];
                    $builder->orderBy($match[1], $match[2]);
                }
            }
        }

        $result = app('es')->search($builder->getParameter());

        $productIds = \collect($result['hits']['hits'])->pluck('_id')->all();

        $products = Product::query()
            ->whereIn('id', $productIds)
            ->orderByRaw(\sprintf("FIND_IN_SET(id,'%s')", join(',', $productIds)))
            ->get();

        $pager = new LengthAwarePaginator($products, $result['hits']['total']['value'], $perPage, $page, [
            'path' => route('products.index', false)
        ]);

        return view('products.index', [
            'products' => $pager,
            'filters' => [
                'search' => $search,
                'order' => $order
            ]
        ]);
    }

    public function show(Product $product, Request $request)
    {
        if (!$product->status) {
            throw new \Exception('商品未上架！', 1);
        }
        if (!$product->audit_status) {
            throw new \Exception('等待商品进行审核！', 1);
        }

        $product = $product->where('id', $product->id)->InvalidRequestExceptionwith([
            'skus',
            'productproperties',
            'images',
            'productdescriptions'
        ])->first();

        $images = [];
        foreach ($product->images as $key => $value) {
            foreach ($value->image_url as $k => $image) {
                $images[] = $image;
            }
        }

        return view('products.productdetail', [
            'product' => $product,
            'skus' => $product->skus,
            'properties' => $product->productproperties,
            'images' => $images,
            'productdescriptions' => $product->productdescriptions,
        ]);
    }
}
