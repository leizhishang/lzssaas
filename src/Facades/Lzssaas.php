<?php 
/**
 * @author leizhishang <info@leizhishang.com>
 * @copyright ©2016-2100 leizhishang.com
 * @license http://www.leizhishang.com
 */
namespace Leizhishang\Lzssaas\Facades;

use Illuminate\Support\Facades\Facade;

class Lzssaas extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lzssaas';
    }
}
