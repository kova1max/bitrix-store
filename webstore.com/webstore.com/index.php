<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная страница");

echo '<pre>';
print_r('HELLO WORLD');
echo '<pre>';

?>

<div class="slider">
		<div class="container">
			<div class="slider_form_w">
				<div class="slider_form">
					<div class="slider_form_head">
						<div class="slider_form_title">Нужно купить</div>
						<select   class="select">
							<option value="">Матрас</option>
							<option value="">Матрас</option>
						</select>
					</div>
					<form class="slider_form_content" method="post" action="/">
						<div class="slider_form_row">
							<div class="slider_form_item">
								<label >Тип матраса:</label>
								<select   class="select">
									<option value="">Пружинный</option>
									<option value="">lorem</option>
								</select>
							</div>
							<div class="slider_form_item">
								<label >Ширина матраса:</label>
								<select   class="select">
									<option value="">115 см</option>
									<option value="">lorem</option>
								</select>
							</div>
							<div class="slider_form_item">
								<label >Длинна матраса:</label>
								<select   class="select">
									<option value="">210 см</option>
									<option value="">lorem</option>
								</select>
							</div>
						</div>
						<div class="slider_form_row slider_hide">
							<div class="slider_form_item">
								<label >Бренд:</label>
								<select   class="select">
									<option value="">Пружинный</option>
									<option value="">lorem</option>
								</select>
							</div>
							<div class="slider_form_item">
								<label >Ширина матраса:</label>
								<select   class="select">
									<option value="">115 см</option>
									<option value="">lorem</option>
								</select>
							</div>
							<div class="slider_form_item">
								<label >Длинна матраса:</label>
								<select   class="select">
									<option value="">210 см</option>
									<option value="">lorem</option>
								</select>
							</div>
						</div>
						<div class="slider_form_row slider_form_range">
							<div class="slider_form_item">
								<label >Цена:</label>
								<div class="range">
									<input class="range_input range_input_min" id="range_min">
									<span></span>
									<input class="range_input range_input_max" id="range_max">
									<div class="range_slider" data-min="8000" data-max="16000" data-step="10" id="range"></div>
								</div>
							</div>
							<button type="submit" class="btn">Показать 28 товаров</button>
							<a href="#" class="btn slider_more">Расширенный фильтр</a>
						</div>
					</form>
				</div>
				<div class="slider_nav"><i class="svg-next"></i></div>
			</div>
			<div class="slider_content">
				<div class="slider_title">Optima Classic EVS</div>
				<ul>
					<li>ormafoam (10 мм)</li>
					<li>латексированная кокосовая койра (10 мм)</li>
					<li>спанбонд</li>
				</ul>
				<a href="" class="btn_more">Подробнее</a>
			</div>
		</div>
	</div>


	<div class="features">
		<div class="container">
			<div class="features_list">
				<a href="#" class="features_item"><i class="svg-pieces"></i><span>Большой ассортимент</span></a>
				<a href="#" class="features_item"><i class="svg-cash"></i><span>Приятные цены</span></a>
				<a href="#" class="features_item"><i class="svg-delivery"></i><span>Удобная доставка</span></a>
				<a href="#" class="features_item"><i class="svg-like"></i><span>Лучшее качество</span></a>
			</div>
		</div>
	</div>

	<div class="product">
		<div class="container container-xs">
			<div class="product_head">
				<div class="product_title">Хит продаж</div>
				<a href="#" class="product_all"><span>Все предложения</span><i class="svg-arrow"></i></a>
			</div>
			<div class="product_list">
				<div class="product_item">
					<div class="product_item_img">
						<div class="product_item_quick">
							<a href="#" class="btn btn_blue">Быстрый просмотр</a>
						</div>
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img">
					</div>
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

				<div class="product_item">
					<div class="product_item_img">
						<div class="product_item_prom">
							<div class="product_item_discount" title="Скидка">%</div>
							<div class="product_item_new" title="Новый товар">new</div>
						</div>
						<div class="product_item_quick">
							<a href="#" class="btn btn_blue">Быстрый просмотр</a>
						</div>
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img">
					</div>
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

				<div class="product_item">
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

				<div class="product_item">
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

				<div class="product_item">
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

				<div class="product_item">
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

				<div class="product_item">
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

				<div class="product_item">
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

	<div class="product product_red">
		<div class="container container-xs">
			<div class="product_head">
				<div class="product_title">Акционные товары</div>
				<a href="#" class="product_all">Все предложения <i class="svg-arrow"></i></a>
			</div>
			<div class="product_list">
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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

	<div class="product product_green">
		<div class="container container-xs">
			<div class="product_head">
				<div class="product_title">Новинки</div>
				<a href="#" class="product_all">Все предложения <i class="svg-arrow"></i></a>
			</div>
			<div class="product_list">
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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
				<div class="product_item">
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




	<div class="useful">
		<div class="container container-xs">
			<div class="title_under useful_title">Полезные статьи</div>
			<div class="useful_list">
				<div class="useful_coll">
					<div class="useful_item useful_item_big">
						<a href="#" class="useful_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/useful_item_1.jpg" alt=""></a>
						<div class="useful_item_content">
							<div class="useful_item_date"><i class="svg-calendar"></i>10.08.2016</div>
							<a href="" class="useful_item_title">Новая коллекция матрасов, подушек и наматрасников Ormatek Ocean</a>
							<p><a href="#">Благодаря уникальному сочетанию этих преимуществ предметы коллек-ции Ocean не оказывают обратного давления на тело спящего человека.</a></p>
							<a href="#" class="btn">Подробнее</a>
						</div>
					</div>
				</div>
				<div class="useful_coll">
					<div class="useful_item">
						<a href="#" class="useful_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/useful_item_2.jpg" alt=""></a>
						<div class="useful_item_content">
							<div class="useful_item_date"><i class="svg-calendar"></i>10.08.2016</div>
							<a href="" class="useful_item_title">Как выбрать матрас?</a>
							<p><a href="#">Благодаря уникальному сочетанию этих преи-муществ предметы коллекции Ocean не оказывают обратного давления на тело спящего человека.</a></p>
							<a href="#" class="btn">Подробнее</a>
						</div>
					</div>
					<div class="useful_item">
						<a href="#" class="useful_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/useful_item_2.jpg" alt=""></a>
						<div class="useful_item_content">
							<div class="useful_item_date"><i class="svg-calendar"></i>10.08.2016</div>
							<a href="" class="useful_item_title">Как выбрать матрас?</a>
							<p><a href="#">Благодаря уникальному сочетанию этих преимуществ предметы коллекции Ocean не оказывают обратного давления на тело спящего человека.</a></p>
							<a href="#" class="btn">Подробнее</a>
						</div>
					</div>
				</div>
			</div>
			<a href="#" class="useful_all btn_more">Все статьи</a>
		</div>
	</div>


	<div class="subscribe">
		<div class="container">
			<form action="#" method="post">
				<div class="subscribe_title">Подписаться на скидки/акции</div>
				<input type="text" placeholder="Email">
				<button type="submit" class="btn">Подписаться</button>
			</form>
		</div>
	</div>


	<div class="about_w">
		<div class="container container-xs">
			<div class="about">
				<div class="about_title title_under">О компании</div>
				<a href="#" class="about_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/about.jpg" alt=""></a>
				<div class="about_content">
					<p>Ведущий российский производитель товаров для сна.Компания занимает уверенные позиции на мебельном рынке и входит в число лидеров в своей отрасли.
						<br> В салоне вы найдете все, что нужно для комфортного и полноценного отдыха: анатомические матрасы, подушки, наматрасники, кровати, мебель для спальни и прочее.</p>
					<p>Широкий ассортимент продукции, комплектность и многообразие цветовых решений помогут создать вам индивидуальный интерьер вашей спальни.</p>
					<a href="#" class="btn_more">Подробнее</a>
				</div>
			</div>
		</div>
	</div>


	<div class="reviews">
		<div class="container container-xs">
			<div class="reviews_title title_under">Последние отзывы</div>
			<div class="reviews_list">
				<div class="reviews_item">
					<div class="reviews_item_top">
						<a href="#" class="reviews_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/reviews_item.jpg" alt=""></a>
						<div class="reviews_item_content">
							<div class="reviews_item_star">
								<i class="svg-star"></i>
								<i class="svg-star"></i>
								<i class="svg-star"></i>
								<i class="svg-star-o"></i>
								<i class="svg-star-o"></i>
							</div>
							<a href="#" class="reviews_item_link">Матрас Венето Family Style 120х190 см</a>
							<div class="btn btn_blue">8 500 руб.</div>
						</div>
					</div>
					<p class="reviews_item_text">Очень долго думали: стоит ли приобретать такой матрас? Но не пожалели ни разу. Первое время вообще не могли проснуться. Верхний слой с памятью действительно позволяет полностью расслабиться всему телу. Консультанты и служба доставки работают отлично. Очень был…</p>
					<div class="reviews_item_bottom">
						<div class="reviews_item_photo"><i class="svg-avatar"></i></div>
						<div class="reviews_item_info">
							<div class="reviews_item_name">Иванов Иван Инванович</div>
							<div class="reviews_item_date">11.09.2016</div>
						</div>
					</div>
				</div>
				<div class="reviews_item">
					<div class="reviews_item_top">
						<a href="#" class="reviews_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/reviews_item.jpg" alt=""></a>
						<div class="reviews_item_content">
							<div class="reviews_item_star">
								<i class="svg-star"></i>
								<i class="svg-star"></i>
								<i class="svg-star"></i>
								<i class="svg-star-o"></i>
								<i class="svg-star-o"></i>
							</div>
							<a href="#" class="reviews_item_link">Матрас Венето Family Style 120х190 см</a>
							<div class="btn btn_blue">8 500 руб.</div>
						</div>
					</div>
					<p class="reviews_item_text">Очень долго думали: стоит ли приобретать такой матрас? Но не пожалели ни разу. Первое время вообще не могли проснуться. Верхний слой с памятью действительно позволяет полностью расслабиться всему телу. Консультанты и служба доставки работают отлично. Очень был…</p>
					<div class="reviews_item_bottom">
						<div class="reviews_item_photo"><i class="svg-avatar"></i></div>
						<div class="reviews_item_info">
							<div class="reviews_item_name">Иванов Иван Инванович</div>
							<div class="reviews_item_date">11.09.2016</div>
						</div>
					</div>
				</div>
				<div class="reviews_item">
					<div class="reviews_item_top">
						<a href="#" class="reviews_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/reviews_item.jpg" alt=""></a>
						<div class="reviews_item_content">
							<div class="reviews_item_star"><i class="svg-star"></i><i class="svg-star"></i><i class="svg-star"></i><i class="svg-star-o"></i><i class="svg-star-o"></i></div>
							<a href="#" class="reviews_item_link">Матрас Венето Family Style 120х190 см</a>
							<div class="btn btn_blue">8 500 руб.</div>
						</div>
					</div>
					<p class="reviews_item_text">Очень долго думали: стоит ли приобретать такой матрас? Но не пожалели ни разу. Первое время вообще не могли проснуться. Верхний слой с памятью действительно позволяет полностью расслабиться всему телу. Консультанты и служба доставки работают отлично. Очень был…</p>
					<div class="reviews_item_bottom">
						<div class="reviews_item_photo"><i class="svg-avatar"></i></div>
						<div class="reviews_item_info">
							<div class="reviews_item_name">Иванов Иван Инванович</div>
							<div class="reviews_item_date">11.09.2016</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>