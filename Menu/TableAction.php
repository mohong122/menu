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

    function __construct($key, $title, $type = "modal")
    {
        $this->key = $key;
        $this->title = $title;
        $this->type = $type;
    }
}
