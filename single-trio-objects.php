<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumbs', 'breadcrumbs' ); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div class="l-object-head clearfix">
        <h3 class="b-object-head-name"><?php the_title(); ?></h3>
        <?php if( has_term('objects_on_sale', 'trio_objects_category') ) :  ?>
            <a href="http://<?php the_field('sale_object_link'); ?>" class="b-object-head-site"><?php the_field('sale_object_link'); ?></a>
        <?php endif; ?>
    </div>
    <div class="l-object-description">
        <?php the_content(); ?>
    </div>


<?php if( get_field('add_category_gallery_objects')): ?>
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
    <?php     endif;     ?>
<div class="<?php if( get_field('add_category_gallery_objects')): ?>container<?php endif; ?> l-object-trade__gallery">
    <?php
    if( have_rows('object_image_gallery_repeater') ):
        while ( have_rows('object_image_gallery_repeater') ) : the_row();

            $image = get_sub_field('single_object_image');
            if( !empty($image) ):
                // vars
                $url = $image['url'];
                $alt = $image['alt'];
                // thumbnail
                $size = 'thumbnail';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];
                 ?>
            <span class="mix <?php the_sub_field('object_filter_category'); ?>">
                <a href="<?php echo $url; ?>" class="b-object-trade-img-link" >
                    <img src="<?php echo $thumb;  ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                </a>
            </span>
        <?php
                endif;
            endwhile;
        endif;
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
        jQuery('.l-object-trade__gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            midClick: true,
            preloader: true,
            removalDelay: 300,
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                tCounter: '%curr% из %total%',
                preload: [0,1]
            }
        });
        });
    </script>
</div>

    <section class="h-map h-map-obj4sales">
        <?php
        $location = get_field('object_pointer');

        if( !empty($location) ):
            ?>
            <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                    <?php if (get_field('title_address_object')) :  ?>
                        <p><?php the_field('title_address_object'); ?></p>
                    <?php else : ?>
                        <p class="address"><?php echo $location['address']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
</section>

<p class="b-trade-tagline"><?php the_field('slogan_over_footer_objects'); ?></p>

<?php endwhile; endif;?>

<?php get_footer(); ?>
