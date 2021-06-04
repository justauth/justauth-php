<?php
/**
 * @author pfinal南丞
 * @date 2021年06月02日 上午11:13
 */

namespace JustAuth\Enums;


use pf\enum\Enum;

class AuthResponseStatus extends Enum
{
    /** @msg('success') */
    const SUCCESS = 2000;
    /** @msg('FAILURE') */
    const FAILURE = 5000;
    /** @msg('Not Implemented') */
    const NOT_IMPLEMENTED = 5001;
    /** @msg('Parameter incomplete') */
    const PARAMETER_INCOMPLETE = 5002;
    /** @msg('Unsupported operation') */
    const UNSUPPORTED = 5003;
    /** @msg('AuthDefaultSource cannot be null') */
    const NO_AUTH_SOURCE = 5004;
    /** @msg('Unidentified platform') */
    const UNIDENTIFIED_PLATFORM = 5005;
    /** @msg('Illegal redirect uri') */
    const ILLEGAL_REDIRECT_URI = 5006;
    /** @msg('Illegal request') */
    const ILLEGAL_REQUEST = 5007;
    /** @msg('Illegal code') */
    const ILLEGAL_CODE = 5008;
    /** @msg('Illegal state') */
    const ILLEGAL_STATUS = 5009;
    /** @msg('Config Error') */
    const CONFIG_ERROR=5010;


}