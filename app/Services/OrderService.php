<?php


namespace App\Services;

use App\Exceptions\InternalException;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\UserAddress;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Libraries\Pdo;
use Illuminate\Support\Facades\Log;

class OrderService
{
    /**
     * 1 订单ID生成
     * 2 订单编号生成
     * 3 更新收货地址
     * 4 订单提交
     * 5 sku 拆分订单详情
     * 6 库存与订单金额修改
     * 7
     */

    protected $order; // 订单表相关信息
    protected $db1;
    protected $db2;
    protected $db3;

    public function __construct()
    {
        $this->order = $this->tableOrderId();
        $this->db1 = new Pdo('127.0.0.1', 'root', '', 'lms_users');
        $this->db2 = new Pdo('127.0.0.1', 'root', '', 'lms_products');
        $this->db3 = new Pdo('127.0.0.1', 'root', '', 'lms_orders');

    }


    public function addOrder(User $user, UserAddress $userAddresses, $remark, $items, $shop)
    {
        $xa1 = uniqid('');
        $xa2 = uniqid('');
        $xa3 = uniqid('');
        $this->start($xa1, $xa2, $xa3);
        try {
            $addresses = $this->updateUserAddresses($userAddresses);
            $order = $this->commitOrder($user, $userAddresses, $remark);

            $totalAmount = 0;
            foreach ($items as $item) {
                // 查询商品
                $productSkuData = [
                    'table' => 'lms_product_skus',
                    'field' => 'id,price,product_id,stock',
                    'where' => 'id =' . $item['sku_id'],
                ];
                $productRes = $this->db2->getOne($productSkuData);

                // 拆分订单到订单详情
                $orderItemsData = [
                    'table' => 'lms_order_items' . $this->order['random'],
                    'data' => [
                        'order_id' => $this->order['id'],
                        'product_id' => intval($productRes['product_id']),
                        'product_sku_id' => intval($item['sku_id']),
                        'amount' => $item['amount'],
                        'price' => $productRes['price'],
                        'reviewed_at' => Carbon::now(),
                    ],
                ];

                $orderItemsRes = $this->db3->add($orderItemsData);
                if (!$orderItemsRes || !in_array($orderItemsRes, [0, 1])) {
                    throw new InternalException("订单详情生成失败～", 102);
                }

                // 订单总金额
                $totalAmount += $productRes['price'] * $item['amount'];
                if (!$productRes['stock'] <= $item['amount']) {
                    // 减少库存
                    $stockAmount = $productRes['stock'] - $item['amount'];
                    $stockData = [
                        'table' => 'lms_product_skus',
                        'data' => [
                            'stock' => $stockAmount,
                        ],
                        'where' => 'id =' . $item['sku_id'],
                    ];
                    $skuStock = $this->db2->update($stockData);
                    if (!$skuStock || !in_array($skuStock, [0, 1])) {
                        throw new InternalException("该商品库存更新失败～", 103);
                    }
                } else {
                    throw new InternalException("该商品库存不够～", 104);
                }
            }
            // 更新订单总金额
            $totalAmountData = [
                'table' => 'lms_orders' . $this->order['random'],
                'data' => [
                    'total_amount' => $totalAmount,
                ],
                'where' => 'id =' . $this->order['id'],
            ];
            $orderAmountRes = $this->db3->update($totalAmountData);
            if (!$orderAmountRes || !in_array($orderAmountRes, [0, 1])) {
                throw new InternalException("该订单金额更新失败～", 105);
            }
            /** 用户订单索引表 */
            $this->userOrder($user);

            /** 商铺订单索引表 */
            $this->shopOrder($shop);

            // 阶段一 事务停止准备提交
            $this->end($xa1, $xa2, $xa3);
            $this->prepare($xa1, $xa2, $xa3);

            // 提交事务
            $this->commit($xa1, $xa2, $xa3);
        } catch (\Exception $e) {
            // 阶段一 事务停止准备回滚
            $this->end($xa1, $xa2, $xa3);
            $this->prepare($xa1, $xa2, $xa3);
            // 事务回滚
            $this->rollback($xa1, $xa2, $xa3);
            die('Exception: ' . $e->getMessage() . $e->getLine());
        }
        return ['id' => $this->order['id'], 'table' => 'lms_orders' . $this->order['random']];
    }

    /**
     *  生成订单
     * @param $user
     * @param $address
     * @param $remark
     * @return bool
     * @throws InternalException
     */
    private function commitOrder($user, $address, $remark)
    {
        $order = [
            'table' => 'lms_orders' . $this->order['random'],
            'data' => [
                'id' => $this->order['id'],
                'no' => $this->findAvailableNo(),
                'user_id' => $user->id,
                'address' => json_encode([
                    'address' => $address->full_address,
                    'zip' => $address->zip,
                    'contact_name' => $address->contact_name,
                    'contact_phone' => $address->contact_phone,
                ]),
                'remark' => $remark,
                'total_amount' => 200,
            ]
        ];
        $orderRes = $this->db3->add($order);
        if (!$orderRes || !in_array($orderRes, [0, 1])) {
            throw new InternalException("订单生成失败～", 101);
        } else {
            return true;
        }
    }

    /** 生成订单索引表数据 */
    public function userOrder($user)
    {
        $random = $user->id % 32;
        $order = [
            'table' => 'lms_user_orders' . $random,
            'data' => [
                'user_id' => $user->id,
                'order_id' => $this->order['id'],
            ]
        ];
        $orderRes = $this->db3->add($order);
        if (!$orderRes || !in_array($orderRes, [0, 1])) {
            throw new InternalException("新增用户订单索引失败～", 101);
        } else {
            return true;
        }
    }

    public function shopOrder($shop)
    {
        $random = $shop % 32;
        $order = [
            'table' => 'lms_shop_orders' . $random,
            'data' => [
                'shop_id' => $shop,
                'order_id' => $this->order['id'],
            ]
        ];
        $orderRes = $this->db3->add($order);
        if (!$orderRes || !in_array($orderRes, [0, 1])) {
            throw new InternalException("新增商铺订单索引失败～", 101);
        } else {
            return true;
        }
    }

    /**
     * 事务准备
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    private function prepare($XA1, $XA2, $XA3)
    {
        $this->db1->exec("XA PREPARE '$XA1'");
        $this->db2->exec("XA PREPARE '$XA2'");
        $this->db3->exec("XA PREPARE '$XA3'");
    }

    /**
     * 事务开启
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    private function start($XA1, $XA2, $XA3)
    {
        $this->db1->exec("XA START '$XA1'");
        $this->db2->exec("XA START '$XA2'");
        $this->db3->exec("XA START '$XA3'");
    }

    /**
     * 事务提交
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    private function commit($XA1, $XA2, $XA3)
    {
        $this->db1->exec("XA COMMIT '$XA1'");
        $this->db2->exec("XA COMMIT '$XA2'");
        $this->db3->exec("XA COMMIT '$XA3'");
    }

    /**
     * 事务回滚
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    private function rollback($XA1, $XA2, $XA3)
    {
        $this->db1->exec("XA ROLLBACK '$XA1'");
        $this->db2->exec("XA ROLLBACK '$XA2'");
        $this->db3->exec("XA ROLLBACK '$XA3'");
    }


    /**
     * 事务结束
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    private function end($XA1, $XA2, $XA3)
    {
        $this->db1->exec("XA END '$XA1'");
        $this->db2->exec("XA END '$XA2'");
        $this->db3->exec("XA END '$XA3'");
    }

    /**
     * 订单ID生成
     * @return array
     * @throws \Exception
     */
    private function tableOrderId()
    {
        $user = Auth::user();
        $timestamp = Carbon::now()->timestamp . now()->micro;
        $random = \str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $orderId = $timestamp . $user->id . $random;

        return ['id' => $orderId, 'random' => $random % 32];
    }

    /**
     * 订单号码生成
     * @return false|string
     * @throws \Exception
     */
    private function findAvailableNo()
    {
        // 订单流水号前缀
        $prefix = date('YmdHis');
        for ($i = 0; $i < 10; $i++) {
            // 随机生成 6 位的数字
            $no = $prefix . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            // 判断是否已经存在
            return $no;
        }
        Log::warning('find order no failed');

        return false;
    }

    /**
     * 修改地址最后使用的时间
     * @param $userAddresses
     * @return bool
     */
    private function updateUserAddresses($userAddresses)
    {
        $userAddressesData = [
            'table' => 'lms_user_address',
            'data' => [
                'last_used_at' => Carbon::now(),
            ],
            'where' => 'id=' . $userAddresses->id
        ];
        $userAddressesRes = $this->db1->update($userAddressesData);
        if (!$userAddressesRes || !in_array($userAddressesRes, [0, 1])) {
            throw new InternalException("修改地址最后使用的时间错误～", 100);
        } else {
            return true;
        }
    }
}
