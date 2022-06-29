<?php
return [
    'enable'  => true,
    'api_doc' => [
        // 文档标题
        'title'         => 'webman-APi接口文档',
        // 版权申明
        'copyright'     => 'Powered By HuiCMF',
        //需要生成文档的控制器
        'class'         => [
            'app\\api\\controller\\UserController',
        ],
        //作者
        'author'        => '小灰灰',
        // 密码验证配置
        'auth'          => [
            // 是否启用密码验证
            'with_auth'     => false,
            // 验证密码
            'auth_password' => "123456",
        ],
        // 过滤、不解析的方法名称
        'filter_method' => [
            '_empty',
            '_initialize',
            '__construct',
            '__destruct',
            '__get',
            '__set',
            '__isset',
            '__unset',
            '__cal',
        ],
    ]
];
