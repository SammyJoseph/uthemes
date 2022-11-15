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
        $resultado = $wpdb->get_col( $sql, 1 );
        var_dump($resultado);

    }

}