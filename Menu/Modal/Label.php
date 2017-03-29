<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 14:57
 */

namespace Menu\Modal;


/**
 * Class Label
 * @package App\Http\Controllers\Admin\Menu
 *
 */
class Label
{
    public $title;
    public $name;

    function __construct($name, $title)
    {
        $this->setName($name);
        $this->setTitle($title);
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
