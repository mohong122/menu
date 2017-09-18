<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 14:58
 */

namespace Menu\TableFilter;


/**
 * Class Datetime
 * @package App\Http\Controllers\Admin\Menu
 * 日期时间
 */
class Datetime
{
    public $title;
    public $name;

    function __construct($name, $title)
    {
        $this->setName($name)->setTitle($title);
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
}