<?
define("HIDE_SIDEBAR", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket",
	"",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"COLUMNS_LIST" => array(0=>"NAME",1=>"DISCOUNT",2=>"PRICE",3=>"QUANTITY",4=>"SUM",5=>"PROPS",6=>"DELETE",7=>"DELAY",),
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"HIDE_COUPON" => "N",
		"OFFERS_PROPS" => array(0=>"SIZES_SHOES",1=>"SIZES_CLOTHES",2=>"COLOR_REF",),
		"PATH_TO_ORDER" => "/personal/order/make/",
		"PRICE_VAT_SHOW_VALUE" => "Y",
		"QUANTITY_FLOAT" => "N",
		"SET_TITLE" => "Y",
		"TEMPLATE_THEME" => "site"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>