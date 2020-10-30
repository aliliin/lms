<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UserAddress;
use App\Models\Order;

class OrdersController extends Controller
{
    public function store(OrdersRequest $request, OrderService $orderService)
    {
        $user = $request->user();
        /** 收货地址 */
        $userAddress = UserAddress::find($request->address_id);
        return $orderService->addOrder($user, $userAddress,
            $request->input('remark'),
            $request->input('items'),
            $request->input('shop_id'));
    }

    private function table_suffix($random)
    {
        $suffix = $random % 32;
        return 'orders' . $suffix;
    }
}
