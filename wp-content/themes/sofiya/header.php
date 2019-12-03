<?php
/*
Theme Name: Sofiya
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo mkvadrat_wp_title('','|', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php wp_head(); ?>
</head>
<body>
    
<!-- The page -->
<div class="page">
    <header class="header">
        <div class="header__middle">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-lg-5">
                        <p><?php echo get_field('title_header_main_page', '15'); ?></p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-lg-3">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                            <img
                              src="<?php header_image(); ?>"
                              height="<?php echo get_custom_header()->height; ?>"
                              width="<?php echo get_custom_header()->width; ?>"
                              alt="logotype"
                            />
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-right"><a href="tel:<?php echo get_field('phone_header_main_page', '15'); ?>;"><?php echo get_field('phone_header_main_page', '15'); ?></a></div>
                </div>
            </div>
        </div>
        <div class="header__bottom hidden-xs hidden-sm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="menu__top">
                            <?php
                                if (has_nav_menu('header_a_menu')){
                                    wp_nav_menu( array(
                                        'theme_location'  => 'header_a_menu',
                                        'menu'            => '',
                                        'container'       => false,
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => '',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul class="nav">%3$s</ul>',
                                        'depth'           => 2,
                                        'walker'          => new header_menu(),
                                    ) );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <?php if( have_rows('slider_header_main_page')){ ?>
    <div class="slider__main">
        <div class="owl-carousel">
            <?php while ( have_rows('slider_header_main_page') ) { the_row(); ?>
            <div class="item" style="background-image: url('<?php echo get_sub_field('image_subblock_header_main_page'); ?>')">
                <div class="carousel__inner">
                    <div class="carousel__title"><?php echo get_sub_field('text_subblock_header_main_page'); ?></div>
                    <a href="<?php echo get_sub_field('link_subblock_header_main_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php }else{ ?>
    <div class="slider__main">
        <div class="owl-carousel">
            <div class="item" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/image/slide-01.jpg')">
                <div class="carousel__inner">
                    <div class="carousel__title">Изысканный отель с европейским качеством в двух минутах от моря</div>
                    <a href="#" class="btn btn__link">ПОДРОБНЕЕ</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    