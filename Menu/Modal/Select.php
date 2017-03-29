<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 14:54
 */

namespace Menu\Modal;


class Select
{
    public $name = "";
    public $title = "";
    public $value = [];
    public $default;
}

class SelectValue
{
    public $title;  //显示名称
    public $value;  //提交数据
}
