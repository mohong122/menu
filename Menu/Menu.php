<?php
/**
 * Created by PhpStorm.
 * User: mohong
 * Date: 2017/3/21
 * Time: 18:40
 */

namespace Menu;


/**
 * Class Menu
 * @package app\Http\Controllers\Admin
 * 菜单生成
 */
class Menu
{

    public $key;   //关键字，同一级菜单选项唯一
    public $title; //菜单显示内容
//    public $url;   // 点击后请求的地址
    public $children = true;  //是否包含子菜单
    public $icon = "";   //显示的icon
    public $type = "";   // 点击后的类型
    public $menu = [];   //子菜单

    /**
     * Menu constructor.
     * @param $key
     * @param $title
     * @param bool $children
     * @param string $icon
     * @param string $type
     */
    function __construct($key, $title, $children = true, $icon = "", $type = "")
    {
        $this->key = $key;
        $this->title = $title;
        $this->children = $children;
        $this->icon = $icon;
        $this->type = $type;
//        $this->url = $url;
    }

    /**
     * 设置子菜单
     * @param $menu
     * @return $this
     */
    function setSubMenu($menu)
    {
        $this->menu[] = $menu;
        return $this;
    }

    /**
     * 设置一个table对象
     * @param Table $table
     * @return $this
     */
    function setTable(Table $table)
    {
        $this->table = $table;
        return $this;
    }


}




