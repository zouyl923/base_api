<?php

namespace App\Tools;

class Arrays
{
    /**
     * 生成无限级树
     * @param $list array 列表数组
     * @param $index string 唯一标示字段名称 常用ID
     * @param $pidField string 父级ID字段名称
     * @return array tree array
     */
    static function createTree(array $list, string $index = 'id', string $pidField = 'parent_id'): array
    {
        $tree = array();
        $list = array_column($list, null, $index);
        foreach ($list as $v) {
            if (isset($list[$v[$pidField]])) {
                $list[$v[$pidField]]['children'][] = &$list[$v[$index]];
            } else {
                $tree[] = &$list[$v[$index]];
            }
        }
        return $tree;
    }
}