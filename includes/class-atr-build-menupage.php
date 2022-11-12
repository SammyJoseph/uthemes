<?php 
/* 
*   Clase para manejar la creación de menús y submenús del tema
*/

class ATR_Build_Menupage{

    protected $menus;
    protected $submenus;

    public function __construct()
    {
        $this->menus    = [];
        $this->submenus = [];
    }

    // menú page
    public function add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url = '', $position = null ){

        $this->menus = $this->add_menu($this->menus, $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);

    }

    public function add_menu($menus, $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position){

        $menus[] = [
            'page_title'    => $page_title,
            'menu_title'    => $menu_title,
            'capability'    => $capability,
            'menu_slug'     => $menu_slug,
            'function'      => $function,
            'icon_url'      => $icon_url,
            'position'      => $position
        ];
        return $menus;
    }

    // submenú page
    public function add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function){

        $this->submenus = $this->add_submenu($this->submenus, $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);

    }

    public function add_submenu($submenus, $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function){

        $submenus[] = [
            'parent_slug'   => $parent_slug,
            'page_title'    => $page_title,
            'menu_title'    => $menu_title,
            'capability'    => $capability,
            'menu_slug'     => $menu_slug,
            'function'      => $function,
        ];
        return $submenus;
    }

    public function run(){
        foreach($this->menus as $menu){
            extract($menu, EXTR_OVERWRITE);
            add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
        }

        foreach($this->submenus as $submenu){
            extract($submenu, EXTR_OVERWRITE);
            add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function); 
        }
    }
}