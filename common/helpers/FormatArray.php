<?php

/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace common\helpers;
class FormatArray
{

    /**
     * 获取整合的格式化数组
     * @param $arr
     * @param int $pid
     * @param int $level
     * @param string $format
     * @return array
     */
    static public function getFormat($arr,$pid=0,$level=0,$format='|——'){

        $tempArray = [];
        foreach ($arr as $v){
            if($v['pid'] == $pid){
                $v['level']  = $level+1;
                $v['format'] = str_repeat($format,$v['level']);
                $tempArray[] = $v;
                $tempArray = array_merge($tempArray,self::getFormat($arr,$v['id'],$level+1));
           }
        }
        return $tempArray;
    }

    /**
     * 获取叠加的数组
     * @param $arr
     * @param int $pid
     * @param int $level
     * @return array
     */
    static public function getArr($arr,$pid=0,$level = 1){
        $tempArray = array();
        foreach ($arr as $v){
            if($v['pid'] == $pid){
                $v['level'] = $level;
                $v['child'] = self::getArr($arr,$v['id'],$level+1);
                $tempArray[] = $v;
            }
        }
        return $tempArray;
    }


    /**
     * 获取子集节点的集合
     * @param $arr
     * @param $id
     * @return array
     */
    static public function getChild($arr,$id){
        $tempArray = [];
        foreach ($arr as $v){
            if($v['pid'] == $id){
                $v['child'] = self::getChild($arr,$v['id']);
                $tempArray[]= $v;
            }
        }
        return $tempArray;
    }


    /**
     * 获取父级节点的集合
     * @param $arr
     * @param $id
     * @return array
     */
    static public function getParent($arr,$id){
        $tempArray = [];
        foreach ($arr as $v){
            if($v['id'] == $id){
                $v['parent'] = self::getParent($arr,$v['pid']);
                $tempArray[] = $v;
            }
        }
        return $tempArray;
    }
}