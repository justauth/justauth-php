<?php
/**
 *  支持平台配置
 * @author pfinal南丞
 * @date 2021年04月06日 下午5:39
 */

return [
    /**
     * Github
     */
    "GITHUB" => [
        'authorize'   => "https://github.com/login/oauth/authorize",
        'accessToken' => "https://github.com/login/oauth/access_token",
        'userInfo'    => "https://api.github.com/user",
    ],
    /**
     * 码云
     */
    "gitee"  => [
        "authorize" =>"https://gitee.com/oauth/authorize",
        "accessToken" =>"https://gitee.com/oauth/token",
        "userInfo" =>"https://gitee.com/api/v5/user"
    ]
];

