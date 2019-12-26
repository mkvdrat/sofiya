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

		<div class="main__text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title"><?php echo get_field('title_online_booking_page'); ?></div>
                        <div class="section__description"><?php echo get_field('subtitle_online_booking_page'); ?></div>
						<div class="btn-group-back btn__groupBron">
                            <a href="#to__form" class="btn btn__link scrollto">ОНЛАЙН БРОНИРОВАНИЕ</a>
                            <a href="#" class="btn btn__link" data-toggle="modal" data-target="#easyBron">ЛЁГКОЕ БРОНИРОВАНИЕ</a>
                        </div>
							<!-- Modal -->
							<div class="modal fade" id="easyBron" tabindex="-1" role="dialog" aria-labelledby="easyBronTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-body">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<?php
												$forms_a = get_field('easy_form_booking_page');
												if($forms_a){
													echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
												}
											?>
										</div>
									</div>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
		
        <div class="info__block" id="to__form">
			<div class="container-fluid">
				<div class="row row-flex">
					<div class="col-xs-12">
						<div class="form--out">
							<?php echo get_field('form_booking_page'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="info__block">
			<div class="container">
                <div class="row row-flex">
                    <div class="col-xs-12">
						<?php echo get_field('text_a_block_online_booking_page'); ?>
					</div>
				</div>
		</div>
        <div class="info__block">
            <div class="container">
                <div class="row row-flex">
                    <div class="col-xs-12 col-sm-4">
                        <?php $image_url = get_field('image_online_booking_page'); ?>
                        <div class="inline__image"><img src="<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>"/></div>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="text__container">
                            <?php echo get_field('text_b_block_online_booking_page'); ?>
							
                            <a href="<?php echo get_field('link_online_booking_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="info__block">
            <div class="container">
                <div class="row row-flex">
                    <div class="col-xs-12">
                        <div class="text__container">
							<?php echo get_field('text_c_block_online_booking_page'); ?>
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
    
<?php get_footer(); ?>