<?php 
/* 
* Este será el archivo donde gestionaremos los
* Custom Post Types de WordPress
*/

class ATR_CPT{

    public function atr_cpt_habitaciones(){
        // etiquetas para el post type
        $labels = array(
            'name'                  => _x('habitaciones', 'Post Type General Name', 'udemy'),
            'singular_name'         => _x('habitación', 'Post Type Singular Name', 'udemy'),
            'menu'                  => __('habitaciones', 'udemy'),
            'parent_item_colon'     => __('Menú Padre', 'udemy'),
            'all_items'             => __('Todas las habitaciones', 'udemy'),
            'view_item'             => __('Ver Menú', 'udemy'),
            'add_new_item'          => __('Agregar nueva habitación', 'udemy'),
            'add_new'               => __('Agregar nueva habitación', 'udemy'),
            'edit_item'             => __('Editar habitación', 'udemy'),
            'update_item'           => __('Actualizar habitación', 'udemy'),
            'search_items'          => __('Buscar habitación', 'udemy'),
            'not_found'             => __('No encontrado', 'udemy'),
            'not_found_in_trash'    => __('No encontrado en la papelera', 'udemy'),
        );

        // otras opciones para el post type
        $args = array(
            'label'                 => __('habitaciones', 'udemy'),
            'description'           => __('Sube aquí tus habitaciones', 'udemy'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_admin_bar'     => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons_building',
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );

        // para registrar el CPT - cuidado de no repetir el slug de la página habitaciones
        // register_post_type('rooms', $args); // se puede poner un nombre diferente
        register_post_type('cpt_habitaciones', $args); // o agregar un prefijo
    }

}