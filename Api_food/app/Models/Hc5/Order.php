<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $redis;

    protected $id_order;
    protected $code_product;
    protected $status_order;
    protected $data_start_order;
    protected $data_start_job;
    protected $data_end_job;


    const STATUS_WAIT   = 3;
    const STATUS_JOB    = 2;
    const STATUS_READY  = 1;


    public function __construct()
    {
        $redis = new \Redis();
        $redis->connect('redis', 6379);
        $this->redis = $redis;
    }

    public function createOrder( int $id_product)
    {
        if($id_product == null) return 0;
        $redis = $this->redis;

        $code_product = $id_product;
        $status_order = self::STATUS_WAIT;
        $data_start_order = time();

        $last_order = $redis->get('lastorder');
        if($last_order == null){
            $redis->set('lastorder', 1);
            $id_oder = 1;
        }   else {
            $id_oder = $redis->incr('lastorder');
        }

        $redis->hMSet("order:$id_oder", [
            'code_product' => $code_product,
            'status_order' => $status_order,
            'data_start_order' => $data_start_order
        ]);

    }

    public function deleteOrder( int $id_order)
    {
        $redis = $this->redis;

        return $order = $redis->del("order:$id_order");

    }

    public function getAll()
    {
        $redis = $this->redis;

        $orders = $redis->keys('order:*');

        $list_order = array();
        foreach ($orders as $key)
        {
            $id = explode(':', $key);
            $order = $redis->hGetAll($key);
            $order["$id[0]"] = $id[1];


            $list_order[] = $order;

        }

        return $list_order;
    }


}
