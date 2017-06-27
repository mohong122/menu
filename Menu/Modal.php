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
        $input = new Modal\Input($name, $title, $type, $default, $disable);

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
        $input = new Modal\Input($name, $title, $type, $default, $disable);
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
            $selectValue = new Modal\SelectValue($val, $key);
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
            $selectValue = new Modal\SelectValue($val, $key);
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
        $upload = new Modal\Upload($name, $title);
        $this->cols[] = ["upload" => $upload];
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
        $upload = new Modal\Upload($name, $title);
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
        $is = false;
        foreach ($this->cols as $key => $val) {
            if (isset($val[$type]->name) &&
                $val[$type]->name == $name
            ) {
                $this->cols[$key][$type] = $value;
                $is = true;
                break;
            }
        }

        if (!$is) {
            $this->cols[] = [$type => $value];
        }

    }

    /**
     * 删除字段
     * @param array|string $name
     * @return $this
     */
    function delCols($name)
    {
        if (!is_array($name)) {
            $name = [$name];
        }

        $count = count($name);
        $init = 0;
        foreach ($this->cols as $key => $val) {
            foreach ($val as $k => $v) {
                if (in_array($v->name, $name)) {
                    unset($this->cols[$key]);
                    $init++;
                    if ($count == $init) {
                        break;
                    }
                    continue;
                }
            }
        }
        $this->cols = array_values($this->cols);

        return $this;
    }

    /**
     * @param $name
     * @param $title
     * @param $value
     * @return $this
     */
    function addCheckbox($name, $title, $value)
    {
        $checkbox = new Modal\Checkbox($name, $title);

        foreach ($value as $key => $val) {
            $checkboxValue = new Modal\CheckboxValue($val, $key);
            $checkbox->value[] = $checkboxValue;
        }
        $this->cols[] = ['checkbox' => $checkbox];
        return $this;
    }

    /**
     * @param $name
     * @param $title
     * @param $value
     * @return $this
     */
    function setCheckbox($name, $title, $value)
    {
        $checkbox = new Modal\Checkbox($name, $title);

        foreach ($value as $key => $val) {
            $checkboxValue = new Modal\CheckboxValue($val, $key);
            $checkbox->value[] = $checkboxValue;
        }
        $this->_setCols('checkbox', $name, $checkbox);
        return $this;
    }

    /**
     * @param string $name
     * @param string $title
     * @param $value
     * @return $this
     */
    function addRadio($name, $title, $value)
    {
        $radio = new Modal\Checkbox($name, $title);

        foreach ($value as $key => $val) {
            $radioValue = new Modal\RadioValue($val, $key);
            $radio->value[] = $radioValue;
        }
        $this->cols[] = ['radio' => $radio];
        return $this;
    }

    /**
     * 设置radio
     * @param $name
     * @param $title
     * @param $value
     * @return $this
     */
    function setRadio($name, $title, $value)
    {
        $radio = new Modal\Checkbox($name, $title);

        foreach ($value as $key => $val) {
            $radioValue = new Modal\RadioValue($val, $key);
            $radio->value[] = $radioValue;
        }
        $this->_setCols('radio', $name, $value);
        return $this;
    }
}












