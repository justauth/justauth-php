<?php
return [
    'github' => [
        'client_id'=>env('GITHUB_CLIENT_ID',''),
        'redirect_uri'=>env('GITHUB_CALLBACK',''),
        'client_secret'=>env('GITHUB_SECRET',''),
    ],
    'gitee' => [
        'client_id'=>env('GITEE_CLIENT_ID','1b6f294f8a949a9eda9bc52d5c6514fdd61f7fdd05aec890f1611ba4281bf8e3'),
        'redirect_uri'=>env('GITEE_CALLBACK','dev.local.justauth.cn'),
        'client_secret'=>env('GITEE_SECRET','b297579d782c289d1a1988f5886d7dbdfc4dc301a8b9edfa8977b4c153a42717'),
    ],
    'weibo' => [
        'client_id'=>env('WEIBO_CLIENT_ID',''),
        'redirect_uri'=>env('WEIBO_CALLBACK',''),
        'client_secret'=>env('WEIBO_SECRET',''),
    ]
];