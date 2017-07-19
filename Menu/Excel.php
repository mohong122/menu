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
class Excel
{
    public $before_url;
    public $after_url;
    public $cols = [];


    function __construct($before_url = '', $after_url = '')
    {
        $this->setBeforeUrl($before_url);
        $this->setAfterUrl($after_url);
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
     * @param $name
     * @param $title
     * @param $value
     * @return $this
     */
    function addCols($name, $title, $value)
    {
        $checkbox = new Modal\Checkbox($name, $title);

        foreach ($value as $key => $val) {
            $checkboxValue = new Modal\CheckboxValue($val, $key);
            $checkbox->value[] = $checkboxValue;
        }
        $this->cols[] = $checkbox;
        return $this;
    }


}












