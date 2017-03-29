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
        $input = new Modal\Input();
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
        $hidden = new Modal\Hidden($name);
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
        $select = new Modal\Select();
        $select->name = $name;
        $select->title = $title;
        $select->default = $default;

        foreach ($value as $key => $val) {
            $selectValue = new Modal\SelectValue();
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
        $upload = new Modal\Upload();
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
        $range = new Modal\RangeTime($name, $title);
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
        $label = new Modal\Label($name, $title);
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
        $image = new Modal\Image($name, $title, $width, $height);
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
        $video = new Modal\Video($name, $title, $width, $height);
        $this->cols[] = ['video' => $video];
        return $this;
    }
}












