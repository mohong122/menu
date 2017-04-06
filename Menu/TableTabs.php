<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 14:50
 */

namespace Menu;


class TableTabs
{
    public $target;
    public $filter = [];


    /**
     * @param array $filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    /**
     * @param mixed $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

}