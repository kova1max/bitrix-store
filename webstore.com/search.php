<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Поиск");
$APPLICATION->SetTitle("Поиск");
?>
	<div class="container">
		<div class="catalog">
			<form class="filter">
				<div class="filter_head">Все результаты (2150)</div>
				<div class="filter_item">
					<div class="filter_title">Матрасы <span>(36)</span></div>
					<a href="#">Наматрасники <span>(302)</span></a>
					<a href="#">Подушки <span>(302)</span></a>
					<a href="#">Одеяла <span>(302)</span></a>
					<a href="#">Белье <span>(302)</span></a>
					<a href="#">Пледы <span>(302)</span></a>
					<a href="#">Для ванной <span>(3)</span></a>
					<a href="#">Для кухни <span>(302)</span></a>
					<a href="#">Мебель <span>(2)</span></a>
				</div>
				<div class="filter_item">
					
					<div class="filter_title">Тип матраса<i class="svg-next active"></i></div>
					<div class="label_wrap">
						<label><input type="checkbox" class="checkbox" >Пружинный <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Безпружинный <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >В рулоне <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Высокие <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Тонкие <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Для диванов <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Детские <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Латексные <span>(302)</span></label>
					</div>
				</div>
				<div class="filter_item">
					<div class="filter_title">Производитель<i class="svg-next active"></i></div>
					<div class="label_wrap">
						<label><input type="checkbox" class="checkbox" >Perrino<span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Орматек <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Matramax <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Аскона <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Consul <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Dreamline <span>(2)</span></label>
						<label><input type="checkbox" class="checkbox" >Innergetic <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Virtuoz <span>(302)</span></label>
						<a href="#" class="filter_item_more">Все производители</a>
						<label><input type="checkbox" class="checkbox" >Consul <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Dreamline <span>(2)</span></label>
						<label><input type="checkbox" class="checkbox" >Innergetic <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >Virtuoz <span>(302)</span></label>
					</div>
				</div>
				<div class="filter_item">
					
					<div class="filter_title">Размеры<i class="svg-next"></i></div>
					<div class="label_wrap" style="display: none;">
						<label><input type="checkbox" class="checkbox" >75 х 100 см <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >80 х 100 см <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >90 х 140 см <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >100 х 140 см <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >120 х 180 см <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >130 х 170 см <span>(2)</span></label>
						<label><input type="checkbox" class="checkbox" >140 х 200 см <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >140 х 220 см <span>(302)</span></label>
						<a href="#" class="filter_item_more">Все размеры</a>
						<label><input type="checkbox" class="checkbox" >120 х 180 см <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >130 х 170 см <span>(2)</span></label>
						<label><input type="checkbox" class="checkbox" >140 х 200 см <span>(302)</span></label>
						<label><input type="checkbox" class="checkbox" >140 х 220 см <span>(302)</span></label>
					</div>
				</div>
		
			
				<div class="filter_item">
					<div class="filter_title">Длинна, см</div>
					<div class="filter_range">
						
						<div class="range_slider" data-min="8000" data-max="16000" data-step="10"></div>
						<input class="filter_range_input range_input_min">
						<span></span>
						<input class="filter_range_input range_input_max">
					</div>
				</div>
				<div class="filter_item">
					<div class="filter_title">Ширина, см</div>
					<div class="filter_range">
						
						<div class="range_slider" data-min="8000" data-max="16000" data-step="10"></div>
						<input class="filter_range_input range_input_min">
						<span></span>
						<input class="filter_range_input range_input_max">
					</div>
				</div>
				<div class="filter_item">
					<div class="filter_title">Высота, см</div>
					<div class="filter_range">
						
						<div class="range_slider" data-min="8000" data-max="16000" data-step="10"></div>
						<input class="filter_range_input range_input_min">
						<span></span>
						<input class="filter_range_input range_input_max">
					</div>
				</div>
				<div class="filter_item">
					<div class="filter_title">Вес спящего, кг</div>
					<div class="filter_range">
						
						<div class="range_slider" data-min="8000" data-max="16000" data-step="10"></div>
						<input class="filter_range_input range_input_min">
						<span></span>
						<input class="filter_range_input range_input_max">
					</div>
				</div>
				<div class="filter_item">
					<div class="filter_title">Цена, руб</div>
					<div class="filter_range">
						
						<div class="range_slider" data-min="8000" data-max="16000" data-step="10"></div>
						<input class="filter_range_input range_input_min">
						<span></span>
						<input class="filter_range_input range_input_max">
					</div>
				</div>
			</form>

			<div class="catalog_content">
				<div class="catalog_head">
					<div class="catalog_search">По запросу «dormeo» найдено <span>2452 товара</span></div>
					<div class="catalog_sort">
						Сортировать:
						<select  class="select">
							<option value="">По рейтингу</option>
							<option value="">lorem</option>
						</select>
					</div>
				</div>
				<div class="catalog_list">
					<div class="product_item">
						<a href="#" class="product_item_img"><img src="<?=SITE_TEMPLATE_PATH?>/img/product_item_1.jpg" alt="product img"></a>
						<a href="#" class="product_item_title">Матрас Венето Family Style  120х190 см  </a>
						<div class="product_item_size">Варианты:
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
							<select  class="select">
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
				<div class="catalog_more_w">
					<a href="#" class="catalog_more">Показать еще 12 товаров</a>
				</div>
				<ul class="pagination">
					<li><a href="#">&lt;&lt;</a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">>></a></li>
				</ul>

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