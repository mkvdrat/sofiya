<?php
/*
Theme Name: Sofiya
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

get_header(); ?>


    <div class="top__banner">
        <div class="background__image bg__shadow" style="background-image: url('/wp-content/themes/sofiya/image/slide-01.jpg')">
            <div class="banner__title content__shadow"><?php the_title(); ?></div>
        </div>
    </div>
    
    <div class="content">
        <div class="info__block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (have_posts()): while (have_posts()): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
