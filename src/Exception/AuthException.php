<?php
/**
 * @author pfinal南丞
 * @date 2021年06月02日 上午11:31
 */

namespace JustAuth\Exception;


use JustAuth\Config\AuthSource;
use JustAuth\Enums\AuthResponseStatus;

class AuthException extends \RuntimeException
{
    public $error_code;
    public $error_msg;
    public $parameter;

    public function __construct()
    {
        $fun_args = func_get_args();
        var_dump($fun_args);exit();
        if($fun_args[0] instanceof AuthResponseStatus){
            $this->error_code = $fun_args[0]->getKey();
            $this->error_msg = $fun_args[0]->getvalue();
            if(isset($fun_args[1]) && $fun_args[1] instanceof AuthSource){
                $this->parameter = $fun_args[1];
            }
        }elseif ($fun_args[0] instanceof \Throwable){
            $this->error_code = 0;
            $this->error_msg = "";
            $this->parameter = $fun_args[0];
        }elseif (is_int($fun_args[0])){
            $this->error_code = $fun_args[0];
            $this->error_msg = $fun_args[1] ?? "";
            $this->parameter = $fun_args[2] ?? ($fun_args[2] instanceof \Throwable ? $fun_args[2] : null);
        }else{
            $this->error_code = $fun_args[0];
            $this->error_msg = AuthResponseStatus::FAILURE[1];
            $this->parameter = null;
            if(isset($fun_args[1]) && ($fun_args[1] instanceof AuthSource || $fun_args[1] instanceof Throwable)){
                $this->parameter = $fun_args[1];
            }
        }
    }
    public function getErrorCode(): int
    {
        return $this->getCode();
    }

    public function getErrorMsg(): string
    {
        return $this->getMessage();
    }
}