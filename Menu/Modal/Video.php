<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 14:55
 */

namespace Menu\Modal;


/**
 * Class Video
 * @package App\Http\Controllers\Admin\Menu
 * 展示视频控件
 * $width $height 大于0时生效
 */

class Video
{

    public $name;
    public $title;
    public $width;
    public $height;

    function __construct($name, $title, $width = 0, $height = 0)
    {
        $this->setName($name);
        $this->setTitle($title);
        $this->setHeight($height);
        $this->setWidth($width);
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

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;

    }
}