<?php
return [
    'github'        => [
        'client_id'     => env('GITHUB_CLIENT_ID', ''),
        'redirect_uri'  => env('GITHUB_CALLBACK', ''),
        'client_secret' => env('GITHUB_SECRET', ''),
    ],
    'gitee'         => [
        'client_id'     => env('GITEE_CLIENT_ID', ''),
        'client_secret' => env('GITEE_SECRET', ''),
        'redirect_uri'  => env('GITEE_CALLBACK', ''),
    ],
    'weibo'         => [
        'client_id'     => env('WEIBO_CLIENT_ID', ''),
        'redirect_url'  => env('WEIBO_CALLBACK', ''),
        'client_secret' => env('WEIBO_SECRET', ''),
    ],
    'douyin'        => [
        'client_id'     => env('WEIBO_CLIENT_ID', ''),
        'redirect_uri'  => env('WEIBO_CALLBACK', ''),
        'client_secret' => env('WEIBO_SECRET', ''),
        'state'         => env('WEIBO_STATE', ''),
    ],
    'weixin'        => [
        'client_id'     => env('WEIXIN_CLIENT_ID', ''),
        'redirect_uri'  => env('WEIXIN_CALLBACK', ''),
        'client_secret' => env('WEIXIN_SECRET', ''),
    ],
    'qq'            => [
        'client_id'     => env('QQ_CLIENT_ID', ''),
        'redirect_uri'  => env('QQ_CALLBACK', ''),
        'client_secret' => env('QQ_SECRET', ''),
    ],
    'huawei'        => [
        'client_id'     => env('HUAWEI_CLIENT_ID', ''),
        'redirect_uri'  => env('HUAWEI_CALLBACK', ''),
        'client_secret' => env('HUAWEI_SECRET', ''),
        'scope'         => env('HUAWEI_SECRET', ''),
        'state'         => env('HUAWEI_STATE', ''),
    ],
    'google'        => [
        'client_id'     => env('GOOGLE_CLIENT_ID', ''),
        'redirect_uri'  => env('GOOGLE_CALLBACK', ''),
        'client_secret' => env('GOOGLE_SECRET', ''),
    ],
    'baidu'         => [
        'client_id'     => env('BAIDU_CLIENT_ID', ''),
        'redirect_uri'  => env('BAIDU_CALLBACK', ''),
        'client_secret' => env('GOOGLE_SECRET', ''),
    ],
    'oschina'       => [
        'client_id'     => env('OSCHINA_CLIENT_ID', ''),
        'redirect_uri'  => env('OSCHINA_CALLBACK', ''),
        'client_secret' => env('OSCHINA_SECRET', ''),
    ],
    'stackoverflow' => [
        'client_id'     => env('OSCHINA_CLIENT_ID', ''),
        'redirect_uri'  => env('OSCHINA_CALLBACK', ''),
        'client_secret' => env('OSCHINA_SECRET', ''),
        'client_key'    => env('OSCHINA_SECRET', ''),
    ],
    'dingtalk'      => [
        'client_id'     => env('OSCHINA_CLIENT_ID', 'dingoaot7zvjufgpczovnh'),
        'redirect_uri'  => env('OSCHINA_CALLBACK', 'http://3646x08n70.zicp.vip/test/Web/dingtalkcallback.php'),
        'client_secret' => env('OSCHINA_SECRET', 'imZeDdjjapSejLDZ3IBhW9qbSj9gjtxOGzBb_7Aq_ZlQ2eodCgM3ScQNQFGtk_d1'),
    ]
];