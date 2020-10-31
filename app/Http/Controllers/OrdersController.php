<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\UserOrder;
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


    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $orderListInfo = UserOrder::query()->where('user_id', $userId)->get();
        $orders = [];
        foreach ($orderListInfo as $key => $orderInfo) {
            $order = Order::query()->where('id', $orderInfo->order_id)->first();
            if (!empty($order)) {
                $orders[$key]['order'] = $order;
                $orderItems = OrderItem::query()->where('order_id', $order['id'])->get()->toArray();
                foreach ($orderItems as $k => $orderItem) {
                    $products = Product::query()->with('skus')->where('id', $orderItem['product_id'])->first()->toArray();
                    $orders[$key]['order']['items'][$k] = $orderItem;
                    $orders[$key]['order']['items'][$k]['product'] = $products;
                }
            }
        }
        dd($orders);
    }


    private function table_suffix($random)
    {
        $suffix = $random % 32;
        return 'orders' . $suffix;
    }
}
