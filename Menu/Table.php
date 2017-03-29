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

    function setCols(TableCols $cols)
    {
        foreach ($this->cols as $val) {
            if ($val->key == $cols->key) {
                return $this;
            }
        }

        $this->cols[] = $cols;
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
                isset($val['sorter']) ? $val['sorter'] : false,
                isset($val['type']) ? $val['type'] : "",
                isset($val['select']) ? $val['select'] : false
            );

            $this->setCols($cols);
        }
        return $this;
    }

    function setAction(TableAction $action)
    {
        $this->action[] = $action;
        return $this;
    }

    function setColsAction(TableAction $action)
    {
        $this->cols_action[] = $action;
        return $this;
    }
}