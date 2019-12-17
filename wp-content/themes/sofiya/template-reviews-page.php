<?php
/*
Template name: Reviews page
*/

get_header(); 
?>
<div class="standart__page">
    <div class="top__banner">
        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full'); ?>

        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
            <div class="banner__title content__shadow"><?php the_title(); ?></div>
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
                        <h1><?php echo get_field('title_reviews_page'); ?></h1>
                        <div class="sub__title"><?php echo get_field('text_reviews_page'); ?></div>
                        
                        <?php echo show_gwolle_gb($args = false); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if(get_post_meta( '15', 'enable_through_block_section_main_page', $single = true ) == 'yes'){ ?>
        <div class="main__seazone">
            <?php $image_url = get_field('image_open_block_main_page', '15'); ?>
            <div class="bg__item background__image bg__shadow" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '//wp-content/themes/sofiya/image/no_image.jpg'; ?>')">
                <div class="bg__inner content__shadow">
                    <div class="bg__title"><?php echo get_field('title_open_block_main_page', '15'); ?></div>
                    <div class="bg__tags"><?php echo get_field('text_open_block_main_page', '15'); ?></div>
                    <a href="<?php echo get_field('link_open_block_main_page', '15'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                </div>
            </div>
        </div>
        <?php } ?>

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
    </div>
    <script language="javascript">
        function submit(){
            $("#commentform").submit();
        }
    </script>

<?php get_footer(); ?>