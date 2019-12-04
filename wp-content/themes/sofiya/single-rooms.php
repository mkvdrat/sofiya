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
        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full'); ?>

        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
            <div class="banner__title content__shadow"><?php the_title(); ?></div>
        </div>
        <div class="rooms__arrows">
			<?php 
				$next = mod_get_adjacent_post('next', array('rooms'));
				$prev = mod_get_adjacent_post('prev', array('rooms'));
			?>
			
			<?php if($prev){ ?>
				<a href="<?php echo get_permalink($prev->ID); ?>" class="room__prev"><img src="/wp-content/themes/sofiya/image/prev.svg"/><?php echo $prev->post_title; ?></a>
			<?php } ?>
			
			<?php if($next){ ?>
				<a href="<?php echo get_permalink($next->ID); ?>" class="room__next"><?php echo $next->post_title; ?><img src="/wp-content/themes/sofiya/image/next.svg"/></a>
			<?php } ?>		
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
						<?php if(!empty(get_field('description_rooms_page'))){ ?>
                        <div class="title__block">Описание номера</div>
                        <div class="description__block">
							<?php echo get_field('description_rooms_page'); ?>
                        </div>
                        <hr/>
						<?php } ?>
						
                        <div class="price__block">
                            Стоимость номера<br>
							<?php $price = get_field('price_rooms_page'); ?>
                            от <strong><?php echo $price ? $price : '0'; ?></strong> Руб / Сутки
                        </div>
						<?php
							$in_time = get_field('in_time_rooms_page');
							$out_time = get_field('out_time_rooms_page');
						?>
                        <div class="time__block">Расчетный час – <?php echo $in_time ? $in_time : '12.00'; ?>, Время заезда – <?php echo $out_time ? $out_time : '14.00'; ?></div>
                        <a href="#" class="btn">ЗАБРОНИРОВАТЬ</a>
                    </div>
					
					<?php if( have_rows('informations_rooms_page')){ ?>
                    <div class="col-lg-5">
                        <div class="info__part">
                            <ul>
								<?php while ( have_rows('informations_rooms_page') ) { the_row(); ?>
								<?php $image_url = get_sub_field('image_subblock_rooms_page'); ?>
                                <li><div class="image"><img src="<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>" width="14"/></div><span><?php echo get_sub_field('title_subblock_rooms_page'); ?></span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>
		
		<?php
			global $nggdb;
			$gallery_id = getNextGallery(get_the_ID(), 'gallery_rooms_page');
			$gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
			if($gallery_image){
		?>
		<div class="room__slider">
            <div class="owl-carousel">
				<?php foreach($gallery_image as $image) {  ?>
				<div class="item" style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')"></div>
				<?php } ?>
		    </div>
        </div>
		<?php } ?>
		
		<?php if(!empty(get_field('add_information_rooms_page'))){ ?>
        <div class="more__info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="section__title">Дополнительная информация</div>
                        <div class="section__description">
							<?php echo get_field('add_information_rooms_page'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php } ?>

        <div class="container">
            <div class="row">
                <hr/>
            </div>
        </div>
		
		<?php $rooms = get_field_object('other_places_rooms_page', get_the_ID()); ?>
		
		<?php if($rooms['value']){ ?>
        <div class="other__rooms">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title">Другие номера</div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row__8">
					<?php foreach($rooms['value'] as $room){ ?>
                    <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($room->ID), 'full'); ?>
                    <div class="col-8-0">
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="an__content content__shadow">
                                <div class="an__tag"><?php echo $room->post_title; ?></div>
								
								<?php $price = get_post_meta( $room->ID, 'price_rooms_page', $single = true ); ?>
                                <div class="an__title">Стоимость номера от <?php echo $price ? $price : '0'; ?> Руб / Сутки</div>
								
                                <a href="<?php echo get_permalink($room->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
		<?php } ?>

        <?php if(get_post_meta( '15', 'enable_through_block_section_main_page', $single = true ) == 'yes'){ ?>
        <div class="main__seazone">
            <?php $image_url = get_field('image_open_block_main_page', '15'); ?>
            <div class="bg__item background__image bg__shadow" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
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
