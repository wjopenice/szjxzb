<?php

return [
    'adminEmail' => 'admin@example.com',
    'type'=> "mysql",
    'dbname'=> "yii2shop",
    'host'=> "116.62.79.121",
    'charset'=> "utf8",
    'port' => "3306",
    'user' => "admin",
    'pass' => "admin2018",
    'prefix' => "shop_",

    //订单
    'ORDER_STATUS' =>[
        0 => '待确认',
        1 => '已确认',
        2 => '已收货',
        3 => '已取消',                
        4 => '已完成',//评价完
        5 => '已作废',
    ],
    'SHIPPING_STATUS' => array(
        0 => '未发货',
        1 => '已发货',
        2 => '部分发货'
    ),
    'PAY_STATUS' => array(
        0 => '未支付',
        1 => '已支付',
        2 => '部分支付',
        3 => '已退款',
        4 => '拒绝退款'
    ),
    'PAY_NAME' => array(
        1 => '支付宝扫码',
        2 => '微信扫码',
        3 => 'H5支付宝',
        4 => 'H5微信'
    ),
];
