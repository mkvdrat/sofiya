<?php
/*
Template name: Main page
*/

get_header(); 
?>

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
    <div class="top__banner">
        <div class="background__image bg__shadow" style="background-image: url('/wp-content/themes/sofiya/image/slide-01.jpg')"></div>
    </div>
    <?php } ?>
    
    <div class="content">
        <div class="order__block">
            <div class="order__inner">
                <?php echo get_field('booking_block_main_page'); ?>
            </div>
        </div>
        
        <?php $rooms = get_field_object('rooms_block_main_page', get_the_ID()); ?>
        
        <?php if($rooms['value']){ ?>
        <?php $sectionsCols = array_chunk($rooms['value'], ceil(count($rooms['value']) / 4)); ?> 
        <div class="grid__rooms">
            <div class="container-fluid">
                <div class="row-no-gutters">
                    <?php if(!empty($sectionsCols[0])){ ?>
                    <?php foreach($sectionsCols[0] as $room){ ?>
                    <div class="grid-item col-sm-12 col-lg-5">
                        <div class="item_room item__room-1">
                            <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($room->ID), 'full'); ?>
                            <div class="background__image" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                                <div class="item__room_content">
                                    <div class="item__room_title"><?php echo $room->post_title; ?></div>
                                    
                                    <?php $price = get_post_meta( $room->ID, 'price_rooms_page', $single = true ); ?>
                                    <div class="item__room_text">Стоимость номера от <?php echo $price ? $price : '0'; ?> Руб / Сутки</div>
                                    
                                    <a href="<?php echo get_permalink($room->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    <div class="grid-item col-sm-12 col-lg-7">
                        <div class="row-no-gutters">
                            <?php if(!empty($sectionsCols[1])){ ?>
                            <?php foreach($sectionsCols[1] as $room){ ?>
                            <div class="grid-item col-sm-12">
                                <div class="item_room item__room-2">
                                    <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($room->ID), 'full'); ?>
                                    <div class="background__image" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                                        <div class="item__room_content">
                                            <div class="item__room_title"><?php echo $room->post_title; ?></div>
                                            
                                            <?php $price = get_post_meta( $room->ID, 'price_rooms_page', $single = true ); ?>
                                            <div class="item__room_text">Стоимость номера от <?php echo $price ? $price : '0'; ?> Руб / Сутки</div>
                                            
                                            <a href="<?php echo get_permalink($room->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                            
                            <?php if(!empty($sectionsCols[2])){ ?>
                            <?php foreach($sectionsCols[2] as $room){ ?>
                            <div class="grid-item col-sm-12 col-lg-6">
                                <div class="item_room item__room-3">
                                    <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($room->ID), 'full'); ?>
                                    <div class="background__image" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                                        <div class="item__room_content">
                                            <div class="item__room_title"><?php echo $room->post_title; ?></div>
                                            
                                            <?php $price = get_post_meta( $room->ID, 'price_rooms_page', $single = true ); ?>
                                            <div class="item__room_text">Стоимость номера от <?php echo $price ? $price : '0'; ?> Руб / Сутки</div>
                                            
                                            <a href="<?php echo get_permalink($room->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                            
                            <?php if(!empty($sectionsCols[3])){ ?>
                            <?php foreach($sectionsCols[3] as $room){ ?>
                            <div class="grid-item col-sm-12 col-lg-6">
                                <div class="item_room item__room-4">
                                    <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($room->ID), 'full'); ?>
                                    <div class="background__image" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                                        <div class="item__room_content">
                                            <div class="item__room_title"><?php echo $room->post_title; ?></div>
                                            
                                            <?php $price = get_post_meta( $room->ID, 'price_rooms_page', $single = true ); ?>
                                            <div class="item__room_text">Стоимость номера от <?php echo $price ? $price : '0'; ?> Руб / Сутки</div>
                                            
                                            <a href="<?php echo get_permalink($room->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if(get_post_meta( get_the_ID(), 'enable_block_a_section_main_page', $single = true ) == 'yes'){ ?>
        <div class="main__food">
            <?php $image_url = get_field('image_food_block_main_page'); ?>
            <div class="bg__item background__image bg__shadow" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                <div class="bg__inner content__shadow">
                    <div class="bg__title"><?php echo get_field('title_food_block_main_page'); ?></div>
                    <div class="bg__tags">
                        <?php echo get_field('text_food_block_main_page'); ?>
                    </div>
                    <a href="<?php echo get_field('link_food_block_main_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                </div>
            </div>
            <div class="bellow__info">
                <div class="container-fluid">
                    <div class="row__8">
                        <div class="col-8-2">
                            <div class="text__block">
                               <?php echo get_field('text_overall_main_page'); ?>
                            </div>
                        </div>
                        <div class="col-8-1">
                            <?php $image_url = get_field('image_restaurant_block_main_page'); ?>
                            <div class="bg__item background__image bg__shadow" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                                <div class="bg__inner content__shadow">
                                    <div class="bg__title"><?php echo get_field('title_restaurant_block_main_page'); ?></div>
                                    <a href="<?php echo get_field('link_restaurant_block_main_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8-1">
                            <?php $image_url = get_field('image_cafe_block_main_page'); ?>
                            <div class="bg__item background__image bg__shadow" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                                <div class="bg__inner content__shadow">
                                    <div class="bg__title"><?php echo get_field('title_cafe_block_main_page'); ?></div>
                                    <a href="<?php echo get_field('link_cafe_block_main_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if(get_post_meta( get_the_ID(), 'enable_block_b_section_main_page', $single = true ) == 'yes'){ ?>
        <div class="main__spa">
            <?php $image_url = get_field('image_spa_block_main_page'); ?>
            <div class="bg__item background__image bg__shadow" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                <div class="bg__inner content__shadow">
                    <div class="bg__title"><?php echo get_field('title_spa_block_main_page'); ?></div>
                    <div class="bg__tags"><?php echo get_field('text_spa_block_main_page'); ?></div>
                    <a href="<?php echo get_field('link_spa_block_main_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php $services = get_field_object('services_block_main_page', get_the_ID()); ?>
        
        <?php if($services['value']){ ?>
        <?php $sectionsCols = array_chunk($services['value'], ceil(count($services['value']) / 8)); ?>
        <div class="main__services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title"><?php echo get_field('title_services_block_main_page'); ?></div>
                        <div class="section__description">
                            <?php echo get_field('text_services_block_main_page'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row__8">
                    <?php if(!empty($sectionsCols[0])){ ?>
                    <?php foreach($sectionsCols[0] as $service){ ?>
                    <div class="col-8-2 serv__item">
                        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full'); ?>
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="serv__content content__shadow">
                                <div class="serv__title"><?php echo $service->post_title; ?></div>
                                <a href="<?php echo get_permalink($service->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    <?php if(!empty($sectionsCols[1])){ ?>
                    <?php foreach($sectionsCols[1] as $service){ ?>
                    <div class="col-8-1 serv__item">
                        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full'); ?>
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="serv__content content__shadow">
                                <div class="serv__title"><?php echo $service->post_title; ?></div>
                                <a href="<?php echo get_permalink($service->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    <?php if(!empty($sectionsCols[2])){ ?>
                    <?php foreach($sectionsCols[2] as $service){ ?>
                    <div class="col-8-1 serv__item">
                        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full'); ?>
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="serv__content content__shadow">
                                <div class="serv__title"><?php echo $service->post_title; ?></div>
                                <a href="<?php echo get_permalink($service->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    <?php if(!empty($sectionsCols[3])){ ?>
                    <?php foreach($sectionsCols[3] as $service){ ?>
                    <div class="col-8-1 serv__item">
                        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full'); ?>
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="serv__content content__shadow">
                                <div class="serv__title"><?php echo $service->post_title; ?></div>
                                <a href="<?php echo get_permalink($service->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    <?php if(!empty($sectionsCols[4])){ ?>
                    <?php foreach($sectionsCols[4] as $service){ ?>
                    <div class="col-8-1 serv__item">
                        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full'); ?>
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="serv__content content__shadow">
                                <div class="serv__title"><?php echo $service->post_title; ?></div>
                                <a href="<?php echo get_permalink($service->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    <?php if(!empty($sectionsCols[5])){ ?>
                    <?php foreach($sectionsCols[5] as $service){ ?>
                    <div class="col-8-2 serv__item">
                        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full'); ?>
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="serv__content content__shadow">
                                <div class="serv__title"><?php echo $service->post_title; ?></div>
                                <a href="<?php echo get_permalink($service->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    <?php if(!empty($sectionsCols[6])){ ?>
                    <?php foreach($sectionsCols[6] as $service){ ?>
                    <div class="col-8-2 serv__item">
                        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full'); ?>
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="serv__content content__shadow">
                                <div class="serv__title"><?php echo $service->post_title; ?></div>
                                <a href="<?php echo get_permalink($service->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    <?php if(!empty($sectionsCols[7])){ ?>
                    <?php foreach($sectionsCols[7] as $service){ ?>
                    <div class="col-8-3 serv__item">
                        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full'); ?>
                        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                            <div class="serv__content content__shadow">
                                <div class="serv__title"><?php echo $service->post_title; ?></div>
                                <a href="<?php echo get_permalink($service->ID) ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if( have_rows('rest_block_main_page')){ ?>
        <div class="main__features">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title"><?php echo get_field('title_rest_block_main_page'); ?></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="grid__features row row-flex">
                            <?php
                                while ( have_rows('rest_block_main_page') ) { the_row();
                            ?> 
                            <div class="col-lg-3">
                                <div class="fetures__item">
                                    <div class="image">
                                        <?php $image_url = get_sub_field('image_subblock_main_page'); ?>
                                        <img src="<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>"/>
                                    </div>
                                    <div class="features__title"><?php echo get_sub_field('title_subblock_main_page'); ?></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if(get_post_meta( get_the_ID(), 'enable_block_c_section_main_page', $single = true ) == 'yes'){ ?>
        <div class="main__bron">
            <?php $image_url = get_field('image_earlier_booking_block_main_page'); ?>
            <div class="bg__item background__image bg__shadow" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                <div class="bg__inner content__shadow">
                    <div class="bg__title"><?php echo get_field('title_earlier_booking_block_main_page'); ?></div>
                    <div class="bg__tags"><?php echo get_field('text_earlier_booking_block_main_page'); ?></div>
                    <a href="<?php echo get_field('link_earlier_booking_block_main_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if(get_post_meta( get_the_ID(), 'enable_block_d_section_main_page', $single = true ) == 'yes'){ ?>
        <div class="info__block">
            <div class="container-fluid">
                <div class="row row-flex">
                    <div class="col-lg-4">
                        <?php $image_url = get_field('image_attractions_block_main_page'); ?>
                        <div class="inline__image"><img src="<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>"/></div>
                    </div>
                    <div class="col-lg-8">
                        <div class="text__container">
                            <div class="title__block"><?php echo get_field('title_attractions_block_main_page'); ?></div>
                            <div class="text__block">
                                <?php echo get_field('text_attractions_block_main_page'); ?>
                            </div>
                            <a href="<?php echo get_field('link_attractions_block_main_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php
            $args = array(
                'numberposts' => '3',
                'category'    => '11,14',
                'post_type'   => 'post',
                'orderby'     => 'date',
                'order'       => 'ASC',
            );

            $lists = get_posts( $args );
        ?>
        
        <?php if($lists){ ?>
        <div class="action__news">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title"><?php echo get_field('title_list_block_main_page'); ?></div>
                    </div>
                </div>
                <div class="row__8">
                    <?php
                        foreach($lists as $list){
                        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($list->ID), 'full');
                    ?>
                    <div class="col-lg-4">
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
        
        <?php
            $args = array(
                'status' => 'approve',
                'number' => '10',
                'post_id' => 211,
            );
        
            $comments = get_comments( $args );
        
            if(!empty($comments)){
        ?>
        <div class="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonials__carousel">
                            <div class="owl-carousel">
                                <?php foreach ($comments as $comment) { ?>
                                <?php $city = get_comment_meta($comment->comment_ID, 'city', true); ?>
                                <div class="item">
                                    <div class="testim__name"><?php echo $comment->comment_author; ?> <?php echo $city ? ', ' . $city : ''; ?></div>
                                    <div class="testim__date"><?php comment_date( 'd.m.y', $comment->comment_ID ); ?></div>
                                    <div class="testim__text"><?php echo mb_substr( strip_tags( $comment->comment_content ), 0, 152 ); ?></div>
                                </div>
                                <?php } ?>
                            </div>
                            <a href="<?php echo get_permalink( 211 ); ?>" class="btn btn__link">Читать все отзывы</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if(get_post_meta( '15', 'enable_through_block_section_main_page', $single = true ) == 'yes'){ ?>
        <div class="main__seazone">
            <?php $image_url = get_field('image_open_block_main_page'); ?>
            <div class="bg__item background__image bg__shadow" style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
                <div class="bg__inner content__shadow">
                    <div class="bg__title"><?php echo get_field('title_open_block_main_page'); ?></div>
                    <div class="bg__tags"><?php echo get_field('text_open_block_main_page'); ?></div>
                    <a href="<?php echo get_field('link_open_block_main_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php if(!empty(get_field('coord_maps_block_main_page'))){ ?>
        <div class="maps__block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title"><?php echo get_field('title_maps_block_main_page'); ?></div>
                        <div class="section__description">
                            <?php echo get_field('text_maps_block_main_page'); ?>
                        </div>
                        <div id="sofia" style="width:100%; height:430px"></div>
                        
                        <script>
                            var sofialMap, sofiaPlacemark, sofiacoords;
                            ymaps.ready(init);
                        
                            function init() {
                                sofialMap = new ymaps.Map('sofia', {
                                    center: [<?php echo get_field('coord_maps_block_main_page'); ?>],
                                    zoom: 17
                                });
                        
                                var SearchControl = new ymaps.control.SearchControl({noPlacemark: true});
                        
                                sofialMap.controls
                                    .add('zoomControl')
                                    //.add('typeSelector')
                        
                                sofiacoords = [<?php echo get_field('coord_maps_block_main_page'); ?>];
                        
                                sofiaPlacemark = new ymaps.Placemark([<?php echo get_field('coord_maps_block_main_page'); ?>], {}, {
                                    preset: "twirl#redIcon",
                                    draggable: true
                                });
                        
                                sofialMap.geoObjects.add(sofiaPlacemark);
                            }
                        </script>
                    </div>
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
            <a href="<?php echo get_field('instagram_link_main_page'); ?>" class="btn btn-black">ПОДПИСЫВАЙТЕСЬ НА ИНСТАГРАМ ОТЕЛЯ</a>
        </div>
    </div>
     
<?php get_footer(); ?>