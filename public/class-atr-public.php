<?php 

class ATR_Public{

    private $theme_name;
    private $version;

    public function __construct($theme_name, $version){
        $this->theme_name = $theme_name;
        $this->version = $version;
    }

    public function enqueue_styles(){

        wp_enqueue_style(
            'normalize-css',
            ATR_DIR_URI .'public/css/normalize.css',
            array(),
            '8.0',
            'all'
        );
    
        wp_enqueue_style(
            'public-css',
            ATR_DIR_URI .'public/css/atr-public.css',
            array(), //array vacío para que no se encole ningún archivo antes de nuestro CSS principal
            $this->version,
            'all'
        );
    
        wp_enqueue_style(
            'bootstrap-css',
            ATR_DIR_URI .'helpers/bootstrap-5.2/css/bootstrap.min.css',
            array(), 
            '5.2',
            'all'
        );

        wp_enqueue_style(
            'fontawesome-css',
            ATR_DIR_URI .'helpers/fontawesome-6.2/css/fontawesome.min.css',
            [], 
            '6.2',
            'all'
        );

        wp_enqueue_style(
            'brands-css',
            ATR_DIR_URI .'helpers/fontawesome-6.2/css/brands.min.css',
            [], 
            '6.2',
            'all'
        );
    
    }
    //add_action('wp_enqueue_scripts', 'pw_enqueue_styles');
    
    public function enqueue_scripts(){
        
        wp_enqueue_script(
            'public-js',
            ATR_DIR_URI .'public/js/atr-public.js',
            ['jquery', 'bootstrap-js'], //encolar antes estos archivos (para que funcione correctamente)
            $this->version,
            true //colocar al final del body
        );
    
        wp_enqueue_script(
            'bootstrap-js',
            ATR_DIR_URI .'helpers/bootstrap-5.2/js/bootstrap.min.js',
            ['jquery'],
            '5.2',
            true 
        );

        wp_enqueue_script(
            'fontawesome-js',
            ATR_DIR_URI .'helpers/fontawesome-6.2/js/fontawesome.min.js',
            [], 
            '6.2',
            'all'
        );

        wp_enqueue_script(
            'brands-js',
            ATR_DIR_URI .'helpers/fontawesome-6.2/js/brands.min.js',
            [], 
            '6.2',
            'all'
        );
    }
    //add_action('wp_enqueue_scripts', 'pw_enqueue_scripts');

    /* 
    * Aquí cargaremos algunas funciones para ajustar el menú del frontend
     */
    public function atr_theme_support(){
        // registrar menú
        register_nav_menus([
            'menu_principal' => __('Menú Principal', 'udemy'),
            'menu_redes_sociales' => __('Redes Sociales', 'udemy')
        ]);

        // array para añadir las propiedas al logo
        $logo = [
            'width'         => 230,
            'height'        => 80,
            'flex-width'    => true,
            'flex-height'   => true,
            'header-text'   => array('udemy', 'Udemy Themes')
        ];

        add_theme_support('custom-logo', $logo);

        // añade la función de imagen destacada a páginas y entradas
        add_theme_support('post-thumbnails');

        // widgets
        add_theme_support('widgets');
        //remove_theme_support('widgets-block-editor'); /* vuelve a la versión antigua de widgets */
    }

    public function atr_register_sidebars(){
        /* 
        * Sidebar para el blog
        */
        register_sidebar(array(
            'name' =>           __('Sidebar Blog', 'udemy'),
            'id' =>             'blog',
            'description' =>    __('Sidebar para el blog', 'udemy'),
            'before_widget' =>  '<div class="%1$s" id="widget-blog">',
            'after_widget' =>   '</div>',
            'before_title' =>  '<h3 class="widget-blog">',
            'after_title' =>   '</h3>',
        ));

        /* 
        * Sidebar para la página de contacto
        */
        register_sidebar(array(
            'name' =>           __('Sidebar Contacto', 'udemy'),
            'id' =>             'contacto',
            'description' =>    __('Sidebar para la página contacto', 'udemy'),
            'before_widget' =>  '<div class="%1$s" id="widget-contacto">',
            'after_widget' =>   '</div>',
            'before_title' =>  '<h3 class="widget-contacto">',
            'after_title' =>   '</h3>',
        ));
    }
     
}