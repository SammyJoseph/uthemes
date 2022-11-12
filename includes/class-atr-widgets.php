<?php 

class ATR_Widgets extends WP_Widget{
    public function __construct(){

        $widget_options = [
            'classname'     => 'atr_widget',
            'description'   => 'Widget de pruebas'
        ];
        
        $control_options = [
            'width'     => '500',
            'height'    => '200'
        ];

        parent::__construct('atr_widget', 'Widget Personalizado', $widget_options, $control_options);

    }

    public function form($instance){

        /* 
        * Guardamos los valores para el título
        */
        $titulo_id =    $this->get_field_id('titulo');
        $titulo_name =  $this->get_field_name('titulo');
        $titulo_val =   esc_attr($instance['titulo']);

        /* 
        * Guardamos los valores para el cuerpo
        */
        $cuerpo_id =    $this->get_field_id('cuerpo');
        $cuerpo_name =  $this->get_field_name('cuerpo');
        $cuerpo_val =   esc_attr($instance['cuerpo']);

        $form = "
            <label for='$titulo_id'>Título</label>
            <input type='text' id='$titulo_id' name='$titulo_name' value='$titulo_val'>
            
            <label for='$cuerpo_id'>Cuerpo</label>
            <textarea id='$cuerpo_id' name='$cuerpo_name'>$cuerpo_val</textarea>
        ";

        echo $form;

    }

    public function update($new_instance, $old_instance){
        return $new_instance;
    }

    public function widget($args, $instance){
        extract($args, EXTR_SKIP);
        
        $titulo = isset($instance['titulo']) ? $instance['titulo'] : 'Por favor, coloca un título';
        $cuerpo = isset($instance['cuerpo']) ? $instance['cuerpo'] : 'Por favor, coloca un texto en el cuerpo';

        $output = "
            $before_widget
            $before_title $titulo $after_title
            <p>
            $cuerpo
            </p>
            $after_widget
        ";

        echo $output;
    }
}