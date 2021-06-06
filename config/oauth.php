<?php
return [
    'github' => [
        'client_id'     => env('GITHUB_CLIENT_ID', 'f4687fdd6801354516b3'),
        'redirect_url'  => env('GITHUB_CALLBACK', 'dev.local.justauth.cn/test/Github/index.php'),
        'client_secret' => env('GITHUB_SECRET', '03201d93b38f7eac722899420aaa35e6f375a8c4'),
    ],
    'gitee'  => [
        'client_id'     => env('GITEE_CLIENT_ID', ''),
        'redirect_url'  => env('GITEE_CALLBACK', ''),
        'client_secret' => env('GITEE_SECRET', ''),
    ],
    'weibo'  => [
        'client_id'     => env('WEIBO_CLIENT_ID', ''),
        'redirect_url'  => env('WEIBO_CALLBACK', ''),
        'client_secret' => env('WEIBO_SECRET', ''),
    ],
    'douyin' => [
        'client_id'     => env('WEIBO_CLIENT_ID', ''),
        'redirect_url'  => env('WEIBO_CALLBACK', ''),
        'client_secret' => env('WEIBO_SECRET', ''),
        'state'         => env('WEIBO_STATE', ''),
    ],
    'weixin' => [
        'client_id'     => env('WEIXIN_CLIENT_ID', ''),
        'redirect_url'  => env('WEIXIN_CALLBACK', ''),
        'client_secret' => env('WEIXIN_SECRET', ''),
    ],
    'qq'     => [
        'client_id'     => env('QQ_CLIENT_ID', ''),
        'redirect_url'  => env('QQ_CALLBACK', ''),
        'client_secret' => env('QQ_SECRET', ''),
    ],
    'huawei' => [
        'client_id'     => env('HUAWEI_CLIENT_ID', ''),
        'redirect_url'  => env('HUAWEI_CALLBACK', ''),
        'client_secret' => env('HUAWEI_SECRET', ''),
        'scope'         => env('HUAWEI_SECRET', ''),
        'state'         => env('HUAWEI_STATE', ''),
    ]
];