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

/**
 * ajax_csrf
 *
 * @return 
 */
if( ! function_exists('lzssaas_ajax_csrf'))
{
    function lzssaas_ajax_csrf() 
    {
        return csrf_token();
    }
}

if ( ! function_exists('lzssaas_encodes'))
{
    /*
    * 加密解密方法
    *  $tmp1 = diy_encode('tex','key'); //加密
    *  $tmp2 = diy_encode($tmp1,'key','decode'); //解密
    */
    function lzssaas_encode($tex, $key = '', $type="encode")
    {
        $key = $key ? $key : '(@#$!$!$fgbcvnGHJKUX*(#$%^$%%*)(*)_$%fgbcvnGHJKUX@#*&*)(*_()*(O$%^$%SDF3456F$#^';
        $chrArr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
        if($type == "decode") {
            if(strlen($tex) < 14) {
                return false;
            }
            $verity_str = substr($tex, 0, 8);   //取前8位
            $tex = substr($tex, 8);
            if($verity_str != substr(md5($tex), 0, 8)) { //完整性验证失败
                return false;
            }
        }
        $key_b = $type == "decode" ? substr($tex, 0, 6) : $chrArr[rand()%62] . $chrArr[rand()%62] . $chrArr[rand()%62] . $chrArr[rand()%62] . $chrArr[rand()%62] . $chrArr[rand()%62];
        $rand_key = $key_b . $key;
        $rand_key = md5($rand_key);
        $tex = $type == "decode" ? base64_decode(substr($tex, 6)) : $tex;
        $texlen = strlen($tex);
        $reslutstr = "";
        for($i = 0; $i < $texlen; $i++) {
            $reslutstr .= $tex{$i}^$rand_key{$i%32};
        }
        if($type != "decode") {
            $reslutstr = trim($key_b.base64_encode($reslutstr), "==");
            $reslutstr = substr(md5($reslutstr), 0,8).$reslutstr;
        }
        return $reslutstr;
    }
}