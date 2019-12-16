<?php
/*
Theme Name: Sofiya
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

get_header(); 
?>
    
    <div class="top__banner">
        <div class="background__image bg__shadow" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ) . '/image/slide-01.jpg'; ?>')">
            <div class="banner__title content__shadow">404</div>
        </div>
    </div>

    <div class="content">
        <div class="order__block">
            <div class="order__inner">
                <?php echo get_field('booking_block_main_page', '15'); ?>
            </div>
        </div>

        <div class="parts__block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h1>Ошибка 404</h1>
                        <p>Данная страница не найдена или удалена.</p>
                        <hr/>
                        <div class="btn-group-back">
                            <a href="javascript:void(0)" class="btn btn__link back">Назад</a>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn__link">На главную</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="insta__block">
            <div class="inst__box">
                <?php
                    if ( function_exists('dynamic_sidebar') )
                        dynamic_sidebar('instagram-sidebar');
                ?>
            </div>
            <a href="<?php echo get_field('instagram_link_main_page', '15'); ?>" class="btn btn-black">ПОДПИСЫВАЙТЕСЬ НА ИНСТАГРАМ ОТЕЛЯ</a>
        </div>
    </div>
    
    <script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.back').click(function(){
            parent.history.back();
            return false;
        });
    });
    </script>
            
<?php get_footer(); ?>