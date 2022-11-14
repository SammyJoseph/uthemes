<?php 

class ATR_Metaboxes{
    protected $post_type;

    public function __construct(){
        $this->post_type = ['post', 'cpt_habitaciones'];
    }

    public function atr_add_caja_personalizada(){
        add_meta_box( 
            'atr_mi_metabox', 
            'Datos Extra', 
            [$this, 'atr_metacaja_html'], 
            $this->post_type, 'normal', 
            'high', 
            null 
        );
    }

    public function atr_metacaja_html( $post ){

        $atr_dato   = get_post_meta( $post->ID, 'atr_datos',   true );
        $tiempo     = isset( $atr_dato['tiempo'] ) ? $atr_dato['tiempo'] : '';
        $precio     = isset( $atr_dato['precio'] ) ?    $atr_dato['precio'] : '';
        $valoracion = isset( $atr_dato['valoracion'] ) ? $atr_dato['valoracion'] : '';
        $editor     = isset( $atr_dato['editor'] ) ? $atr_dato['editor'] : '';

        $html = "
        <div>
            <label for='atr_tiempo'>Tiempo</label>
            <input type='text' name='atr_dato[tiempo]' id='atr_tiempo' value='$tiempo'>
        </div>
        <div>
            <label for='atr_precio'>Precio</label>
            <input type='text' name='atr_dato[precio]' id='atr_precio' value='$precio'>
        </div>
        <div>
            <label for='atr_valoracion'>Valoración</label>
            <select name='atr_dato[valoracion]' id='atr_valoracion'>
                <option value=''>Selecciona tu valoración</option>
                <option value='1' " . selected( $valoracion, 1, false) . ">1</option>
                <option value='2' " . selected( $valoracion, 2, false) . ">2</option>
                <option value='3' " . selected( $valoracion, 3, false) . ">3</option>
                <option value='4' " . selected( $valoracion, 4, false) . ">4</option>
                <option value='5' " . selected( $valoracion, 5, false) . ">5</option>
            </select>
        </div>
        ";

        echo $html;

        wp_editor($editor, 'atr_dato[editor]', ['media_buttons' => true]);
    }

    public function atr_save_metacaja_datos( $post_id ){
        if ( array_key_exists('atr_dato', $_POST)) {
            update_post_meta( 
                $post_id, 
                'atr_datos', 
                $_POST['atr_dato'] 
            );
        }
    }

}

