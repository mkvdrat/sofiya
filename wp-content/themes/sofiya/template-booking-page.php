<?php
/*
Template name: Booking page
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

		<?php echo get_field('description_standart_page'); //Удалить строку и Сюда верстать?>

        <?php
            $args = array(
                'numberposts' => '3',
                'category'    => '11,14',
                'post_type'   => 'post',
                'orderby'     => 'date',
                'order'       => 'DESC',
            );

            $lists = get_posts( $args );
        ?>
        
        <?php if($lists){ ?>
        <div class="action__news">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title"><?php echo get_field('title_list_block_main_page', 15); ?></div>
                    </div>
                </div>
                <div class="row__8">
                    <?php
                        foreach($lists as $list){
                        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($list->ID), 'full');
                    ?>
                    <div class="col-xs-12 col-sm-4">
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="an__content content__shadow">
                                <?php $cat = get_the_category( $list->ID ); ?>
                                <div class="an__tag"><?php echo $cat[0]->cat_name; ?></div>
                                <div class="an__title"><?php echo $list->post_title; ?></div>
                                <a href="<?php echo get_permalink($list->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        <?php } ?>

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