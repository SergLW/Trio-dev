<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumbs', 'breadcrumbs' ); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div class="l-object-head clearfix">
        <h3 class="b-object-head-name"><?php the_title(); ?></h3>
        <?php if( has_term('objects_on_sale', 'trio_objects_category') ) :  ?>
            <a href="<?php the_field('sale_object_link'); ?>" class="b-object-head-site"><?php the_field('sale_object_link'); ?></a>
        <?php endif; ?>
    </div>
    <div class="l-object-description">
        <?php the_content(); ?>
    </div>



<div class="controls b-object-trade-category">
    <?php
    if( have_rows('object_image_gallery_repeater') ): ?>
    <a class="b-object-trade-category-link" data-filter=".category-1">Архитектура</a>
    <a class="b-object-trade-category-link" data-filter=".category-2">Благоустройство</a>
    <a class="b-object-trade-category-link" data-filter=".category-3">Лобби</a>
        <?php
    endif;
    ?>
</div>

<div class="container l-object-trade__gallery">
    <?php
    if( have_rows('object_image_gallery_repeater') ):
        while ( have_rows('object_image_gallery_repeater') ) : the_row();

            ?>
            <a href="<?php the_sub_field('single_object_image'); ?>" class="mix <?php the_sub_field('object_filter_category'); ?> b-object-trade-img-link" >
                <img src="<?php the_sub_field('single_object_image'); ?>" />
            </a>
            <?php
        endwhile;
    else :
        // no rows found
    endif;
    ?>

</div>


    <section class="h-map h-map-obj4sales">
        <?php

        $location = get_field('object_pointer');

        if( !empty($location) ):
            ?>
            <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
        <?php endif; ?>

    <div id="map_container"></div>
    <div id="map"></div>
</section>

<p class="b-trade-tagline"><?php the_field('slogan_over_footer_objects'); ?></p>

<?php endwhile; endif;?>


<?php get_footer(); ?>
