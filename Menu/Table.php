<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 11:00
 */

namespace Menu;


class Table
{
    public $cols = [];
    public $action = [];
    public $cols_action = [];
    public $remote = true;
    public $source = "";
    public $pk = "id";


    /**
     * 新增字段
     * @param $key
     * @param $title
     * @param bool $sorter
     * @param string $type
     * @param bool $select
     * @param bool $filter
     * @return $this
     */
    function addCol($key, $title, $sorter = false, $type = "", $select = false, $filter = false)
    {
        $cols = new TableCols($key, $title, $sorter, $type, $select, $filter);
        $this->setCols($cols);
        return $this;

    }


    /**
     * @param TableCols $cols
     * @return $this
     */
    function setCols(TableCols $cols)
    {
        $is = false;
        foreach ($this->cols as $k => $val) {
            if ($val->key == $cols->key) {
                $this->cols[$k] = $cols;
                $is = true;
                break;
            }
        }

        if (!$is) {
            $this->cols[] = $cols;
        }
        return $this;
    }

    function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    function parseCols(array $data)
    {
        foreach ($data as $val) {
            $cols = new TableCols($val['key'], $val["title"],
                isset($val['sorter']) ? true : false,
                isset($val['type']) ? $val['type'] : "",
                isset($val['select']) ? $val['select'] : false,
                isset($val['filter']) ? true : false
            );

            $this->setCols($cols);
        }
        return $this;
    }

    /**
     * 新增table的操作
     * @param TableAction $action
     * @return $this
     */
    function addAction(TableAction $action)
    {
        $this->action[] = $action;
        return $this;
    }

    /**
     * 设置table的操作
     * @param TableAction $action
     * @return $this
     */
    function setAction(TableAction $action)
    {
        $this->action[] = $action;
        return $this;
    }


    /**
     * 新增记录上的操作
     * @param TableAction $action
     * @return $this
     */
    function addColsAction(TableAction $action)
    {
        $this->cols_action[] = $action;
        return $this;
    }

    /**
     * 设置记录上的操作
     * @param TableAction $action
     * @return $this
     */
    function setColsAction(TableAction $action)
    {
        
        $this->cols_action[] = $action;
        return $this;
    }

    /**
     * 设置主键字段
     * @param string $pk
     */
    public function setPk($pk)
    {
        $this->pk = $pk;
    }

    /**
     * 设置远程地址
     * @param bool $remote
     */
    public function setRemote($remote)
    {
        $this->remote = $remote;
    }
}