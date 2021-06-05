<?php
return [
    'github' => [
        'client_id'=>env('GITHUB_CLIENT_ID','f4687fdd6801354516b3'),
        'redirect_url'=>env('GITHUB_CALLBACK','dev.local.justauth.cn/test/github/index.php'),
        'client_secret'=>env('GITHUB_SECRET','03201d93b38f7eac722899420aaa35e6f375a8c4'),
    ],
    'gitee' => [
        'client_id'=>env('GITEE_CLIENT_ID','f4687fdd6801354516b3'),
        'redirect_url'=>env('GITEE_CALLBACK','dev.local.justauth.cn/test/gitee/index.php'),
        'client_secret'=>env('GITEE_SECRET','03201d93b38f7eac722899420aaa35e6f375a8c4'),
    ],
    'weibo' => [
        'client_id'=>env('WEIBO_CLIENT_ID',''),
        'redirect_url'=>env('WEIBO_CALLBACK',''),
        'client_secret'=>env('WEIBO_SECRET',''),
    ]
];