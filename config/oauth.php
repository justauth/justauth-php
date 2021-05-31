<?php
return [

    'github' => [
        'client_id'=>env('GITHUB_CLIENT_ID',''),
        'redirect_uri'=>env('GITHUB_CALLBACK',''),
        'client_secret'=>env('GITHUB_SECRET',''),
    ],
    'gitee' => [
        'client_id'=>env('GITEE_CLIENT_ID',''),
        'redirect_uri'=>env('GITEE_CALLBACK',''),
        'client_secret'=>env('GITEE_SECRET',''),
    ],
    'weibo' => [
        'client_id'=>env('WEIBO_CLIENT_ID',''),
        'redirect_uri'=>env('WEIBO_CALLBACK',''),
        'client_secret'=>env('WEIBO_SECRET',''),
    ]
];