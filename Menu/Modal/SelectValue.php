<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/6/23
 * Time: 14:43
 */

namespace Menu\Modal;


class SelectValue
{
    public $title;  //显示名称
    public $value;  //提交数据

    /**
     * SelectValue constructor.
     * @param $title
     * @param $value
     */
    function __construct($title, $value)
    {
        $this->setTitle($title);
        $this->setValue($value);
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}