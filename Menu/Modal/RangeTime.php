<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 14:57
 */

namespace Menu\Modal;


/**
 * Class RangeTime
 * @package App\Http\Controllers\Admin\Menu
 * 日期时间范围
 */
class RangeTime
{
    public $title;
    public $name;

    function __construct($name, $title)
    {
        $this->setName($name);
        $this->setTitle($title);
    }


    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}