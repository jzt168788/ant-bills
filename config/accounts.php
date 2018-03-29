<?php
/**
 * Created by PhpStorm.
 * User: jinzhuotao
 * Date: 2018/3/29
 * Time: 上午11:29
 */

return [
    //开发环境
    'dev' => [
        'oss' => [
            'accessKeyId'       => 'LTAIFxz1pWcMpXiG',
            'accessKeySecret'   => '02cWnVVWK3yLyqoIw9w2P1pDG3RjFc',
            'endpoint'          => 'oss-cn-zhangjiakou.aliyuncs.com',
            'bucket'            => 'dev-ant-bills',
        ],
    ],

    //生产环境
    'production' => [
        'oss' => [
            'accessKeyId'       => 'LTAIFxz1pWcMpXiG',
            'accessKeySecret'   => '02cWnVVWK3yLyqoIw9w2P1pDG3RjFc',
            'endpoint'          => 'oss-cn-zhangjiakou-internal.aliyuncs.com',
            'bucket'            => 'ant-bills',
        ],
    ],
];