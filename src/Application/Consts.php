<?php

namespace Nece\Gears\Cms\Application;

class Consts
{
    // 搜索类型
    const SEARCH_TYPE_NONE = 0; // 不搜索
    const SEARCH_TYPE_KEY = 10; // 关键字搜索
    const SEARCH_TYPE_RANGE = 20; // 范围搜索

    // 值类型
    const VALUE_TYPE_INT = 'int';
    const VALUE_TYPE_FLOAT = 'float';
    const VALUE_TYPE_STRING = 'string';
    const VALUE_TYPE_TEXT = 'text';
    const VALUE_TYPE_DATETIME = 'datetime';
    const VALUE_TYPE_DATE = 'date';
    const VALUE_TYPE_TIME = 'time';

    /**
     * 搜索类型
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param mixed $value
     *
     * @return array
     */
    public static function searchTypeOptions($value = null)
    {
        return array(
            array('value' => self::SEARCH_TYPE_NONE, 'text' => '不搜索', 'selected' => (self::SEARCH_TYPE_NONE === $value)),
            array('value' => self::SEARCH_TYPE_KEY, 'text' => '关键字搜索', 'selected' => (self::SEARCH_TYPE_KEY === $value)),
            array('value' => self::SEARCH_TYPE_RANGE, 'text' => '范围搜索', 'selected' => (self::SEARCH_TYPE_RANGE === $value))
        );
    }

    /**
     * 获取值类型
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param mixed $value
     *
     * @return array
     */
    public static function valueTypeOptions($value = null)
    {
        return array(
            array('value' => self::VALUE_TYPE_INT, 'text' => '整数', 'selected' => (self::VALUE_TYPE_INT === $value)),
            array('value' => self::VALUE_TYPE_FLOAT, 'text' => '小数', 'selected' => (self::VALUE_TYPE_FLOAT === $value)),
            array('value' => self::VALUE_TYPE_STRING, 'text' => '字符串', 'selected' => (self::VALUE_TYPE_STRING === $value)),
            array('value' => self::VALUE_TYPE_TEXT, 'text' => '长文本', 'selected' => (self::VALUE_TYPE_TEXT === $value)),
            array('value' => self::VALUE_TYPE_DATETIME, 'text' => '日期时间', 'selected' => (self::VALUE_TYPE_DATETIME === $value)),
            array('value' => self::VALUE_TYPE_DATE, 'text' => '日期', 'selected' => (self::VALUE_TYPE_DATE === $value)),
            array('value' => self::VALUE_TYPE_TIME, 'text' => '时间', 'selected' => (self::VALUE_TYPE_TIME === $value)),
        );
    }
}
