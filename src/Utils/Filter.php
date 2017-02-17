<?php
namespace SuperGet\Utils;

/**
 * 过滤类，进行一些特殊字符的过滤
 */
class Filter
{

    //过滤unicode编码，html特殊字符，空格，不可见空格，excel，word产生的编码。
    public static  function desUnicode($unicode)
    {
        if (empty($unicode))
        {
            return '';
        }
        $zeroSpace   = str_replace("\xe2\x80\x8b", '',$unicode);
        $nonJoiner   = str_replace("\xe2\x80\x8c", '', $zeroSpace);
        $nonJoiner  = str_replace("\xe2\x80\x8d", '', $nonJoiner);
        $str  = str_replace(">", '', $nonJoiner);
        $str = str_replace("\r\n","",$str);
        $str = str_replace("\r","",$str);
        $str = str_replace(" ","",$str);
        $str = str_replace("\n", '', $str); //清除换行符
        $str = str_replace("\t", '', $str); //清除制表符
        $str = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$str);
        $str   = str_replace("\u00c2a0", '', $str);
        $str = preg_replace('/&[^;]*;/',' ',$str);//过滤html特殊字符
        return trim($str);

    }

}