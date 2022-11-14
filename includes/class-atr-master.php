<?php 
class ATR_Master{
    protected $cargador;
    protected $theme_name;
    protected $version;

    public function __construct(){
        $this->theme_name = 'ATR_Udemy';
        $this->version = '1.0.0';

        $this->cargar_dependencias();
        $this->cargar_instancias();
        $this->set_idiomas();
        $this->definir_admin_hooks();
        $this->definir_public_hooks();
    }

    private function cargar_dependencias(){
        /* 
        * La clase responsable de iterar las acciones y filtros del núcleo del theme
        */
        require_once ATR_DIR_PATH . 'includes/class-atr-cargador.php';

        /* 
        * La clase responsable de definir la funcionalidad de la internacionalización del theme
        */
        require_once ATR_DIR_PATH . 'includes/class-atr-i18n.php';

        /* 
        * La clase responsable de registrar menús y submenús en el área de administración
        */
        require_once ATR_DIR_PATH . 'includes/class-atr-build-menupage.php';

        /* 
        * La clase responsable de definir todas las acciones en el área de administración
        */
        require_once ATR_DIR_PATH . 'admin/class-atr-admin.php';

        /* 
        * La clase responsable de definir todas las acciones en el área del lado del cliente/público
        */
        require_once ATR_DIR_PATH . 'public/class-atr-public.php';

        /* 
        * La clase responsable de crear nuevos widgets
        * widgets personalizados para un sidebar
        */
        require_once ATR_DIR_PATH . 'includes/class-atr-widgets.php';

        /* 
        * La clase responsable de crear los CPT
        */
        require_once ATR_DIR_PATH . 'includes/class-atr-cpt.php';

        /* 
        * La clase responsable de crear los metaboxes
        */
        require_once ATR_DIR_PATH . 'includes/class-atr-metaboxes.php';
    }

    private function set_idiomas(){
        $atr_i18n = new ATR_i18n();
        $this->cargador->add_action('after_setup_theme', $atr_i18n, 'load_theme_textdomain');
    }

    public function registro_widgets(){
        register_widget('ATR_Widgets');
    }

    private function cargar_instancias(){
        /* 
        * cree una instancia del cargador que se utilizará para registrar los ganchos con wordpress
        */

        $this->cargador         = new ATR_Cargador;
        $this->atr_admin        = new ATR_Admin($this->get_theme_name(), $this->get_version());
        $this->atr_public       = new ATR_Public($this->get_theme_name(), $this->get_version());
        $this->atr_cpt          = new ATR_CPT();
        $this->atr_metaboxes    = new ATR_Metaboxes();
    }

    private function definir_admin_hooks(){

        // encolamiento archivos css y js
        $this->cargador->add_action( 'admin_enqueue_scripts', $this->atr_admin, 'enqueue_styles' );
        $this->cargador->add_action( 'admin_enqueue_scripts', $this->atr_admin, 'enqueue_scripts' );

        $this->cargador->add_action( 'admin_menu', $this->atr_admin, 'add_menu' );

        // gancho para widgets
        $this->cargador->add_action( 'widgets_init', $this, 'registro_widgets' );

        // gancho para el CPT
        $this->cargador->add_action( 'init', $this->atr_cpt, 'atr_cpt_habitaciones' );
        $this->cargador->add_action( 'init', $this->atr_cpt, 'atr_taxonomia_habitaciones' );
        $this->cargador->add_action( 'init', $this->atr_cpt, 'atr_metadatos_cpt' );

        // gancho para metaboxes
        $this->cargador->add_action( 'add_meta_boxes', $this->atr_metaboxes, 'atr_add_caja_personalizada' );
        $this->cargador->add_action( 'save_post', $this->atr_metaboxes, 'atr_save_metacaja_datos' );

    }

    private function definir_public_hooks(){
        $this->cargador->add_action('wp_enqueue_scripts', $this->atr_public, 'enqueue_styles');
        $this->cargador->add_action('wp_enqueue_scripts', $this->atr_public, 'enqueue_scripts');
        
        // add menú frontend
        $this->cargador->add_action('init', $this->atr_public, 'atr_theme_support');

        // registro de sidebars
        $this->cargador->add_action( 'init', $this->atr_public, 'atr_register_sidebars' );
    }

    private function get_theme_name(){
        return $this->theme_name;
    }

    private function get_version(){
        return $this->version;
    }

    public function get_cargador(){
        return $this->cargador;
    }

    public function run(){
        $this->cargador->run();
    }
}