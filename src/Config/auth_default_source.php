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
     *  微博
     */
    "WEIBO"  => [
        'authorize'   => "https://api.weibo.com/oauth2/authorize",
        'accessToken' => "https://api.weibo.com/oauth2/access_token",
        'userInfo'    => "https://api.weibo.com/2/users/show.json",
        'revoke'      => "https://api.weibo.com/oauth2/revokeoauth2",
    ],

    /**
     * 码云
     */
    "GITEE"  => [
        "authorize" =>"https://gitee.com/oauth/authorize",
        "accessToken" =>"https://gitee.com/oauth/token",
        "userInfo" =>"https://gitee.com/api/v5/user"
    ]
];

