<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/6/27
 * Time: 15:11
 */

namespace Menu\TableFilter;


class CheckboxValue
{
    public $title;
    public $value;
    public $children;

    function __construct($title, $value, $children = [])
    {
        $this->setTitle($title);
        $this->setValue($value);
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}