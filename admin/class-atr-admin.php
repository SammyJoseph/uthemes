<?php 

class ATR_Admin{

    private $theme_name;
    private $version;
    private $build_menupage;

    public function __construct($theme_name, $version){
        $this->theme_name       = $theme_name;
        $this->version          = $version;
        $this->build_menupage   = new ATR_Build_Menupage();
    }

    /* 
    *   Registra los archivos de hojas de estilos del área de administración
    */
    public function enqueue_styles($hook){
        if($hook != 'toplevel_page_res_options_page' && $hook != 'reservas_page_res_submenu_reserva'){
            return;
        }

        wp_enqueue_style(
            $this->theme_name,
            ATR_DIR_URI . 'admin/css/atr-admin.css',
            array(),
            $this->version,
            'all'
        );
    }

    /* 
    *   Registra los archivos javascript del área de administración
    */
    public function enqueue_scripts($hook){
        if($hook != 'toplevel_page_res_options_page' && $hook != 'reservas_page_res_submenu_reserva'){
            return;
        }

        wp_enqueue_script(
            $this->theme_name,
            ATR_DIR_URI . 'admin/js/atr-admin.js',
            ['jquery'],
            $this->version,
            true
        );
    }

    /* 
    *   registra los menús del theme
    *   área de administración
    *   @version 1.0.0
    *   @access public
    */
    public function add_menu(){
        // agregamos el menú
        $this->build_menupage->add_menu_page(
            __('Opciones de reservas', 'udemy'),
            __('Reservas', 'udemy'),
            'manage_options',
            'res_options_page',
            [$this, 'controlador_display_menu'],
            'dashicons-calendar-alt',
            15
        );

        // agregamos el submenú
        $this->build_menupage->add_submenu_page(
            'res_options_page', //slug 
            __('Submenú reservas', 'udemy'),
            __('Submenú reservas', 'udemy'),
            'manage_options',
            'res_submenu_reserva',
            [$this, 'controlador_display_submenu']
        );

        $this->build_menupage->run();
    }

    // aquí el HTML del página del menú en el área de administración
    public function controlador_display_menu(){

        require_once ATR_DIR_PATH . 'admin/partials/atr-menu-reservas-display.php';

    }

    public function controlador_display_submenu(){
        require_once ATR_DIR_PATH . 'admin/partials/atr-submenu-reservas-display.php';
    }
}