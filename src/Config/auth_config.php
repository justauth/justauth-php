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
    ]
];