<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/6/27
 * Time: 15:06
 */

namespace Menu\Modal;


class Checkbox
{
    public $title;
    public $name;
    public $value;

    function __construct($name, $title)
    {
        $this->setName($name);
        $this->setTitle($title);
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

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}