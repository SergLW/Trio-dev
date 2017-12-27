<section class="b-object-sales h-object-sales">
  <div class="controls l-object-sales__adress-container">
    <img src="<?php echo get_template_directory_uri(); ?>/images/ob4sales.png" alt="Объекты в продаже" class="b-object-sales__title-img icon" />
    <h3 class="b-object-sales_head">Объекты в продаже</h3>
    <hr class="b-object-sales-title-devider" />
    <?php
    $mypost = array( 'post_type' => 'trio_objects', 'posts_per_page' => 50 );
    $loop1 = new WP_Query( $mypost );
    $i=1;
    while ( $loop1->have_posts() ) : $loop1->the_post();
      if( has_term('objects_on_sale', 'trio_objects_category') ) :  ?>
        <a class="b-object-sales__adress-link" data-filter=".category_s-<?php echo $i; ?>"><?php the_title($loop1->ID); ?></a>
        <?php
      endif;
      $i++;
    endwhile;
    wp_reset_query();
    ?>
    <h3 class="b-object-sales_head">Реализованные объекты
    </h3>
    <hr class="b-object-sales-adress-devider" />
    <?php
    $mypost = array( 'post_type' => 'trio_objects', 'posts_per_page' => 50  );
    $loop = new WP_Query( $mypost );
    $j=1;
    while ( $loop->have_posts() ) : $loop->the_post();
      if( has_term('objects_implemented', 'trio_objects_category') ) :  ?>
        <a class="b-object-sales__adress-link2" data-filter=".category_r-<?php echo $j; ?>"><?php the_title($loop->ID); ?></a>

        <?php
      endif;
      $j++;
    endwhile;
    wp_reset_query();
    ?>
  </div>
  <div class="container2 l-object-sales__gallery">
    <?php
    $mypost = array( 'post_type' => 'trio_objects', 'posts_per_page' => 50  );
    $loop3 = new WP_Query( $mypost );
    $i=1;
    while ( $loop3->have_posts() ) : $loop3->the_post(); ?>

      <span class="mix <?php if( has_term('objects_on_sale', 'trio_objects_category') ) : ?>
            category_s-<?php echo $i; elseif( has_term('objects_implemented', 'trio_objects_category') ) : ?>category_r-<?php echo $i; endif; ?>">
        <?php
        if( have_rows('object_image_gallery_repeater') ):
            $j = 0;
          while ( have_rows('object_image_gallery_repeater') ) : the_row();
              $j++;
              if( $j > 9 ): break; endif;

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
                <a class="b-object-sales-img-link <?php if( has_term('objects_on_sale', 'trio_objects_category') ) : ?>
                cat_s-<?php echo $i; elseif( has_term('objects_implemented', 'trio_objects_category') ) : ?>cat_r-<?php echo $i; endif; ?>" href="<?php echo $url; ?>">
                    <img src="<?php echo $thumb;  ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                </a>

          <?php

             endif;
          endwhile;

        endif;
        ?>
        <a href="<?php echo get_permalink($loop3->ID); ?>" class="b-object-sales-link-button">перейти в раздел</a>
      </span>
      <?php
       $i++;
    endwhile;
    wp_reset_query();
    ?>
  </div>
</section>