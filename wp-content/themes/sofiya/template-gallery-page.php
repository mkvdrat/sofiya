<?php
/*
Template name: Gallery page
*/

get_header(); 
?>

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
                    <div class="col-lg-12">
                        <h1><?php echo get_field('title_gallery_page'); ?></h1>
                        <div class="sub__title"><?php echo get_field('text_gallery_page'); ?></div>
                        
                        <div class="grid__gallery">
                            <div class="row__8">
                                <?php
                                    global $nggdb;
                                    $gallery_id = getNextGallery(get_the_ID(), 'image_gallery_page');
                                    $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                                    if($gallery_image){
                                        foreach($gallery_image as $image) { 
                                    ?>
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <a href="<?php echo nextgen_esc_url($image->imageURL); ?>" data-fancybox="gallery" data-caption="<?php echo htmlspecialchars_decode($image->alttext); ?>" class="gallery__item">
                                                <div class="background__image" style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')"></div>
                                                <div class="gallery__title"><?php echo $image->alttext; ?></div>
                                            </a>
                                        </div>
                                    <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
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
     
<?php get_footer(); ?>