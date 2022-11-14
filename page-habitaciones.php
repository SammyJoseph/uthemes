<?php 
    /* 
    Template Name: Page Habitaciones
    */
?>

<?php 
get_header(); ?>

<?php 
    $paged = ( get_query_var('paged') ) ? absint( get_query_var('paged') ) : 1;
?>

<?php 
    $args = array(
        'post_type'         => 'cpt_habitaciones',
        'posts_per_page'    => 2,
        'date'              => 'rand',
        'post_status'       => 'publish',
        'paged'             => $paged
    );

    $rooms = new WP_Query($args);
?>

<div class="container">
    <?php while ( $rooms->have_posts() ) : $rooms->the_post(); ?>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
                <img src="<?php echo the_post_thumbnail_url() ?>" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <a href="<?php the_permalink(); ?>" class="rooms-title">
                    <?php the_title( '<h3>', '</h3>' ) ?>
                </a>
                <a href="<?php the_permalink(); ?>" class="rooms-content">
                    <?php the_content() ?>
                    <?php 
                        $custom_field = get_post_custom( $post->ID );
                        // var_dump($custom_field);

                        /* $helados = $custom_field['Helados'];
                        echo "<ul>";
                        foreach ($helados as $helado) {
                            echo "<li> $helado </li> ";
                        }
                        echo "</ul>" */

                        the_meta(); // deprecated
                    ?>
                    <!-- <?php var_dump(get_post_meta( 62, 'mimetadato', true )); ?> -->
                    <!-- <?php var_dump(get_post_meta( 62, 'colores' )); ?> -->
                </a>
                <?php 
                    // the_terms($post->ID, 'tipo-habitacion', 'Tipo: ', ', ', '.');
                    /* $tax_habitacion = get_the_term_list( 
                        $post->ID,
                        'tipo-habitacion', 
                        '<ul class="tipo-habitacion"><li>', 
                        '</li><li>', 
                        '</li></ul>'
                    );
                    echo $tax_habitacion;

                    $terms = get_terms( array(
                        'taxonomy'      => 'tipo-habitacion',
                        'hide_empty'    => false
                    ) );
                    var_dump($terms); */
                
                ?>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata() ?> 
    <div class="row-paginate-links">
        <?php 
            $paginado = new ATR_CPT;
            $paginado->atr_pagination_post($rooms);
        ?>
    </div>
</div> 

<?php get_footer();