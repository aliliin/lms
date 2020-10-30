<?php

namespace App\Http\Controllers;


use App\Models\ProductSku;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Http\Requests\AddCartRequest;
use App\Models\CartItem;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(cartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function add(AddCartRequest $request)
    {
        $this->cartService->addCart($request->input('sku_id'),
            $request->input('num'));
        return [];
    }

    public function index(Request $request)
    {
        $cartItems = $this->cartService->getCartProducts();
//        $cartItems = $request->user()->cartItems()->with(['productSku.product', 'productSku.product.shop'])->get();
        $address = $request->user()->address()->orderBy('last_used_at', 'DESC')->get();
        return view('products.cart', ['cartItems' => $cartItems, 'addresses' => $address]);
    }

    public function remove(ProductSku $productSku, Request $request)
    {
        $this->cartService->remove($productSku->id);
        return [];
    }
}
