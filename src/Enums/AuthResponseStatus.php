<?php
/**
 * @author pfinal南丞
 * @date 2021年06月02日 上午11:13
 */

namespace JustAuth\Enums;


class AuthResponseStatus extends \SplEnum
{
    /**
     * 2000：正常；
     * other：调用异常
     */
    const SUCCESS = [2000, "Success"];
    const FAILURE = [5000, "Failure"];
    const NOT_IMPLEMENTED = [5001, "Not Implemented"];
    const PARAMETER_INCOMPLETE = [5002, "Parameter incomplete"];
    const UNSUPPORTED = [5003, "Unsupported operation"];
    const NO_AUTH_SOURCE = [5004, "AuthDefaultSource cannot be null"];
    const UNIDENTIFIED_PLATFORM = [5005, "Unidentified platform"];
    const ILLEGAL_REDIRECT_URI = [5006, "Illegal redirect uri"];
    const ILLEGAL_REQUEST = [5007, "Illegal request"];
    const ILLEGAL_CODE = [5008, "Illegal code"];
    const ILLEGAL_STATUS = [5009, "Illegal state"];
    const REQUIRED_REFRESH_TOKEN = [5010, "The refresh token is required; it must not be null"];

    const CONFIG_ERROR = [5011,"Incorrect configuration information"];



}