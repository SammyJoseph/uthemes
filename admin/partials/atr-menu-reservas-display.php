<div class="wrap">
    <h3>Este es el HTML de nuestro menú page con MVC</h3>
    <?php 
        $usuarios = new ATR_Database;
        // $usuarios->atr_get_usuarios();
        // $usuarios->atr_insert_usuarios();
        // $usuarios->atr_replace_usuarios();
        // $usuarios->atr_update_usuario();
        // $usuarios->atr_delete_usuario();
        $usuarios->atr_sql_personalizado();
    ?>
</div>

<?php 
    // $screen = get_current_screen();
    // print_r($screen);
?>