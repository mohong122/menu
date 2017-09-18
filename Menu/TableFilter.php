<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/29
 * Time: 11:03
 */

namespace Menu;


/**
 * Class TableFilter
 * @package App\Http\Controllers\Admin\Menu
 * 筛选
 */
class TableFilter
{

    public $cols = [];


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
     * 新增日期Date
     * @param $name
     * @param $title
     * @return $this
     */
    function addDate($name, $title)
    {
        $date = new Modal\Date($name, $title);
        $this->cols[] = ["date" => $date];
        return $this;

    }

    /**
     *修改日期Date
     * @param $name
     * @param $title
     * @return $this
     */
    function setDate($name, $title)
    {
        $date = new Modal\Date($name, $title);
        $this->_setCols('date', $name, $date);
        return $this;
    }


    /**
     * 新增日期 Datetime 2017-01-01 01:10:01
     * @param $name
     * @param $title
     * @return $this
     */
    function addDatetime($name, $title)
    {
        $datetime = new Modal\Datetime($name, $title);
        $this->cols[] = ["datetime" => $datetime];
        return $this;
    }

    /**
     *修改日期Datetime 2017-01-01 01:10:01
     * @param $name
     * @param $title
     * @return $this
     */
    function setDatetime($name, $title)
    {
        $datetime = new Modal\Datetime($name, $title);
        $this->_setCols('datetime', $name, $datetime);
        return $this;
    }


    /**
     * 新增日期 time 01:10:01
     * @param $name
     * @param $title
     * @return $this
     */
    function addTime($name, $title)
    {
        $time = new Modal\Time($name, $title);
        $this->cols[] = ["time" => $time];
        return $this;
    }

    /**
     *修改日期time 01:10:01
     * @param $name
     * @param $title
     * @return $this
     */
    function setTime($name, $title)
    {
        $time = new Modal\Time($name, $title);
        $this->_setCols('time', $name, $time);
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
     * 新增段的值，
     * @param $type
     * @param $name
     * @param $value
     */
    function _addCols($type, $name, $value)
    {
        $this->cols[] = [$type => $value];

    }


    function addCols($type, $name, $value)
    {

        $this->_addCols($type, $name, $value);
        return $this;
    }

    /**
     * 设置字段的值，不存在时，创建新的
     * @param $type
     * @param $name
     * @param $value
     */
    function _setCols($type, $name, $value)
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
                if ((is_object($v) && in_array($v->name, $name)) ||
                    (is_array($v) && in_array($v['name'], $name))
                ) {
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












