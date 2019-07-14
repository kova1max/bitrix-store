<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
	<div class="footer">
		<div class="container container-xs">
			<div class="footer_w">
				<div class="footer_left">
					<div class="footer_item">
						<div class="footer_title">Информация</div>
						<ul class="footer_menu">
							<li><a href="company.php">О компании</a></li>
							<li><a href="#">Доставка и оплата</a></li>
							<li><a href="#">Возврат и обмен</a></li>
							<li><a href="news.php">Статьи</a></li>
							<li><a href="#">Сертификаты</a></li>
							<li><a href="reviews.php">Отзывы</a></li>
							<li><a href="news.php">Новости</a></li>
							<li><a href="contact.php">Контакты</a></li>
						</ul>
					</div>
					<div class="footer_item">
						<div class="footer_title">Продукция</div>
						<ul class="footer_menu">
							<li><a href="#">Матрасы</a></li>
							<li><a href="#">Подушки</a></li>
							<li><a href="#">Одеяла</a></li>
							<li><a href="#">Постельное белье</a></li>
							<li><a href="#">Наматрасники</a></li>
							<li><a href="#">Пледы</a></li>
							<li><a href="#">Для ванной</a></li>
							<li><a href="#">Для кухни</a></li>
							<li><a href="#">Мебель</a></li>
							<li><a href="#">Рапродажа</a></li>
						</ul>
					</div>
				</div>
				<div class="footer_right">
					<div class="footer_contact">
						<div class="footer_title"><i class="svg-geo"></i>Москва, ул. Пушкина 10</div>
						<div class="footer_phone">0 800 <strong>505 90 90</strong></div>
						<a href="mailto:domsna@yandex.ru" class="footer_link">domsna@yandex.ru</a>
						<br>
						<a href="#" class="btn footer_callback">Обратный звонок</a>
						<div class="footer_social">
							<a href="#"><i class="icon-social_vk"></i></a>
							<a href="#"><i class="icon-social_gp"></i></a>
							<a href="#"><i class="icon-social_fb"></i></a>
							<a href="#"><i class="icon-social_yt"></i></a>
						</div>
					</div>
					<div class="footer_info">
						<div class="footer_copy">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/include/footer_copy.php"
								)
							);?>
					</div>
						<div class="footer_pay"><img src="<?=SITE_TEMPLATE_PATH?>/img/footer_pay.png" alt=""></div>
						<div class="developer">
							<div class="developer_logo"><i class="svg-developer"></i></div>
							<div class="developer_text">Создание сайтов <a href="#" class="footer_link">Wise-Solutions</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?=SITE_TEMPLATE_PATH?>/bower_components/jquery/dist/jquery.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/bower_components/swiper/dist/js/swiper.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/bower_components/chosen/chosen.jquery.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/bower_components/nouislider/distribute/nouislider.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/bower_components/iCheck/icheck.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/bower_components/tooltip/dist/tooltip.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/bower_components/fancyBox/source/jquery.fancybox.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.cookie.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>

</body>

</html>