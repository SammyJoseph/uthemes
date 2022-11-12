<?php 
/* wp_enqueue_style & wp_enqueue_script se fueron a class-atr-public.php */
$atr_dir_path = (substr(get_template_directory(), -1) === '/') ? get_template_directory() : get_template_directory() . '/';
$atr_dir_uri = (substr(get_template_directory_uri(), -1) === '/') ? get_template_directory_uri() : get_template_directory_uri() . '/';

define('ATR_DIR_PATH', $atr_dir_path);
define('ATR_DIR_URI', $atr_dir_uri);

require_once ATR_DIR_PATH . 'includes/class-atr-master.php';

function atr_run_master(){
    $atr_master = new ATR_Master;
    $atr_master->run();
}
atr_run_master();

// todo este código fue modularizado en MVC
/* if (!function_exists('res_options_page')) {
    function res_options_page(){
        add_menu_page(
            'Opciones de Reservas',
            'Reservas', //título en el dashboard
            'manage_options',
            'res_options_page', //slug
            'res_options_page_display',
            'dashicons-calendar-alt',
            '15'
        );
        // remove_menu_page('res_options_page'); //se puede hacer en una functión separada (ejemplo en function remove_menus() línea 42)

        add_submenu_page( 
            'res_options_page', 
            'Submenú reservas', 
            'Submenú reservas', 
            'manage_options', 
            'res_submenu_reserva', 
            'res_submenu_reserva_display' 
        );
    }
    add_action('admin_menu', 'res_options_page');
}

// función callback res_options_page_display
if (!function_exists('res_options_page_display')) {
    function res_options_page_display(){
        ?>
            <div class="wrap">
                <h3>Este es el HTML de nuestro menú page</h3>
            </div>
        <?php
    }
}

// function remove_menus(){
//     remove_menu_page('res_options_page'); //slug como parámetro
// }
// add_action('admin_menu', 'remove_menus'); 

// función callback res_submenu_reserva_display
if (!function_exists('res_submenu_reserva_display')) {
    function res_submenu_reserva_display(){
        ?>
            <div class="wrap">
                <h3>Este es el submenú</h3>
            </div>
        <?php
    }
} */