<?php

/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 14:39
 */

namespace Menu\Modal;

class Input
{
    public $title = "";
    public $name = "";
    public $type = "text"; //可选  text,textarea,password
    public $default;
    public $disable;


    function __construct($name, $title, $type, $default, $disable)
    {
        $this->setName($name);
        $this->setTitle($title);
        $this->setType($type);
        $this->setDefault($default);
        $this->setDisable($disable);
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @param mixed $disable
     */
    public function setDisable($disable)
    {
        $this->disable = $disable;
    }

}
