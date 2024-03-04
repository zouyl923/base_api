<?php

namespace App\Tools;

class Strings
{
    /**
     * 生成uuid string
     * @param integer $length 长度
     * @return string
     */
    static function uuidString(int $length = 16): string
    {
        $uuid = md5(uniqid(rand()) . microtime());
        $uuid = substr($uuid, -$length, $length);
        return $uuid;
    }


    /**
     * 生成uuid
     * @param integer $length 长度
     * @return string
     */
    static function uuidNumber(int $length = 8): string
    {
        $no = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, $length);
        return $no;
    }
}