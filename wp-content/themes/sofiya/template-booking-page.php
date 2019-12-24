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
		<div class="main__text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title">Онлайн-бронирование</div>
                        <div class="section__description">Заполните форму для брони номера
                        </div>
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
											<form>
												<div class="form__title">Легкое бронирование offline</div>
												<div class="form-group">
																	<span>
																		<input type="text" value="" placeholder="Введите Ваше имя" required/>
																	</span>
												</div>
												<div class="form-group">
																	<span>
																		<input type="email" value="" placeholder="Введите e-mail"/>
																	</span>
												</div>
												<div class="form-group">
																	<span>
																		<input type="tel" value="" placeholder="7 (___) ___-__-__"/>
																	</span>
												</div>
												<div class="form-group">
																	<span>
																		<input type="text"  aria-required="true" aria-invalid="false" placeholder="Дата заезда">
																	</span>
												</div>
												<div class="form-group">
																	<span>
																		<input type="text"  aria-required="true" aria-invalid="false" placeholder="Дата выезда">
																	</span>
												</div>
												<div class="form-group">
																	<span>
																		<input type="checkbox" value="" id="confirm-2">
																		<label for="confirm-2">Я даю согласие на обработку моих персональных данных</label>
																	</span>
												</div>
												<div class="form-group">
																	<span>
																		<input type="submit" value="Отправить" class="btn btn-submit"/>
																	</span>
												</div>
											</form>
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
		<div class="form--out"><img src="/wp-content/themes/sofiya/image/form.png"/></div>
		</div>
		</div>
		</div>
		</div>
        <div class="info__block">
			<div class="container">
                <div class="row row-flex">
                    <div class="col-xs-12">
       <blockquote>Планируете свой летний отпуск в Ялте? Получите ГАРАНТИРОВАННУЮ бронь на лучший отдых в Крыму прямо сейчас!
	   Неожиданно выдались свободные дни? Не теряйте времени и выбирайте номера не откладывая, гарантируя своим близким идеальный отпуск в удобное для вас время и по самой комфортной цене.
                        </blockquote>
						<h3>Бронирование отеля онлайн — это легко, быстро и безопасно.</h3>
                            <div class="text__block">
							
								Для оплаты вы можете использовать:
							<ul>
								<li>кредитную карту;</li>
								<li>электронные деньги;</li>
								<li>безналичный расчет.</li>
								<li>Также окончательную доплату вы можете сделать наличными или кредитной картой уже в отеле.</li>
							</ul>
						
							</div>
						</div>
					</div>
				</div>
		</div>
        <div class="info__block">
            <div class="container">
                <div class="row row-flex">
                    <div class="col-xs-12 col-sm-4">
                        <?php $image_url = get_field('image_attractions_block_main_page'); ?>
                        <div class="inline__image"><img src="<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>"/></div>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="text__container">
                            <h3>Бронирование отеля онлайн — это легко, быстро и безопасно.</h3>
                            <div class="text__block">
							
								Отель «Премиум Парк» принимает заявки на бронирование номеров:
							<ul>
								<li>по телефонам: +7 (978) 924-33-99 | +7 (978) 061 01 94</li>
								<li>через форму бронирования on-line</li>
								<li>по электронной почте: PremiumPark.yalta@yandex.ru</li>
								<li>от имени компании (предприятия, профсоюза, организации …),</li>
								<li>через турагентство (туроператорскую фирму).</li>
								<li>от турагентств: +7 (978) 924-33-99</li>
							</ul>
                                <?php echo get_field('text_attractions_block_main_page'); ?>
                            </div>
                            <a href="<?php echo get_field('link_attractions_block_main_page'); ?>" class="btn btn__link">ПОДРОБНЕЕ</a>
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
							<h3>Условия бронирования</h3>
							<p>Бронирование считается гарантированным только при получении предоплаты в размере 50% оплаты стоимости проживания на основании выставленного счета.</p>
							<p><i>*Обратите внимание: При аннуляции гарантированного бронирования менее чем за 7 суток до даты предполагаемого заезда предоплата в размере стоимости 1 суток проживания гостю не возвращается.</i></p>
							<p><i>**Предварительное бронирование не является гарантированным бронированием.</i></p>
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