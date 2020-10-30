<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UserAddress;
use App\Models\Order;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();
        $timestamp = Carbon::now()->timestamp . now()->micro;
        $orderId = $timestamp . $user->id .
            \str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        /** 收货地址 */
        $address = UserAddress::find($user->id);
        $address->update(['last_used_at' => Carbon::now()]);// 最后一次使用过的地址

        $table = $this->table_suffix(substr($orderId, -6));

        $order = new Order([
            'id' => $orderId,
            'address' => [
                'address' => $address->full_address,
                'zip' => $address->zip,
                'contact_name' => $address->contact_name,
                'contact_phone' => $address->contact_phone,
            ],
            'remark' => 222,
            'total_amount' => 200.23,
        ]);

        $order->user()->associate($user);

        $order->setTable($table); //更改订单表的名称

        if ($order->save()) {
            return '订单生成成功,当前订单数据表' . $table;
        } else {
            return '订单生成失败～';
        }
    }

    private function table_suffix($random)
    {
        $suffix = $random % 32;
        return 'orders' . $suffix;
    }
}
