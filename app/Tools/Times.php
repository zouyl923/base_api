<?php

namespace App\Tools;

class Times
{
    /**
     * 获取毫秒数
     * @return float
     */
    static function getSecond(): float
    {
        list($s1, $s2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
}