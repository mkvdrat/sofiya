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
    <?php
        $category = get_queried_object();
        $title = get_term_meta(get_queried_object()->term_id, 'title_posts_list_page', true);
        $desr = html_entity_decode(get_term_meta(get_queried_object()->term_id, 'text_posts_list_page', true));
    ?>

    <div class="top__banner">
		<?php $image_url = wp_get_attachment_image_src( get_term_meta(get_queried_object()->term_id, 'image_posts_list_page', true), 'full'); ?>
        <div class="background__image bg__shadow" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')">
            <div class="banner__title content__shadow"><?php echo $category->name; ?></div>
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
                        <?php if($title || $desr){ ?>
                        <h1><?php echo $title; ?></h1>
                        <div class="sub__title">
							<?php echo $desr; ?>
                        </div>
                        <hr/>
                        <?php } ?>
                        
                        <?php	
                            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'category' 	     => getCurrentCatID(),
                                'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
                                'paged'          => $current_page
                            ); 
                            
                            $posts = get_posts( $args );
                            
                            if($posts){
                                foreach( $posts as $post ){
                                    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                                    $short_descr = get_field('short_description_project_post_page', $post->ID);
                        ?>
                        
                        <div class="news__item">
                            <div class="row__8">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="background__image"
                                         style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="news__body">
                                        <div class="news__date"><?php echo get_the_date( 'd.m.y', $post->ID ); ?></div>
                                        <div class="news__title"><?php echo $post->post_title; ?></div>
                                        <div class="news__text">
                                            <?php echo $post->post_excerpt; ?>
                                        </div>
                                        <a href="<?php echo get_permalink($post->ID); ?>" class="btn btn__link">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <?php   } 
                                wp_reset_postdata(); 
                            }
                        ?>
                        <?php
                            $defaults = array(
                                'type' => 'array',
                                'prev_next'    => True,
                                'prev_text'    => __(''),
                                'next_text'    => __(''),
                            );
                                                
                            $pagination = paginate_links($defaults);							
                        ?>
                        <?php if($pagination){ ?>
                        <div class="paginations">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <?php foreach ($pagination as $pag){ ?>
                                    <li><?php echo $pag; ?></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-5">
                        <?php
                            $args = array(
                                'numberposts' => '5',
                                'category'    => getCurrentCatID(),
                                'post_type'   => 'post',
                                'orderby'     => 'date',
                                'order'       => 'DESC',
                            );
                
                            $lists = get_posts( $args );
                        ?>
                        <?php if($lists){ ?>
                        <div class="info__part">
                            <div class="menu__right">
                                <ul>
                                    <?php foreach($lists as $list){ ?>
                                        <li><a href="<?php echo get_permalink($list->ID) ?>"><?php echo $list->post_title; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="info__part">
                            <?php echo get_term_meta(get_queried_object()->term_id, 'text_cont_form_block_posts_page', true); ?>
                            
                            <a href="#" class="btn btn__link" data-toggle="modal" data-target="#exampleModalCenter">Задать вопрос</a>
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
                                                $forms_a = get_term_meta(get_queried_object()->term_id, 'cont_form_block_posts_page', true);
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
        </div>

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