<?php
return [
    'github' => [
        'client_id'     => env('GITHUB_CLIENT_ID', ''),
        'redirect_uri'  => env('GITHUB_CALLBACK', ''),
        'client_secret' => env('GITHUB_SECRET', ''),
    ],
    'gitee'  => [
        'client_id'     => env('GITEE_CLIENT_ID', '1b6f294f8a949a9eda9bc52d5c6514fdd61f7fdd05aec890f1611ba4281bf8e3'),
        'client_secret' => env('GITEE_SECRET', 'b297579d782c289d1a1988f5886d7dbdfc4dc301a8b9edfa8977b4c153a42717'),
        'redirect_uri'  => env('GITEE_CALLBACK', 'http://3646x08n70.zicp.vip/test/Web/giteecallback.php'),
    ],
    'weibo'  => [
        'client_id'     => env('WEIBO_CLIENT_ID', ''),
        'redirect_url'  => env('WEIBO_CALLBACK', ''),
        'client_secret' => env('WEIBO_SECRET', ''),
    ],
    'douyin' => [
        'client_id'     => env('WEIBO_CLIENT_ID', ''),
        'redirect_uri'  => env('WEIBO_CALLBACK', ''),
        'client_secret' => env('WEIBO_SECRET', ''),
        'state'         => env('WEIBO_STATE', ''),
    ],
    'weixin' => [
        'client_id'     => env('WEIXIN_CLIENT_ID', ''),
        'redirect_uri'  => env('WEIXIN_CALLBACK', ''),
        'client_secret' => env('WEIXIN_SECRET', ''),
    ],
    'qq'     => [
        'client_id'     => env('QQ_CLIENT_ID', ''),
        'redirect_uri'  => env('QQ_CALLBACK', ''),
        'client_secret' => env('QQ_SECRET', ''),
    ],
    'huawei' => [
        'client_id'     => env('HUAWEI_CLIENT_ID', ''),
        'redirect_uri'  => env('HUAWEI_CALLBACK', ''),
        'client_secret' => env('HUAWEI_SECRET', ''),
        'scope'         => env('HUAWEI_SECRET', ''),
        'state'         => env('HUAWEI_STATE', ''),
    ],
    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID', ''),
        'redirect_uri'  => env('GOOGLE_CALLBACK', ''),
        'client_secret' => env('GOOGLE_SECRET', ''),
    ],
    'baidu'  => [
        'client_id'    => env('BAIDU_CLIENT_ID', '24327410'),
        'redirect_uri' => env('BAIDU_CALLBACK', ''),
        'client_secret' => env('GOOGLE_SECRET', 'cylPe0ReyOEsxIdXpKDq5hFG69oGQ3AV'),
    ]
];