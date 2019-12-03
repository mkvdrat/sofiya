<?php
/*
Template name: Contacts page
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
                    <div class="col-lg-7">
                        <div class="title__block"><?php echo get_field('title_address_block_contacts_page'); ?></div>
                        
                        <?php echo get_field('text_address_block_contacts_page'); ?>
                        
                        <div class="sub__title"><?php echo get_field('title_operators_block_contacts_page'); ?></div>
                        <div class="description__block">
                            <?php echo get_field('text_operators_block_contacts_page'); ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="info__part">
                            <?php
                                $forms_a = get_field('cont_form_block_contacts_page');
                                if($forms_a){
                                    echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="maps__block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title">На карте</div>
                        <div id="sofia" style="width:100%; height:420px"></div>
                        
                        <script>
                            var sofialMap, sofiaPlacemark, sofiacoords;
                            ymaps.ready(init);
                        
                            function init() {
                                sofialMap = new ymaps.Map('sofia', {
                                    center: [<?php echo get_field('coord_maps_block_contacts_page'); ?>],
                                    zoom: 17
                                });
                        
                                var SearchControl = new ymaps.control.SearchControl({noPlacemark: true});
                        
                                sofialMap.controls
                                    .add('zoomControl')
                                    //.add('typeSelector')
                        
                                sofiacoords = [<?php echo get_field('coord_maps_block_contacts_page'); ?>];
                        
                                sofiaPlacemark = new ymaps.Placemark([<?php echo get_field('coord_maps_block_contacts_page'); ?>], {}, {
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