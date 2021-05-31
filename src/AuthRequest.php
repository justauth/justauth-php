<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午6:16
 */

namespace JustAuth;


use JustAuth\Source\Base;

class AuthRequest
{
    protected $link;

    protected function driver(): AuthRequest
    {
        $this->link = new Base();
        return $this;
    }

    public function __call($name, $arguments)
    {
        if (is_null($this->link)) {
            $this->driver();
        }
        return call_user_func_array([$this->link, $name], $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([static::single(), $name], $arguments);
    }

    public static function single()
    {
        static $link;
        if (is_null($link)) {
            $link = new static();
        }
        return $link;
    }
}