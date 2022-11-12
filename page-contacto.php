<?php 
    /* 
    Template Name: Page Contacto
    */
?>

<?php 
get_header(); ?>

<div class="container">
    <div class="row">
        <div class="row mt-4">
            <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                <p>Esta es la página page-contacto.php</p>
            </div>
            <!-- Aquí el sidebar -->
            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                <h3>Sidebar de Contacto</h3>
                <?php get_sidebar('contacto'); ?>
            </div>
        </div>
    </div>
</div> 

<?php get_footer();