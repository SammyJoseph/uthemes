<?php
/* 
*   Página para todas las entradas de blog
*/

get_header(); ?>

<div class="container">
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <div class="row mb-4">
                <div class="col-lg-4 col-xl-4">
                    <!-- 2 opciones para que la imagen tenga la clase fluida (img-fluid) -->
                    <!-- <?php the_post_thumbnail('full', array('class' => 'img-fluid attachment-post-thumbnail size-post-thumbnail')); ?> -->
                    <img src="<?php the_post_thumbnail_url($post->ID) ?>" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 col-xl-8">
                    <?php the_title(); ?>
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>