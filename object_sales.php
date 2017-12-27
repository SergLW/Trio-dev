<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumbs', 'breadcrumbs' ); ?>


<div class="h-objects innerParallax">
    <div class="b-objects-slide">
        <img src="<?php echo get_template_directory_uri(); ?>/images/objects-left-bg.png" alt="" class="b-objects-slide__corn-left"/>
        <img src="<?php echo get_template_directory_uri(); ?>/images/objects-right-bg.png" alt="" class="b-objects-slide__corn-right"/>
        <div class="l-objects">
            <img src="<?php echo get_template_directory_uri(); ?>/images/objects-light-icon.png" alt="Объекты в продаже" class="b-objects__icon"/>
            <h2 class="b-objects__header"><?php wp_title(''); ?></h2>
            <p class="b-objects__content">
                <?php the_field('pages_descripton_objects'); ?>
            </p>
        </div>
    </div>
</div>

<div class="bg-wrapper">
    <?php
        $mypost = array( 'post_type' => 'trio_objects', 'posts_per_page' => 20 );
        $loop1 = new WP_Query( $mypost );
while ( $loop1->have_posts() ) : $loop1->the_post();
            if( has_term('objects_on_sale', 'trio_objects_category', $loop1->ID) ) :  ?>
                <div class="l-object-info clearfix">
                    <h3 class="b-object-info__name"><?php the_title($loop1->ID); ?></h3>
                    <a href="http://<?php the_field('sale_object_link', $loop1->ID); ?>" class="b-object-info__site" target="_blank"><?php the_field('sale_object_link', $loop1->ID); ?></a>
                </div>
                <div class="b-released-item-content clearfix">
                    <?php if (get_field('project_address')) :  ?>
                        <div class="b-releazed-item-content__property-name">Адрес проекта:
                            <span class="b-releazed-item-content__property-value"><?php the_field('project_address', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('type_of_construction')) :  ?>
                        <div class="b-releazed-item-content__property-name">Вид строительства:
                            <span class="b-releazed-item-content__property-value"><?php the_field('type_of_construction', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('assignment_of_object')) :  ?>
                        <div class="b-releazed-item-content__property-name">Назначение объекта:
                            <span class="b-releazed-item-content__property-value"><?php the_field('assignment_of_object', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('year_of_commissioning')) :  ?>
                        <div class="b-releazed-item-content__property-name">Год ввода в эксплуатацию:
                            <span class="b-releazed-item-content__property-value"><?php the_field('year_of_commissioning', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('object_functions')) :  ?>
                        <div class="b-releazed-item-content__property-name">Выполняемые функции:
                            <span class="b-releazed-item-content__property-value"><?php the_field('object_functions', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('total_area_of_object')) :  ?>
                        <div class="b-releazed-item-content__property-name">Общая площадь объекта, м<sup><small>2</small></sup>:
                            <span class="b-releazed-item-content__property-value"><?php the_field('total_area_of_object', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('building_volume_of_object')) :  ?>
                        <div class="b-releazed-item-content__property-name">Строительный объем, м<sup><small>3</small></sup>:
                            <span class="b-releazed-item-content__property-value"><?php the_field('building_volume_of_object', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('number_of_floors')) :  ?>
                        <div class="b-releazed-item-content__property-name">Количество этажей:
                            <span class="b-releazed-item-content__property-value"><?php the_field('number_of_floors', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('number_of_parking_spaces')) :  ?>
                        <div class="b-releazed-item-content__property-name">Количество машиномест:
                            <span class="b-releazed-item-content__property-value"><?php the_field('number_of_parking_spaces', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('number_of_apartments')) :  ?>
                         <div class="b-releazed-item-content__property-name">Количество квартир:
                            <span class="b-releazed-item-content__property-value"><?php the_field('number_of_apartments', $loop1->ID); ?></span>
                        </div>
                    <?php endif; ?>
                    <a class="b-releazed-item-content__btn" href="<?php echo get_permalink($loop1->ID); ?>">ПОДРОБНЕЕ</a>
                </div>
            <?php
        endif;
    endwhile;
    wp_reset_query();
    ?>

    <section class="b-released">
        <div class="b-releazed-description">
            <div class="h-releazed-description">
                <img class="b-releazed-description__icon"
                     src="<?php echo get_template_directory_uri(); ?>/images/released-obj.png" alt="Реализованные объекты"/>
                <h2 class="b-objects__header b-released-description__header">Реализованные объекты</h2>
                <div class="b-released-description__content">
                    <?php the_field('content_page_objects'); ?>
                </div>
            </div>
        </div>

<?php
$mypost = array( 'post_type' => 'trio_objects', 'posts_per_page' => 20 );
$loop = new WP_Query( $mypost );
$i = 1;
while ( $loop->have_posts() ) : $loop->the_post();
    if( has_term('objects_implemented', 'trio_objects_category', $loop->ID) ) :  ?>
        <section class="b-released-item">
            <div class="b-released-item__name"><?php the_title($loop->ID); ?></div>

            <input id="item_toggle<?php echo $i;?>" type="checkbox" class="b-released-item__input"/>
            <label for="item_toggle<?php echo $i;?>" class="b-released-item__label"><img class="b-released-item__choose-icon" src="<?php echo get_template_directory_uri(); ?>/images/checkbox_whitecross.svg" alt="Крестик"/></label>

            <div class="b-released-item-content--hidden clearfix">
        <?php if (get_field('project_address')) :  ?>
            <div class="b-releazed-item-content__property-name">Адрес проекта:
                <span class="b-releazed-item-content__property-value"><?php the_field('project_address', $loop->ID); ?></span>
            </div>
        <?php endif; ?>
        <?php if (get_field('type_of_construction')) :  ?>
            <div class="b-releazed-item-content__property-name">Вид строительства:
                <span class="b-releazed-item-content__property-value"><?php the_field('type_of_construction', $loop->ID); ?></span>
            </div>
        <?php endif; ?>
        <?php if (get_field('assignment_of_object')) :  ?>
            <div class="b-releazed-item-content__property-name">Назначение объекта:
                <span class="b-releazed-item-content__property-value"><?php the_field('assignment_of_object', $loop->ID); ?></span>
            </div>
        <?php endif; ?>
        <?php if (get_field('year_of_commissioning')) :  ?>
            <div class="b-releazed-item-content__property-name">Год ввода в эксплуатацию:
                <span class="b-releazed-item-content__property-value"><?php the_field('year_of_commissioning', $loop->ID); ?></span>
            </div>
        <?php endif; ?>
        <?php if (get_field('object_functions')) :  ?>
            <div class="b-releazed-item-content__property-name">Выполняемые функции:
                <span class="b-releazed-item-content__property-value"><?php the_field('object_functions', $loop->ID); ?></span>
            </div>
        <?php endif; ?>
        <?php if (get_field('total_area_of_object')) :  ?>
            <div class="b-releazed-item-content__property-name">Общая площадь объекта, м<sup><small>2</small></sup>:
                <span class="b-releazed-item-content__property-value"><?php the_field('total_area_of_object', $loop->ID); ?></span>
            </div>
        <?php endif; ?>
        <?php if (get_field('building_volume_of_object')) :  ?>
            <div class="b-releazed-item-content__property-name">Строительный объем, м<sup><small>3</small></sup>:
                <span class="b-releazed-item-content__property-value"><?php the_field('building_volume_of_object', $loop1->ID); ?></span>
            </div>
        <?php endif; ?>
        <?php if (get_field('number_of_floors')) :  ?>
            <div class="b-releazed-item-content__property-name">Количество этажей:
                <span class="b-releazed-item-content__property-value"><?php the_field('number_of_floors', $loop->ID); ?></span>
            </div>
        <?php endif; ?>
            <?php if (get_field('number_of_parking_spaces')) :  ?>
                <div class="b-releazed-item-content__property-name">Количество машиномест:
                    <span class="b-releazed-item-content__property-value"><?php the_field('number_of_parking_spaces', $loop->ID); ?></span>
                </div>
            <?php endif; ?>
            <?php if (get_field('number_of_apartments')) :  ?>
                <div class="b-releazed-item-content__property-name">Количество квартир:
                    <span class="b-releazed-item-content__property-value"><?php the_field('number_of_apartments', $loop->ID); ?></span>
                </div>
            <?php endif; ?>
                <a class="b-releazed-item-content__btn" href="<?php echo get_permalink($loop->ID); ?>">ПОДРОБНЕЕ</a>
            </div>
        </section>
        <?php
    endif;
    $i++;
endwhile;
wp_reset_query();
?>

    </section>
    <div class="b-released__tagline"<?php the_field('slogan_over_footer'); ?></div>
</div>

<?php get_footer(); ?>
