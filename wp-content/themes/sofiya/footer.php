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

    <footer>
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-5">
                        <?php if( have_rows('contact_footer_main_page')){ ?>
                        <ul class="footer__address">
                            <?php while ( have_rows('contact_footer_main_page') ) { the_row(); ?>
                            <li><?php echo get_sub_field('text_subblock_footer_main_page'); ?></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                        <?php if( have_rows('social_footer_main_page')){ ?>
                        <ul class="footer__soc">
                            <?php while ( have_rows('social_footer_main_page') ) { the_row(); ?>
                            <li><a href="<?php echo get_sub_field('link_subblock_footer_main_page'); ?>"><img src="<?php echo get_sub_field('image_subblock_footer_main_page'); ?>"/></a></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                    <div class="col-lg-7">
                        <div class="row footer__menu">
                            <div class="col-lg-4">
                                <?php
                                    if (has_nav_menu('footer_a_menu')){
                                        wp_nav_menu( array(
                                            'theme_location'  => 'footer_a_menu',
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
                                            'items_wrap'      => '<ul>%3$s</ul>',
                                            'depth'           => 1,
                                        ) );
                                    }
                                ?>
                            </div>
                            <div class="col-lg-4">
                                <?php
                                    if (has_nav_menu('footer_b_menu')){
                                        wp_nav_menu( array(
                                            'theme_location'  => 'footer_b_menu',
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
                                            'items_wrap'      => '<ul>%3$s</ul>',
                                            'depth'           => 1,
                                        ) );
                                    }
                                ?>
                            </div>
                            <div class="col-lg-4">
                                <?php
                                    if (has_nav_menu('footer_c_menu')){
                                        wp_nav_menu( array(
                                            'theme_location'  => 'footer_c_menu',
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
                                            'items_wrap'      => '<ul>%3$s</ul>',
                                            'depth'           => 1,
                                        ) );
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="row row-flex">
                    <div class="col-lg-8"><?php echo get_field('copyright_a_block_footer_main_page', '15'); ?></div>
                    <div class="col-lg-4"><?php echo get_field('copyright_b_block_footer_main_page', '15'); ?></div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
