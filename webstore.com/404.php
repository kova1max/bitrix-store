<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
define("HIDE_SIDEBAR", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>

	<div class="container">
		<?
			$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"custom_bc",
				array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0",
					"COMPONENT_TEMPLATE" => "custom_bc"
				),
				false
			);
		?>
	</div>

	<div class="no-found">
		<div class="container">
			<h1>Страница не найдена</h1>
			<p>Воспользуйтесь меню, чтобы перейти в интересующий вас раздел</p>
			<img src="<?=SITE_TEMPLATE_PATH?>/img/404.png" alt="">
		</div>
	</div>

<?	$APPLICATION->IncludeComponent(
"bitrix:catalog.products.viewed",
"viewed",
Array(
"ACTION_VARIABLE" => "action_cpv",
"ADDITIONAL_PICT_PROP_14" => "-",
"ADDITIONAL_PICT_PROP_15" => "-",
"ADD_PROPERTIES_TO_BASKET" => "Y",
"ADD_TO_BASKET_ACTION" => "ADD2BASKET",
"BASKET_URL" => "/personal/cart/",
"CACHE_GROUPS" => "Y",
"CACHE_TIME" => "3600",
"CACHE_TYPE" => "A",
"CONVERT_CURRENCY" => "N",
"DEPTH" => "2",
"DISCOUNT_PERCENT_POSITION" => "bottom-right",
"DISPLAY_COMPARE" => "N",
"ENLARGE_PRODUCT" => "STRICT",
"HIDE_NOT_AVAILABLE" => "N",
"HIDE_NOT_AVAILABLE_OFFERS" => "N",
"IBLOCK_ID" => "14",
"IBLOCK_MODE" => "single",
"IBLOCK_TYPE" => "catalog",
"LABEL_PROP_14" => "",
"LABEL_PROP_POSITION" => "top-left",
"MESS_BTN_ADD_TO_BASKET" => "В корзину",
"MESS_BTN_BUY" => "Купить",
"MESS_BTN_DETAIL" => "Подробнее",
"MESS_BTN_SUBSCRIBE" => "Подписаться",
"MESS_NOT_AVAILABLE" => "Нет в наличии",
"PAGE_ELEMENT_COUNT" => "9",
"PARTIAL_PRODUCT_PROPERTIES" => "N",
"PRICE_CODE" => array(0=>"BASE",),
"PRICE_VAT_INCLUDE" => "Y",
"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
"PRODUCT_ID_VARIABLE" => "id",
"PRODUCT_PROPS_VARIABLE" => "prop",
"PRODUCT_QUANTITY_VARIABLE" => "quantity",
"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
"PRODUCT_SUBSCRIPTION" => "Y",
"SECTION_CODE" => "",
"SECTION_ELEMENT_CODE" => "",
"SECTION_ELEMENT_ID" => $GLOBALS["CATALOG_CURRENT_ELEMENT_ID"],
"SECTION_ID" => $GLOBALS["CATALOG_CURRENT_SECTION_ID"],
"SHOW_CLOSE_POPUP" => "N",
"SHOW_DISCOUNT_PERCENT" => "Y",
"SHOW_FROM_SECTION" => "N",
"SHOW_MAX_QUANTITY" => "N",
"SHOW_OLD_PRICE" => "Y",
"SHOW_PRICE_COUNT" => "1",
"SHOW_SLIDER" => "Y",
"SLIDER_INTERVAL" => "3000",
"SLIDER_PROGRESS" => "N",
"TEMPLATE_THEME" => "blue",
"USE_ENHANCED_ECOMMERCE" => "N",
"USE_PRICE_COUNT" => "N",
"USE_PRODUCT_QUANTITY" => "N"
)
);

?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>