<?php

namespace App\Http\Requests;

use App\Models\ProductSku;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrdersRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 判断用户提交的地址ID是否存在且属于此用户
            'address_id' => [
                'required',
                Rule::exists('user_address', 'id')->where('user_id', $this->user()->id),
            ],
            'items' => ['required', 'array'],
            'items.*.sku_id' => [
                'required',
                function ($attribute, $skuId, $fail) {
                    if (!$sku = ProductSku::find($skuId)) {
                        return $fail('该商品不存在');
                    }
                    if (!$sku->product->status) {
                        return $fail('商品未上架！');
                    }
                    if (!$sku->stock === 0) {
                        return $fail('商品已经售完！');
                    }
                    // 获取当前索引
                    preg_match('/items\.(\d+)\.sku_id/', $attribute, $m);
                    $index = $m[1];
                    // 根据索引找到用户提交的购买数量
                    $amount = $this->input('items')[$index]['amount'];
                    if ($amount > 0 && $amount > $sku->stock) {
                        return $fail('该商品库存不足');
                    }
                }
            ],
            'items.*.amount' => ['required', 'integer', 'min:1'],
        ];
    }
}
