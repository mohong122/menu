<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 11:18
 */

namespace Menu;


class TableAction
{
    public $title;
    public $key;
    public $icon = "";
    public $type = "";  //可选参数modal,confirm
    public $modal;
    public $confirm;
    public $condition;  //条件 例如 %s > 1 @status
    public $tabs;
    public $batch = false;

    function __construct($key, $title, $type = "modal")
    {
        $this->key = $key;
        $this->title = $title;
        $this->type = $type;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @param mixed $condition
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }

    /**
     * @param mixed $confirm
     */
    public function setConfirm($confirm)
    {
        $this->confirm = $confirm;
    }

    /**
     * @param mixed $modal
     */
    public function setModal($modal)
    {
        $this->modal = $modal;
    }

    /**
     * @param mixed $tabs
     */
    public function setTabs($tabs)
    {
        $this->tabs = $tabs;
    }

    /**
     * @param bool $batch
     */
    public function setBatch($batch = false)
    {
        $this->batch = $batch;
    }
}

