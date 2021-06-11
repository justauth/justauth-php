<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午6:18
 */

if (!function_exists('millisecondWay')) {
    /**
     * 获取一个毫秒级的时间戳 13位
     * @return float
     */
    function millisecondWay(): float
    {
        ini_set('date.timezone', 'PRC');
        list($msec, $sec) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    }
}