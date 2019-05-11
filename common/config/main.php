<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // https://www.yiiframework.com/extension/yiisoft/yii2-elasticsearch/doc/guide/2.1/en/usage-ar
//        'elasticsearch' => [
//            'class' => 'yii\elasticsearch\Connection',
//            'nodes' => [
//                ['http_address' => '127.0.0.1:9200'],
//            ],
//        ],
    ],
];
