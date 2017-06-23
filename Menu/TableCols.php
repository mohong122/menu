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

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
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
     * @param bool $filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    /**
     * @param string $select
     */
    public function setSelect($select)
    {
        $this->select = json_encode($select);
    }

    /**
     * @param bool $sorter
     */
    public function setSorter($sorter)
    {
        $this->sorter = $sorter;
    }
}
