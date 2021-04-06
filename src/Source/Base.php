<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午6:50
 */

namespace JustAuth\Source;

class Base
{
//    use AuthRequestConfig;
    public function __call($action, $arguments)
    {
        var_dump($action);
        exit();
    }

}