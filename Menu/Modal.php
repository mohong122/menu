<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 11:03
 */

namespace Menu;



/**
 * Class Modal
 * @package App\Http\Controllers\Admin\Menu
 * 弹出框
 */
class Modal
{
    public $before_url;
    public $after_url;
    public $cols = [];
    public $type;

    const MODAL_TYPE_AUDIT = 'audit';  //审核模式


    function __construct($before_url = '', $after_url = '', $type = '')
    {
        $this->setBeforeUrl($before_url);
        $this->setAfterUrl($after_url);
        $this->setType($type);
    }


    /**
     * @param mixed $after_url
     */
    public function setAfterUrl($after_url)
    {
        $this->after_url = $after_url;
    }

    /**
     * @param mixed $before_url
     */
    public function setBeforeUrl($before_url)
    {
        $this->before_url = $before_url;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param $name
     * @param $title
     * @param string $type
     * @param string $default
     * @param bool $disable
     * @return $this
     */
    function setInput($name, $title, $type = "text", $default = "", $disable = false)
    {
        $input = new Input();
        $input->name = $name;
        $input->title = $title;
        $input->type = $type;
        $input->default = $default;
        $input->disable = $disable;
        $this->cols[] = ['input' => $input];
        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    function setHidden($name)
    {
        $hidden = new Hidden();
        $hidden->name = $name;

        $this->cols[] = ['hidden' => $hidden];
        return $this;
    }

    /**
     * @param $name
     * @param $title
     * @param array $value
     * @param $default
     * @return $this
     */
    function setSelect($name, $title, array $value, $default)
    {
        $select = new Select();
        $select->name = $name;
        $select->title = $title;
        $select->default = $default;

        foreach ($value as $key => $val) {
            $selectValue = new SelectValue();
            $selectValue->title = $val;
            $selectValue->value = $key;
            $select->value[] = $selectValue;
        }


        $this->cols[] = ['select' => $select];
        return $this;
    }

    /**
     * @param $name
     * @param $title
     * @return $this
     */
    function setUpload($name, $title)
    {
        $upload = new Upload();
        $upload->name = $name;
        $upload->title = $title;
        $this->cols[] = ["upload" => $upload];
        return $this;
    }

    /**
     * @param $name
     * @param $title
     * @return $this
     */
    function setRangetime($name, $title)
    {
        $range = new RangeTime($name, $title);
        $this->cols[] = ["rangetime" => $range];
        return $this;

    }

    /**
     * @param $name
     * @param $title
     * @return $this
     */
    function setLabel($name, $title)
    {
        $label = new Label($name, $title);
        $this->cols[] = ['label' => $label];
        return $this;

    }

    /**
     * @param $name
     * @param $title
     * @param $width
     * @param $height
     * @return $this
     */
    function setImage($name, $title, $width, $height)
    {
        $image = new Image($name, $title, $width, $height);
        $this->cols[] = ['image' => $image];
        return $this;
    }

    /**
     * @param $name
     * @param $title
     * @param $width
     * @param $height
     * @return $this
     */
    function setVideo($name, $title, $width = 0, $height = 0)
    {
        $video = new Video($name, $title, $width, $height);
        $this->cols[] = ['video' => $video];
        return $this;
    }
}

class ModalCols
{
    public $input;
    public $hidden;
    public $select;
    public $label;
    public $upload;
    public $date;
    public $time;
    public $datetime;
    public $rangetime;
    public $rangedate;

}

class Confirm
{
    public $url;
    public $title;
    public $alert;
}

class Input
{
    public $title = "";
    public $name = "";
    public $type = "text"; //可选  text,textarea,password
    public $default;
    public $disable;
}

class Hidden
{
    public $name = "";
}

class Select
{
    public $name = "";
    public $title = "";
    public $value = [];
    public $default;
}

class SelectValue
{
    public $title;  //显示名称
    public $value;  //提交数据
}

class Upload
{
    public $name;
    public $title;
}

class Date
{
    public $name;
    public $title;
}

class Time
{
    public $title;
    public $name;
}

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

/**
 * Class RangeDate
 * @package App\Http\Controllers\Admin\Menu
 * 日期范围
 */
class RangeDate
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

/**
 * Class Image
 * @package App\Http\Controllers\Admin\Menu
 * 展示图片控件
 * $width $height 大于0时生效
 */
class Image
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