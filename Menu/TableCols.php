<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 11:00
 */

namespace Menu;

class TableCols
{
    public $key = "";
    public $title = "";
    public $sorter = false;
    public $type = "";
    public $select = "";

    function __construct($key, $title, $sorter = false, $type = "", $select = false)
    {
        $this->key = $key;
        $this->title = $title;
        $this->sorter = $sorter;
        $this->type = $type;
        $this->select = json_encode($select);
    }
}
