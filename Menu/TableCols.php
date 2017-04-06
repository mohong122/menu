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
    public $filter = false;

    /**
     * TableCols constructor.
     * @param $key
     * @param $title
     * @param bool $sorter
     * @param string $type
     * @param bool $select
     * @param bool $filter
     */
    function __construct($key, $title, $sorter = false, $type = "", $select = false, $filter = false)
    {
        $this->key = $key;
        $this->title = $title;
        $this->sorter = $sorter;
        $this->type = $type;
        $this->select = json_encode($select);
        $this->filter = $filter;
    }
}
