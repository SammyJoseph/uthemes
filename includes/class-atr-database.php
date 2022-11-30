<?php 

class ATR_Database{

    protected $usuarios;

    public function __construct(){

        global $wpdb;
        $this->usuarios = "SELECT * FROM {$wpdb->prefix}usuarios";

    }

    public function atr_get_usuarios(){

        global $wpdb;
        $sql = $this->usuarios;
        // $resultado = $wpdb->get_var( $sql, 3, 2 );
        // $resultado = $wpdb->get_row( $sql );
        /* $resultado = $wpdb->get_col( $sql, 1 );
        var_dump($resultado); */

        /* $resultado = $wpdb->get_results( $sql );
        var_dump($resultado[1]->nombre); */
        
        $resultado = $wpdb->get_results( $sql, OBJECT_K );
        // var_dump($resultado);

    }

    public function atr_insert_usuarios(){
        
        global $wpdb;

        $tabla = $wpdb->prefix.'usuarios';
        $datos = [
            'id'        => null,
            'nombre'    => 'Ramiro',
            'apellido'  => 'Campos',
            'telefono'  => 987654321
        ];
        $formato = [
            '%d',
            '%s',
            '%s',
            '%d'
        ];

        $resultado = $wpdb->insert( $tabla, $datos, $formato );
        var_dump($resultado);

    }

    public function atr_replace_usuarios(){
        
        global $wpdb;

        $tabla = $wpdb->prefix.'usuarios';
        $datos = [
            'id'        => 4,
            'nombre'    => 'Ramiro',
            'apellido'  => 'Guzmán',
            'telefono'  => 987654329
        ];
        $formato = [
            '%d',
            '%s',
            '%s',
            '%d'
        ];

        $resultado = $wpdb->replace( $tabla, $datos, $formato );
        var_dump($resultado);

    }

    public function atr_update_usuario(){

        global $wpdb;

        $tabla = $wpdb->prefix.'usuarios';
        $datos = [
            'nombre'    => 'Gael'
        ];
        $formato = [
            '%s'
        ];
        $where = [
            'id'        => 4,
            'nombre'    => 'Ramiro'
        ];
        $where_formato = ['%d', '%s'];

        $resultado = $wpdb->update($tabla, $datos, $where, $formato, $where_formato);
        var_dump($resultado);

    }

    public function atr_delete_usuario(){

        global $wpdb;

        $tabla = $wpdb->prefix.'usuarios';
        $where = [
            'id'        => 4,
            'nombre'    => 'Gael'
        ];
        $where_formato = ['%d', '%s'];

        $resultado = $wpdb->delete($tabla, $where, $where_formato);
        var_dump($resultado);

    }

}