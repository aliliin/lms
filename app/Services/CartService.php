<?php


namespace App\Services;


use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function getCartProducts()
    {
        return Auth::user()->cartItems()->with(['productSku.product'])->get();
    }

    public function addCart($skuId, $amount)
    {
        $user = Auth::user();
        if ($cart = $user->cartItems()->where('product_sku_id', $skuId)->first()) {
            // 存在就增加商品数量
            $cart->update([
                'amount' => $cart->amount + $amount,
            ]);
        } else {
            // 新建一个购物车
            $cart = new CartItem(['amount' => $amount]);
            $cart->user()->associate($user);
            $cart->productSku()->associate($skuId);
            $cart->save();
        }
        return $cart;
    }

    public function remove($skuIds)
    {
        if (!is_array($skuIds)) {
            $skuIds = [$skuIds];
        }
        return Auth::user()->cartItems()->whereIn('product_sku_id', $skuIds)->delete();
    }
}
