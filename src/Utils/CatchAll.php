<?php

namespace SuperGet\Utils;

class CatchAll
{
    /**
     * 将url转换成快照
     */
    public static function snapshot($url)
    {
        $html = app('curl')->get("http://www.baidu.com/s?word={$url}");
        $regex = "/<a.?data-click=\"{'rsv_snapshot':'1'}.*?\">(.*?)<\/a>/is";
        preg_match($regex, $html, $matches);
        $regex1 = "/(href=\").*?(\")/i";
        if (!isset($matches[0])) {
            return $url;
        }
        preg_match($regex1, $matches[0], $matches1);
        $replaceList = array("href=\"", "\"");
        return str_replace($replaceList, "", $matches1[0]);
    }
}