<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>

	<div class="footer">
		<div class="container container-xs">
			<div class="footer_w">
				<div class="footer_left">
					<div class="footer_item">
						<div class="footer_title">Информация</div>
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"super_top",
							Array(
								"CLASS" => "footer_menu",
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "left",
								"COMPONENT_TEMPLATE" => "custom_menu",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => "",
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_THEME" => "site",
								"ROOT_MENU_TYPE" => "left",
								"USE_EXT" => "N"
							)
						);?>
					</div>
					<div class="footer_item">
						<div class="footer_title">Продукция</div>
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"super_top",
							Array(
								"CLASS" => "footer_menu",
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "left",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(""),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_USE_GROUPS" => "N",
								"ROOT_MENU_TYPE" => "bottom",
								"USE_EXT" => "Y"
							)
						);?>
					</div>
				</div>
				<div class="footer_right">
					<div class="footer_contact">

						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_TEMPLATE_PATH . "/include/footer/adress.php"
							)
						);?>

						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_TEMPLATE_PATH . "/include/footer/number.php"
							)
						);?>

						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_TEMPLATE_PATH . "/include/footer/email.php"
							)
						);?>
						
						<br>
						<!-- FIXME: Обратный звонок (вспливайка) -->
						<a href="#" class="btn footer_callback">Обратный звонок</a>

						<!-- FIXME: Ссылки на соц. сети -->
						<div class="footer_social">
							<a href="/some-url-adress/"><i class="icon-social_vk"></i></a>
							<a href="/some-url-adress/"><i class="icon-social_gp"></i></a>
							<a href="/some-url-adress/"><i class="icon-social_fb"></i></a>
							<a href="/some-url-adress/"><i class="icon-social_yt"></i></a>
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