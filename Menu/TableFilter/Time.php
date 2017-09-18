<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 14:59
 */

namespace Menu\TableFilter;

class Time
{
    public $title;
    public $name;

    function __construct($name, $title)
    {
        $this->setTitle($name);
        $this->setName($title);
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}