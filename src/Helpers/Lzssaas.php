<?php
/**
 * @author leizhishang <info@leizhishang.com>
 * @copyright ©2016-2100 leizhishang.com
 * @license http://www.leizhishang.com
 */
use Jenssegers\Agent\Agent;                         //Agent
use Illuminate\Support\Facades\Mail;                //邮箱服务
use Illuminate\Support\Facades\Auth;                //认证
/**
 * 读取配置信息
 *
 * @param str $name
 * @param str $key
 * @return str|array
 */

if ( ! function_exists('hst_config'))
{
	function lzssaas_config($namespace = '', $name  = null)
    {
        $arrConfig = CommonConfigModel::get($namespace, $name);
        return $arrConfig;
    }
}

/**
 * 读取配置信息
 *
 * @param str $name
 * @param str $key
 * @return str|array
 */

if ( ! function_exists('lzssaas_save_config'))
{
	function lzssaas_save_config($namespace, $data = array())
    {
        $arrConfig = CommonConfigModel::saveVals($namespace, $data);
        return $arrConfig;
    }
}



/**
 * lang
 *
 * @return
 */
if( ! function_exists('lzssaas_lang'))
{
    function lzssaas_lang($v = '', $v2 = '') 
    {
        $v2 = $v2 ? trans($v2) : '';
        return trans($v).$v2;
    }
}
/**
 * csrf
 *
 * @return 
 */
if( ! function_exists('lzssaas_csrf'))
{
    function lzssaas_csrf() 
    {
        return csrf_field();
    }
}