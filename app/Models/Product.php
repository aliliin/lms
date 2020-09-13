<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    protected $connection = 'mysql_products';

    protected $fillable = [
        'product_core', 'title', 'category_id', 'status',
        'audit_status', 'shop_id', 'description_id', 'rating',
        'sold_count', 'review_count', 'price', 'image'
    ];

    protected $casts = [
        'status' => 'boolean', // on_sale 是一个布尔类型的字段
    ];

    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function productdescriptions()
    {
        return $this->hasOne(ProductDescription::class);
    }

    public function productproperties()
    {
        return $this->hasMany(ProductProperties::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function toESArray()//数据的来源
    {
        // 只取出需要的字段
        $arr = Arr::only($this->toArray(), [
            'id',
            'product_core',
            'title',
            'long_title',
            'bar_code',
            'status',
            'audit_status',
            'rating',
            'sold_count',
            'review_count',
            'price',
            'image'
        ]);

        // 如果商品有类目，则 category 字段为类目名数组，否则为空字符串
        $arr['category'] = $this->category ? explode(' - ', $this->category->full_name) : '';
        // 类目的 path 字段
        $arr['category_path'] = $this->category ? $this->category->path : '';

        // strip_tags 函数可以将 html 标签去除
        if (!empty($this->productdescriptions["description"])) {
            $arr['description'] = strip_tags($this->productdescriptions["description"]);
        }else{
            dd($this);
        }
        // 只取出需要的 SKU 字段
        $arr['skus'] = $this->skus->map(function (ProductSku $sku) {
            return Arr::only($sku->toArray(), ['title', 'description', 'price']);
        });
        $arr['shop_name'] = $this->shop->name;
        // 只取出需要的商品属性字段
        $arr['properties'] = $this->productproperties->map(function (ProductProperties $property) {
            return Arr::only($property->toArray(), ['name', 'value']);
        });

        $arr['images'] = $this->images->map(function (ProductImage $productimage) {
            return Arr::only($productimage->toArray(), ['image_url']);
        });

        return $arr;
    }
}
