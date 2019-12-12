<?php
/*
Template name: Standart page
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
                        <?php echo get_field('description_standart_page'); ?>
                    </div>
                    <div class="col-lg-5">
						<?php
							$args = array(
							   'sort_order'   => 'ASC',
							   'sort_column'  => 'post_title',
							   'hierarchical' => 1,
							   'exclude'      => '',
							   'include'      => '',
							   'meta_key'     => '',
							   'meta_value'   => '',
							   'authors'      => '',
							   'child_of'     => 0,
							   'parent'       => get_the_ID(),
							   'exclude_tree' => '',
							   'post_type'    => 'page',
							   'post_status'  => 'publish',
							); 
						
							$pages = get_pages($args);
							if($pages){
						?>
                        <div class="info__part">
                            <div class="menu__right">
                                <ul>
									<?php foreach($pages as $page){ ?>
										<li><a href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
										<?php wp_reset_postdata(); ?>
									<?php } ?>
                                </ul>
                            </div>
                        </div>
						<?php } ?>
                        <div class="info__part">
                            <?php echo get_field('text_cont_form_block_standart_page'); ?>
							
                            <a href="#" class="btn btn__link" data-toggle="modal" data-target="#exampleModalCenter">Задать вопрос</a>
                        </div>
						<!-- Modal -->
						<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<?php
											$forms_a = get_field('cont_form_block_standart_page');
											if($forms_a){
												echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
											}
										?>
									</div>
								</div>
							</div>
						</div>
						<!-- Modal -->
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