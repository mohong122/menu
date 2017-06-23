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
    function addInput($name, $title, $type = "text", $default = "", $disable = false)
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

        $this->_setCols('input', $name, $input);

        return $this;
    }


    /**
     * @param $name
     * @return $this
     */
    function addHidden($name)
    {
        $hidden = new Modal\Hidden($name);
        $this->cols[] = ['hidden' => $hidden];
        return $this;
    }


    /**
     * @param $name
     * @return $this
     */
    function setHidden($name)
    {
        $hidden = new Modal\Hidden($name);

        $this->_setCols('hidden', $name, $hidden);
        return $this;
    }

    /**
     * @param $name
     * @param $title
     * @param array $value
     * @param $default
     * @return $this
     */
    function addSelect($name, $title, array $value, $default)
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

        $this->_setCols('select', $name, $select);

        return $this;
    }

    /**
     * 新增upload
     * @param $name
     * @param $title
     * @return $this
     */
    function addUpload($name, $title)
    {
        $upload = new Modal\Upload();
        $upload->name = $name;
        $upload->title = $title;
        $this->colgis[] = ["upload" => $upload];
        return $this;
    }

    /**
     * 设置upload
     * @param $name
     * @param $title
     * @return $this
     */
    function setUpload($name, $title)
    {
        $upload = new Modal\Upload();
        $upload->name = $name;
        $upload->title = $title;
        $this->_setCols('upload', $name, $upload);
        return $this;
    }

    /**
     * @param $name
     * @param $title
     * @return $this
     */
    function addRangetime($name, $title)
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
    function setRangetime($name, $title)
    {
        $range = new Modal\RangeTime($name, $title);
        $this->_setCols('rangetime', $name, $range);
        return $this;

    }


    /**
     * @param $name
     * @param $title
     * @return $this
     */
    function addLabel($name, $title)
    {
        $label = new Modal\Label($name, $title);
        $this->cols[] = ['label' => $label];
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
        $this->_setCols('label', $name, $label);
        return $this;

    }

    /**
     * 新增image
     * @param $name
     * @param $title
     * @param $width
     * @param $height
     * @return $this
     */
    function addImage($name, $title, $width, $height)
    {
        $image = new Modal\Image($name, $title, $width, $height);
        $this->cols[] = ['image' => $image];
        return $this;
    }

    /**
     * 设置image
     * @param $name
     * @param $title
     * @param $width
     * @param $height
     * @return $this
     */
    function setImage($name, $title, $width, $height)
    {
        $image = new Modal\Image($name, $title, $width, $height);

        $this->_setCols('image', $name, $image);
        return $this;
    }

    /**
     * 新增video
     * @param $name
     * @param $title
     * @param $width
     * @param $height
     * @return $this
     */
    function addVideo($name, $title, $width = 0, $height = 0)
    {
        $video = new Modal\Video($name, $title, $width, $height);
        $this->cols[] = ['video' => $video];
        return $this;
    }

    /**
     * 设置video
     * @param $name
     * @param $title
     * @param $width
     * @param $height
     * @return $this
     */
    function setVideo($name, $title, $width = 0, $height = 0)
    {

        $video = new Modal\Video($name, $title, $width, $height);
        $this->_setCols('video', $name, $video);
        return $this;
    }

    /**
     * 设置字段的值，不存在时，创建新的
     * @param $type
     * @param $name
     * @param $value
     */
    protected function _setCols($type, $name, $value)
    {
//        print_r($name);
        $is = false;
        foreach ($this->cols as $key => $val) {
            if (isset($val[$type]->name) && $val[$type]->name == $name) {
//                print_r($val[$type]->$name);
                $this->cols[$key][$type] = $value;
                $is = true;
            }
        }

        if (!$is) {
            $this->cols[] = [$type => $value];
        }

    }

    /**
     * 删除字段
     * @param $name
     * @return $this
     */
    function delCols($name)
    {
        if (!is_array($name)) {
            $name = [$name];
        }

//        print_r($name);
        foreach ($this->cols as $key => $val) {
            foreach ($val as $k => $v) {
                if (in_array($v->name, $name)) {
                    unset($this->cols[$key]);
//                    array_splice($this->cols, $key, 1);
                }
            }
        }
        $this->cols = array_values($this->cols);

        return $this;
    }
}












