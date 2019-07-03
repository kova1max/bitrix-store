<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Cart");
?>

	<div class="container">
		<div class="cart">
			<div class="cart_item">
				<div class="cart_gallery">
					<div class="swiper-container cart_gallery_top">
						<div class="swiper-wrapper">
							<div class="swiper-slide"><a href="<?=SITE_TEMPLATE_PATH?>/img/gallery_big.jpg" data-fancybox-group="gallery1" class="fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_big.jpg" alt=""></a></div>
							<div class="swiper-slide"><a href="<?=SITE_TEMPLATE_PATH?>/img/gallery_big.jpg" data-fancybox-group="gallery1" class="fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_big_2.jpg" alt=""></a></div>
							<div class="swiper-slide"><a href="<?=SITE_TEMPLATE_PATH?>/img/gallery_big.jpg" data-fancybox-group="gallery1" class="fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_big.jpg" alt=""></a></div>
							<div class="swiper-slide"><a href="<?=SITE_TEMPLATE_PATH?>/img/gallery_big.jpg" data-fancybox-group="gallery1" class="fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_big_2.jpg" alt=""></a></div>
							<div class="swiper-slide"><a href="<?=SITE_TEMPLATE_PATH?>/img/gallery_big.jpg" data-fancybox-group="gallery1" class="fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_big.jpg" alt=""></a></div>
							<div class="swiper-slide"><a href="<?=SITE_TEMPLATE_PATH?>/img/gallery_big.jpg" data-fancybox-group="gallery1" class="fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_big_2.jpg" alt=""></a></div>
						</div>
						<div class="cart_gallery_zoom"><i class="svg-glass"></i></div>
					</div>
					<div class="cart_gallery_thumbs">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_small_1.jpg" alt=""></div>
								<div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_small_1.jpg" alt=""></div>
								<div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_small_1.jpg" alt=""></div>
								<div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_small_1.jpg" alt=""></div>
								<div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_small_1.jpg" alt=""></div>
								<div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH?>/img/gallery_small_1.jpg" alt=""></div>
							</div>
						</div>
						<div class="swiper-button-next"><i class="svg-next-2"></i></div>
						<div class="swiper-button-prev"><i class="svg-next-2"></i></div>
					</div>
				</div>
			</div>
			<div class="cart_item">
				<div class="cart_info">
					<div class="cart_info_top">
						<div class="cart_info_rating">
							<div class="cart_info_star">
								<i class="svg-star"></i>
								<i class="svg-star"></i>
								<i class="svg-star"></i>
								<i class="svg-star-o"></i>
								<i class="svg-star-o"></i>
							</div>
							<a href="#" class="cart_info_reviews">45 отзывов</a>
						</div>
						<div class="cart_info_wishlist">
							<i class="svg-heart"></i><span>11 людей добавили <a href="#">в избранное</a></span>
						</div>
					</div>
					<div class="cart_info_middle">
						<label >Размер:</label>
						<select class="select">
							<option value="">114x210 - 8 500 руб</option>
							<option value="">114x210 - 8 500 руб</option>
						</select>
						<span>Артикул М256-0</span>
					</div>
					<div class="cart_info_bottom">
						<div class="cart_info_item">
							<div class="cart_info_price-old">
								<span>11 200 руб.</span>
								<div class="cart_info_sale">Выгода <strong>20%</strong></div>
							</div>
							<div class="cart_info_price">8 500 руб.</div>
							<a href="#" class="btn inbasket"><i class="svg-basket"></i>В корзину</a>
							<a href="#" class="btn_more">Купить в 1 клик</a>
						</div>
						<div class="cart_info_item cart_info_tools_list">
							<a href="#" class="cart_info_tools"><i class="svg-heart2"></i><span>В избранное</span></a>
							<a href="#" class="cart_info_tools"><i class="svg-list"></i><span>Сравнить</span></a>
							<a href="#" class="cart_info_tools"><i class="svg-loss"></i><span>Следить за ценой</span></a>
						</div>
					</div>
				</div>
				<div class="cart_property">
					<div class="cart_property_item">
						<div class="cart_property_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/cart_property.png" alt=""></div>
						<span>Высота</span>
					</div>
					<div class="cart_property_item">
						<div class="cart_property_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/cart_property.png" alt=""></div>
						<span>Высота</span>
					</div>
					<div class="cart_property_item">
						<div class="cart_property_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/cart_property.png" alt=""></div>
						<span>Высота</span>
					</div>
					<div class="cart_property_item">
						<div class="cart_property_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/cart_property.png" alt=""></div>
						<span>Высота</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="cheaper">
		<div class="container">
			<div class="title_under">Вместе дешевле</div>
			<div class="cheaper_swiper">
				<div class="swiper-container">
					<div class="swiper-wrapper">

						<div class="swiper-slide">
							<div class="cheaper_item">
								<a href="#" class="cheaper_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt=""></a>
								<div class="cheaper_item_content">
									<a href="#">Матрас Венето Family Style 120х190 см </a>
									<span>8 500 руб.</span>
								</div>
							</div>
							<div class="cheaper_item_operation">+</div>
							<div class="cheaper_item">
								<a href="#" class="cheaper_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt=""></a>
								<div class="cheaper_item_content">
									<a href="#">Матрас Венето Family Style 120х190 см </a>
									<span class="cheaper_item_old">10 500 руб</span>
									<span>8 500 руб.</span>
								</div>
							</div>
							<div class="cheaper_item_operation">=</div>
							<div class="cheaper_item_cheaper">
								<span>15 000 руб</span>
								<a href="#" class="btn btn_blue">Купить комплект</a>
							</div>
						</div>

						<div class="swiper-slide">
							<div class="cheaper_item">
								<a href="#" class="cheaper_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt=""></a>
								<div class="cheaper_item_content">
									<a href="#">Матрас Венето Family Style 120х190 см </a>
									<span>8 500 руб.</span>
								</div>
							</div>
							<div class="cheaper_item_operation">+</div>
							<div class="cheaper_item">
								<a href="#" class="cheaper_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt=""></a>
								<div class="cheaper_item_content">
									<a href="#">Матрас Венето Family Style 120х190 см </a>
									<span class="cheaper_item_old">10 500 руб</span>
									<span>8 500 руб.</span>
								</div>
							</div>
							<div class="cheaper_item_operation">=</div>
							<div class="cheaper_item_cheaper">
								<span>15 000 руб</span>
								<a href="#" class="btn btn_blue">Купить комплект</a>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="cheaper_item">
								<a href="#" class="cheaper_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt=""></a>
								<div class="cheaper_item_content">
									<a href="#">Матрас Венето Family Style 120х190 см </a>
									<span>8 500 руб.</span>
								</div>
							</div>
							<div class="cheaper_item_operation">+</div>
							<div class="cheaper_item">
								<a href="#" class="cheaper_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt=""></a>
								<div class="cheaper_item_content">
									<a href="#">Матрас Венето Family Style 120х190 см </a>
									<span class="cheaper_item_old">10 500 руб</span>
									<span>8 500 руб.</span>
								</div>
							</div>
							<div class="cheaper_item_operation">=</div>
							<div class="cheaper_item_cheaper">
								<span>15 000 руб</span>
								<a href="#" class="btn btn_blue">Купить комплект</a>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-button-next"><i class="svg-next-2"></i></div>
				<div class="swiper-button-prev"><i class="svg-next-2"></i></div>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>



	<div class="container">
		<div class="cart_tabs">
			<div class="cart_tabs_nav">
				<a href="#" data-tabs="1" class="active">Описание и Характеристики</a>
				<a href="#" data-tabs="2">Доставка и гарантия</a>
			</div>
			<div class="cart_content">
				<div class="cart_tabs_content">
					<div class="cart_tabs_item active" data-tabs="1">
						<div class="cart_description hide">
							<div class="cart_description_content">
								<h2><span>Описание</span> Венето Family Style 120х190 см (645120190) </h2>
								<p>Ортопедический матрас Come-for Делайт Софт – это новый уровень вашего комфорта. Этот двухсторонний матрас обладает ортопедическими и анатомическими свойствами, обеспечивает комфортный и глубокий сон.</p>
								<p>Модель является ассиметричной с эффектом "зима/лето", при этом зимняя сторона матраса отличается более выраженным эффектом анатомичности по сравнению с летней.</p>
								<p>В основе матраса — зонированный пружинный блок Pocket spring. Данный пружинный блок имеет три зоны поддержки, усиленных в соответствие с наиболее тяжелыми участками тела.</p>
								<p>С летней стороны сочетание блока независимых пружин рocket spring, мягкого войлока и кокосовой койры позволяет создать жесткую поверхность, отдых на которой не нарушает правильных, с точки зрения физиологии, изгибов позвоночника. Наличие кокосовой койры способствует отличному воздухообмену. В результате такой матрас не задерживает в себе влагу в летнее время года.</p>
								<p>Противоположная, зимняя, сторона матраса более мягкая с выраженным анатомическим эффектом. В качестве основного настилочного материала применен мягкий войлок. За ним следует пена Foam, которая делает матрас жестким и упругим.</p>
								<p>По периметру матраса для предупреждения деформации краев и поддержания правильной формы матраса используется еврокаркас.</p>
								<p>Матрас гигроскопичен, обеспечивает комфортный температурный режим в любое время года, снабжен аэраторами и хорошо проветривается. Изготовлен из экологически чистых материалов.</p>
							</div>
							<div class="cart_description_more">ЕЩЕ</div>
						</div>
						<div class="cart_characteristics">
							<h2><span>Характеристики</span> Венето Family Style 120х190 см (645120190)</h2>
							<div class="cart_characteristics_list">
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Тип матраса 
										<i class="svg-question">
											<!-- <span class="tooltip" data-title="Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
											"></span> -->
											<span>
												<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
												Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
											</span>
										</i>
									</div>
									<span></span>
									<div class="cart_characteristics_right">ортопедичский , анатомический</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Жесткость<i class="svg-question">
										<span>
											<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
											Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
										</span>
									</i></div>
									<span></span>
									<div class="cart_characteristics_right">Жесткие</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Размеры
										<i class="svg-question">
											<span>
												<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
												Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
											</span>
										</i>
									</div>
									<span></span>
									<div class="cart_characteristics_right">160x200 см</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Эффект "Зима-Лето"<i class="svg-question">
										<span>
											<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
											Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
										</span>
									</i></div>
									<span></span>
									<div class="cart_characteristics_right">Нет</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Водонепроницаемый<i class="svg-question">
										<span>
											<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
											Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
										</span>
									</i></div>
									<span></span>
									<div class="cart_characteristics_right">Нет</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Максимальная нагрузка на 1 спальное место<i class="svg-question">
										<span>
											<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
											Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
										</span>
									</i></div>
									<span></span>
									<div class="cart_characteristics_right">150 кг</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Наполнитель<i class="svg-question">
										<span>
											<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
											Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
										</span>
									</i></div>
									<span></span>
									<div class="cart_characteristics_right">Carbon Foam</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Вес<i class="svg-question">
										<span>
											<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
											Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
										</span>
									</i></div>
									<span></span>
									<div class="cart_characteristics_right">29.7000 кг</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Гарантия<i class="svg-question">
										<span>
											<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
											Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
										</span>
									</i></div>
									<span></span>
									<div class="cart_characteristics_right">18 месяцев</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Наполнитель<i class="svg-question">
										<span>
											<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
											Oсновных причин астмы, ринита и экземы.
										</span>
									</i></div>
									<span></span>
									<div class="cart_characteristics_right">Carbon Foam</div>
								</div>
								<div class="cart_characteristics_item">
									<div class="cart_characteristics_left">Максимальная нагрузка на 1 спальное место<i class="svg-question">
										<span>
											<img class="callout" src="<?=SITE_TEMPLATE_PATH?>/img/callout2.png" />
											Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Даже текст предложения единственное, о большого реторический гор своих безорфографичный коварный рот буквенных над речью до подзаголовок вопрос наш щеке! Верхний шар наматрасника – нежная, приятная на ощупь ткань, нижний слой – антиаллергенная, дышащая полиуретановая мембрана, которая препятствует протеканию жидкости, а также предупреждает возникновение клещей и бактерий, которые являются одними из основных причин астмы, ринита и экземы.
										</span>
									</i></div>
									<span></span>
									<div class="cart_characteristics_right">150 кг</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cart_tabs_item" data-tabs="2">

						<h2><span>Описание</span> Венето Family Style 120х190 см (645120190) </h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam veniam eos voluptate explicabo et obcaecati veritatis hic error culpa fugit!</p>
					</div>
				</div>
				<div class="cart_sidebar">


					<div class="otzivi-title clearfix">
						<h2>Отзывы</h2>
						<a href="#" class="btn show_comments">Оставить отзыв</a>
					</div>

					<!-- comments -->
					<div class="show_comments__wrap">
						<div class="review_head">Добавить отзыв</div>
						<div class="review_content">
							<div class="review_stars">
								<a href="#">
									<i class="svg-star"></i></a>
									<a href="#">
										<i class="svg-star"></i></a>
										<a href="#">
											<i class="svg-star"></i></a>
											<a href="#">
												<i class="svg-star-o"></i></a>
												<a href="#">
													<i class="svg-star-o"></i></a>
												</div>
												<div class="review_item">
													<label>Коментарий<span class="sup">*</span>
														<textarea></textarea>
													</label>
												</div>
												<div class="review_item">
													<label>Достоинства
														<input type="text">
													</label>
												</div>
												<div class="review_item">
													<label>Недостатки
														<input type="text">
													</label>
												</div>
												<div class="review_materials">
													<span>Добавить материалы</span>
													<div class="review_materials_item show_link">
														<i class="svg-file-audio"></i>
													</div>
													<div class="review_materials_item">
														<i class="svg-file"></i>
														<input type="file">
													</div>

												</div>

												<div class="review_item unlink_wrap">
													<label class="unlink">
														<input type="text" placeholder="Введите сылку на видео">
														<span class="icons-unlink"></span>
													</label>
												</div>


												<div class="review_item">
													<label>Ваше имя<span class="sup">*</span>
														<input type="text">
													</label>
												</div>
												<div class="review_item">
													<label>Эл. почта<span class="sup">*</span>
														<input type="text">
													</label>
												</div>
												<div class="review_item">
													<label>
														<input type="checkbox" class="checkbox">Уведомлять об ответах по эл. почте
													</label>
												</div>
												<div class="review_item">
													<button type="submit" class="btn">Оставить отзыв</button>
												</div>
											</div>
										</div>


										<div class="comments_item">
											<div class="comments_head">
												<span class="time">10.08.2016</span>
												<h3>Андрей Андреевич</h3>
												<div class="cart_info_star">
													<i class="svg-star"></i>
													<i class="svg-star"></i>
													<i class="svg-star"></i>
													<i class="svg-star-o"></i>
													<i class="svg-star-o"></i>
												</div>
											</div>
											<div class="comments_body">
												<p>Очень долго думали: стоит ли приобретать такой матрас? Но не пожалели ни разу. Первое время вообще не могли проснуться. Верхний слой с памятью действительно позволяет полностью расслабиться всему телу.</p>
												<div class="rating">
													<p><strong>Достоинства:</strong> Практически всё супер</p>
													<p><strong>Недостатки:</strong> пока необнаружил</p>
												</div>
												<div class="likes">
													<a href=""><span class="icons-like"></span></a>
													<a href=""><span class="icons-dislike"></span></a>
												</div>
												<div class="ansver">
													<span class="icons-arrowleft"></span><a href="#">Ответить</a>
												</div>
											</div>
										</div>


										<div class="comments_item">
											<div class="comments_head">
												<span class="time">10.08.2016</span>
												<h3>Андрей Андреевич</h3>
												<div class="cart_info_star">
													<i class="svg-star"></i>
													<i class="svg-star"></i>
													<i class="svg-star"></i>
													<i class="svg-star-o"></i>
													<i class="svg-star-o"></i>
												</div>
											</div>
											<div class="comments_body">
												<p>Очень долго думали: стоит ли приобретать такой матрас? Но не пожалели ни разу. Первое время вообще не могли проснуться. Верхний слой с памятью действительно позволяет полностью расслабиться всему телу.</p>
												<div class="rating">
													<p><strong>Достоинства:</strong> Практически всё супер</p>
													<p><strong>Недостатки:</strong> пока необнаружил</p>
												</div>


												<div class="comments_video">
													<div class="comments_video__item">
														<iframe class="img-responsive" src="https://www.youtube.com/embed/BfFK1oQaO80" frameborder="0" allowfullscreen></iframe>
														<div class="links">
															<a href="https://www.youtube.com/embed/BfFK1oQaO80" class="video"></a>
														</div>
													</div>

													<div class="comments_video__item">
														<iframe class="img-responsive" src="https://www.youtube.com/embed/BfFK1oQaO80" frameborder="0" allowfullscreen></iframe>
														<div class="links">
															<a href="https://www.youtube.com/embed/BfFK1oQaO80" class="video"></a>
														</div>
													</div>

													<div class="comments_video__item">
														<iframe class="img-responsive" src="https://www.youtube.com/embed/BfFK1oQaO80" frameborder="0" allowfullscreen></iframe>
														<div class="links">
															<a href="https://www.youtube.com/embed/BfFK1oQaO80" class="video"></a>
														</div>
													</div>
												</div>


												<div class="likes">
													<a href=""><span class="icons-like"></span></a>
													<a href=""><span class="icons-dislike"></span></a>
												</div>
												<div class="ansver">
													<span class="icons-arrowleft"></span><a href="#">Ответить</a>
												</div>
											</div>
										</div>




										<div class="comments_item">
											<div class="comments_head">
												<span class="time">10.08.2016</span>
												<h3>Андрей Андреевич</h3>
												<div class="cart_info_star">
													<i class="svg-star"></i>
													<i class="svg-star"></i>
													<i class="svg-star"></i>
													<i class="svg-star-o"></i>
													<i class="svg-star-o"></i>
												</div>
											</div>
											<div class="comments_body">
												<p>Очень долго думали: стоит ли приобретать такой матрас? Но не пожалели ни разу. Первое время вообще не могли проснуться. Верхний слой с памятью действительно позволяет полностью расслабиться всему телу.</p>
												<div class="rating">
													<p><strong>Достоинства:</strong> Практически всё супер</p>
													<p><strong>Недостатки:</strong> пока необнаружил</p>
												</div>
												<div class="comments_video">
													<div class="comments_video__item">
														<iframe class="img-responsive" src="https://www.youtube.com/embed/BfFK1oQaO80" frameborder="0" allowfullscreen></iframe>
														<div class="links">
															<a href="https://www.youtube.com/embed/BfFK1oQaO80" class="video"></a>
														</div>
													</div>

													<div class="comments_video__item">
														<iframe class="img-responsive" src="https://www.youtube.com/embed/BfFK1oQaO80" frameborder="0" allowfullscreen></iframe>
														<div class="links">
															<a href="https://www.youtube.com/embed/BfFK1oQaO80" class="video"></a>
														</div>
													</div>

													<div class="comments_video__item">
														<iframe class="img-responsive" src="https://www.youtube.com/embed/BfFK1oQaO80" frameborder="0" allowfullscreen></iframe>
														<div class="links">
															<a href="https://www.youtube.com/embed/BfFK1oQaO80" class="video"></a>
														</div>
													</div>
												</div>
												<div class="comments_foto">
													<a href="<?=SITE_TEMPLATE_PATH?>/img/catalog_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog_1.jpg" alt=""></a>
													<a href="<?=SITE_TEMPLATE_PATH?>/img/catalog_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog_2.jpg" alt=""></a>
													<a href="<?=SITE_TEMPLATE_PATH?>/img/catalog_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt=""></a>
												</div>
												<div class="likes">
													<a href=""><span class="icons-like"></span></a>
													<a href=""><span class="icons-dislike"></span></a>
												</div>
												<div class="ansver">
													<span class="icons-arrowleft"></span><a href="#">Ответить</a>
												</div>
											</div>
										</div>


										<div class="certificates">
											<div class="certificates_title">Сертификаты: </div>
											<div class="certificates_list">
												<a href="<?=SITE_TEMPLATE_PATH?>/img/certificates_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/certificates_1.jpg" alt=""></a>
												<a href="<?=SITE_TEMPLATE_PATH?>/img/certificates_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/certificates_1.jpg" alt=""></a>
												<a href="<?=SITE_TEMPLATE_PATH?>/img/certificates_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/certificates_1.jpg" alt=""></a>
												<a href="<?=SITE_TEMPLATE_PATH?>/img/certificates_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?=SITE_TEMPLATE_PATH?>/img/certificates_1.jpg" alt=""></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>





						<div class="product">
							<div class="container container-xs">
								<div class="product_slider">
									<div class="product_head">
										<div class="product_title">Также интересуются</div>
										<div class="product_nav">
											<div class="swiper-button-prev"><i class="svg-arrow"></i></div>
											<div class="swiper-button-next"><i class="svg-arrow"></i></div>
										</div>
									</div>
									<div class="swiper-container">
										<div class="swiper-wrapper -product_list">
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_discount" title="Скидка">%</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_discount" title="Скидка">%</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_discount" title="Скидка">%</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_discount" title="Скидка">%</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_discount" title="Скидка">%</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_discount" title="Скидка">%</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_discount" title="Скидка">%</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_discount" title="Скидка">%</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="product product_green">
							<div class="container container-xs">

								<div class="product_slider">
									<div class="product_head">
										<div class="product_title">Просмотренные товары</div>
										<div class="product_nav">
											<div class="swiper-button-prev"><i class="svg-arrow"></i></div>
											<div class="swiper-button-next"><i class="svg-arrow"></i></div>
										</div>
									</div>
									<div class="swiper-container">
										<div class="swiper-wrapper -product_list">
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_new" title="Новый товар">new</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_new" title="Новый товар">new</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_new" title="Новый товар">new</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_new" title="Новый товар">new</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_new" title="Новый товар">new</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_new" title="Новый товар">new</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_new" title="Новый товар">new</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
											<div class="product_item swiper-slide">
												<div class="product_item_prom">
													<div class="product_item_new" title="Новый товар">new</div>
												</div>
												<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
												<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
												<div class="product_item_size">Варианты:
													<select   class="select">
														<option value="">115x210 - 8 500 руб</option>
														<option value="">115x210 - 8 500 руб</option>
													</select>
												</div>
												<div class="product_item_price">8 500 руб</div>
												<div class="product_item_bottom">
													<a href="#" class="product_item_comparison"><i class="svg-list"></i></a>
													<a href="#" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>



						<div class="complexity">
							<div class="container">
								<form action="#" method="post" class="complexity_form">
									<div class="complexity_title">Возникли вопросы или трудности?</div>
									<div class="complexity_desc">Вы можете обратиться к специалисту за бесплатной консультацией оформив заявку на сайте</div>
									<input type="text" placeholder="Имя*">
									<input type="text" placeholder="+7 000 000-00-00"> <span class="ore">или</span>
									<input type="email" placeholder="example@gmail.com"><br>
									<button type="submit" class="btn">Заказать консультацию</button>
								</form>
							</div>
						</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>