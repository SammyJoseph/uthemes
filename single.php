<?php 
/* 
*   Esta es la página para cada entrada del blog
*/
get_header(); ?>

<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12 col-md-8 col-lg-7">
            <div class="imagen">
                <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" class="img-fluid" alt="">
            </div>
            <div class="titulo">
                <h3><?php echo get_the_title() ?></h3>
            </div>
            <div class="contenido">
                <?php the_content(); ?>
            </div>
        </div>
        <!-- Aquí el sidebar -->
        <div class="col-sm-12 col-md-4 col-lg-5">
            <?php get_sidebar('blog'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>