<div class="wrap">
    <h3>Este es el HTML de nuestro menú page con MVC</h3>
    <?php 
        $usuarios = new ATR_Database;
        $usuarios->atr_get_usuarios();
    ?>
</div>

<?php 
    // $screen = get_current_screen();
    // print_r($screen);
?>