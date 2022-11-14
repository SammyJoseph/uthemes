<?php 
/* 
* Este será el archivo donde gestionaremos los
* Custom Post Types de WordPress
*/

class ATR_CPT{

    public function atr_cpt_habitaciones(){
        // etiquetas para el post type
        $labels = array(
            'name'                  => _x('Habitaciones', 'Post Type General Name', 'udemy'),
            'singular_name'         => _x('habitación', 'Post Type Singular Name', 'udemy'),
            'menu'                  => __('habitaciones', 'udemy'),
            'parent_item_colon'     => __('Menú Padre', 'udemy'),
            'all_items'             => __('Ver Todas', 'udemy'),
            'view_item'             => __('Ver Menú', 'udemy'),
            'add_new_item'          => __('Agregar nueva habitación', 'udemy'),
            'add_new'               => __('Agregar Nueva', 'udemy'),
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
            'menu_position'         => 10,
            'menu_icon'             => 'dashicons-admin-home',
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            // habilitando  la wp rest api
            'show_in_rest'          => true,
            'rest_base'             => 'rooms-api',
            'rest_controller_class' => 'WP_REST_Posts_Controller'
        );

        // para registrar el CPT - cuidado de no repetir el slug de la página habitaciones
        // register_post_type('rooms', $args); // se puede poner un nombre diferente
        register_post_type('cpt_habitaciones', $args); // o agregar un prefijo

        // refresca automáticamente lo enlaces de las publicaciones del CPT
        flush_rewrite_rules();
    }

    public function atr_pagination_post($data){

            // paginación para el CPT
            $big = 999999;

            $args = array(
                'base'                  => str_replace($big, '%#%', esc_url( get_pagenum_link( $big ))),
                'format'                => '?paged=%#%',
                'current'               => max(1, get_query_var('paged')),
                'show_all'              => false,
                'end_size'              => 1,
                'mind_size'             => 2,
                'prev_next'             => true,
                'prev_text'             => __('<< Previo', 'udemy'),
                'next_text'             => __('Siguiente >>', 'udemy'),
                'type'                  => 'plain',
                'add_args'              => false,
                'add_fragment'          => '',
                'before_page_number'    => '',
                'after_page_number'     => '',
                'total'                 => $data->max_num_pages
            );

            echo paginate_links( $args );
    }

    public function atr_taxonomia_habitaciones(){

        $post_types = ['cpt_habitaciones'];
        $labels = array(
            'name'              => _x('Tipo de Habitación', 'taxonomy general name', 'udemy'),
            'singular_name'     => _x('Tipo de Habitación', 'taxonomy general name', 'udemy'),
            'search_items'      => __('Buscar tipo de habitación', 'udemy'),
            'all_items'         => __('Todos los tipos de habitaciones', 'udemy'),
            'parent_item'       => __('Tipo de habitación padre', 'udemy'),
            'parent_item_colon' => __('Tipo de habitación padre', 'udemy'),
            'edit_item'         => __('Editar tipo de habitación', 'udemy'),
            'update_item'       => __('Actualizar tipo de habitación', 'udemy'),
            'add_new_item'      => __('Agregar tipo de habitación', 'udemy'),
            'new_item_name'     => __('Nuevo tipo de habitación', 'udemy'),
            'menu_name'         => __('Tipo de habitación', 'udemy')
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'tipo-habitacion'),

            // campos api rest
            'show_in_rest'          => true,
            'rest_base'             => 'tipo-habitacion',
            'rest_controller_class' => 'WP_REST_Terms_Controller'
        );

        register_taxonomy('tipo-habitacion', $post_types, $args);

    }

    public function atr_metadatos_cpt(){
        // add_post_meta( 62, 'mimetadato', 'un valor cualquiera' );
        delete_post_meta( 62, 'mimetadato' );

        /* add_post_meta( 62, 'colores', 'azul' );
        add_post_meta( 62, 'colores', 'verde' );
        add_post_meta( 62, 'colores', 'rojo' ); */

        delete_post_meta( 62, 'colores' );
    }
}