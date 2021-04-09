<?php
/**
 * JustAuth配置类
 * @author pfinal南丞
 * @date 2021年04月06日 下午5:36
 */
return [
    /**
     * Github
     */
    "github" => [
        'AppId'       => "https://github.com/login/oauth/authorize",
        'AppKey'      => "https://github.com/login/oauth/access_token",
        'CallBackUrl' => "https://api.github.com/user",
    ],
    "gitee" => [
        'AppId'       => "1b6f294f8a949a9eda9bc52d5c6514fdd61f7fdd05aec890f1611ba4281bf8e3",
        'AppKey'      => "b297579d782c289d1a1988f5886d7dbdfc4dc301a8b9edfa8977b4c153a42717",
        'CallBackUrl' => "https://test.login",
    ],
];