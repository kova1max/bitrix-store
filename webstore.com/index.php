<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Главная страница");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"main_filter",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_AVAILABLE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"SORT",5=>"DESCRIPTION",6=>"PICTURE",7=>"DETAIL_PICTURE",8=>"IBLOCK_TYPE_ID",9=>"IBLOCK_ID",10=>"IBLOCK_CODE",11=>"IBLOCK_EXTERNAL_ID",12=>"DATE_CREATE",13=>"CREATED_BY",14=>"TIMESTAMP_X",15=>"MODIFIED_BY",16=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"UF_ICON",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "10",
		"VIEW_MODE" => "LIST"
	)
);?>

<!-- FIXME: FEATURES -->

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

		<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section", 
				"main_section", 
				array(
					"DIV_TYPE" => "catalog_list",
					"COMPONENT_TEMPLATE" => "sect_new",
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => "14",
					"ELEMENT_SORT_FIELD" => "name",
					"ELEMENT_SORT_ORDER" => "desc",
					"ELEMENT_SORT_FIELD2" => "timestamp_x",
					"ELEMENT_SORT_ORDER2" => "desc",
					"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"])?$arParams["LIST_PROPERTY_CODE"]:[]),
					"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
					"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
					"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
					"BROWSER_TITLE" => "-",
					"SET_LAST_MODIFIED" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"FILTER_NAME" => "arrFilter",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "N",
					"SET_TITLE" => "N",
					"MESSAGE_404" => $arParams["~MESSAGE_404"],
					"SET_STATUS_404" => "N",
					"SHOW_404" => "N",
					"FILE_404" => $arParams["FILE_404"],
					"DISPLAY_COMPARE" => "N",
					"PAGE_ELEMENT_COUNT" => "0",
					"LINE_ELEMENT_COUNT" => "2",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
					"PRICE_VAT_INCLUDE" => "N",
					"USE_PRODUCT_QUANTITY" => "N",
					"ADD_PROPERTIES_TO_BASKET" => "N",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => "N",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"LAZY_LOAD" => $arParams["LAZY_LOAD"],
					"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
					"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],
					"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
					"OFFERS_FIELD_CODE" => array(
						0 => "ID",
						1 => "CODE",
						2 => "XML_ID",
						3 => "NAME",
						4 => "TAGS",
						5 => "SORT",
						6 => "PREVIEW_TEXT",
						7 => "PREVIEW_PICTURE",
						8 => "DETAIL_TEXT",
						9 => "DETAIL_PICTURE",
						10 => "DATE_ACTIVE_FROM",
						11 => "ACTIVE_FROM",
						12 => "DATE_ACTIVE_TO",
						13 => "ACTIVE_TO",
						14 => "SHOW_COUNTER",
						15 => "SHOW_COUNTER_START",
						16 => "IBLOCK_TYPE_ID",
						17 => "IBLOCK_ID",
						18 => "IBLOCK_CODE",
						19 => "IBLOCK_NAME",
						20 => "IBLOCK_EXTERNAL_ID",
						21 => "DATE_CREATE",
						22 => "CREATED_BY",
						23 => "CREATED_USER_NAME",
						24 => "TIMESTAMP_X",
						25 => "MODIFIED_BY",
						26 => "USER_NAME",
						27 => $arParams["LIST_OFFERS_FIELD_CODE"],
						28 => "",
					),
					"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
					"OFFERS_SORT_FIELD" => "shows",
					"OFFERS_SORT_ORDER" => "desc",
					"OFFERS_SORT_FIELD2" => "timestamp_x",
					"OFFERS_SORT_ORDER2" => "asc",
					"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"])?$arParams["LIST_OFFERS_LIMIT"]:0),
					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"SECTION_URL" => "/catalog/",
					"DETAIL_URL" => "/catalog/#ID#",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"HIDE_NOT_AVAILABLE" => "Y",
					"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
					"LABEL_PROP" => $arParams["LABEL_PROP"],
					"LABEL_PROP_MOBILE" => $arParams["LABEL_PROP_MOBILE"],
					"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
					"ADD_PICT_PROP" => $arParams["ADD_PICT_PROP"],
					"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
					"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
					"PRODUCT_ROW_VARIANTS" => $arParams["LIST_PRODUCT_ROW_VARIANTS"],
					"ENLARGE_PRODUCT" => $arParams["LIST_ENLARGE_PRODUCT"],
					"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
					"SHOW_SLIDER" => $arParams["LIST_SHOW_SLIDER"],
					"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
					"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
					"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
					"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
					"PRODUCT_SUBSCRIPTION" => $arParams["PRODUCT_SUBSCRIPTION"],
					"SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
					"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
					"SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
					"SHOW_MAX_QUANTITY" => $arParams["SHOW_MAX_QUANTITY"],
					"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
					"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
					"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
					"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
					"MESS_BTN_BUY" => (isset($arParams["~MESS_BTN_BUY"])?$arParams["~MESS_BTN_BUY"]:""),
					"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["~MESS_BTN_ADD_TO_BASKET"])?$arParams["~MESS_BTN_ADD_TO_BASKET"]:""),
					"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
					"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
					"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
					"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
					"USE_ENHANCED_ECOMMERCE" => (isset($arParams["USE_ENHANCED_ECOMMERCE"])?$arParams["USE_ENHANCED_ECOMMERCE"]:""),
					"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
					"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
					"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => $basketAction,
					"SHOW_CLOSE_POPUP" => isset($arParams["COMMON_SHOW_CLOSE_POPUP"])?$arParams["COMMON_SHOW_CLOSE_POPUP"]:"",
					"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
					"COMPARE_NAME" => $arParams["COMPARE_NAME"],
					"USE_COMPARE_LIST" => "Y",
					"BACKGROUND_IMAGE" => "-",
					"COMPATIBLE_MODE" => "N",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SHOW_ALL_WO_SECTION" => "N",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
					"SEF_MODE" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"SET_BROWSER_TITLE" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_META_DESCRIPTION" => "Y"
				),
				$component
			);?>
	</div>
</div>

<div class="product product_red">
	<div class="container container-xs">
		<div class="product_head">
			<div class="product_title">Акционные товары</div>
			<a href="/catalog/36/" class="product_all">Все предложения <i class="svg-arrow"></i></a>
		</div>
		<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section", 
				"main_section", 
				array(
					"DIV_TYPE" => "product_list",
					"COMPONENT_TEMPLATE" => "sect_new",
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => "14",
					"ELEMENT_SORT_FIELD" => "name",
					"ELEMENT_SORT_ORDER" => "desc",
					"ELEMENT_SORT_FIELD2" => "timestamp_x",
					"ELEMENT_SORT_ORDER2" => "desc",
					"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"])?$arParams["LIST_PROPERTY_CODE"]:[]),
					"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
					"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
					"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
					"BROWSER_TITLE" => "-",
					"SET_LAST_MODIFIED" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"FILTER_NAME" => "arrFilter",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "N",
					"SET_TITLE" => "N",
					"MESSAGE_404" => $arParams["~MESSAGE_404"],
					"SET_STATUS_404" => "N",
					"SHOW_404" => "N",
					"FILE_404" => $arParams["FILE_404"],
					"DISPLAY_COMPARE" => "N",
					"PAGE_ELEMENT_COUNT" => "0",
					"LINE_ELEMENT_COUNT" => "2",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
					"PRICE_VAT_INCLUDE" => "N",
					"USE_PRODUCT_QUANTITY" => "N",
					"ADD_PROPERTIES_TO_BASKET" => "N",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => "N",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"LAZY_LOAD" => $arParams["LAZY_LOAD"],
					"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
					"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],
					"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
					"OFFERS_FIELD_CODE" => array(
						0 => "ID",
						1 => "CODE",
						2 => "XML_ID",
						3 => "NAME",
						4 => "TAGS",
						5 => "SORT",
						6 => "PREVIEW_TEXT",
						7 => "PREVIEW_PICTURE",
						8 => "DETAIL_TEXT",
						9 => "DETAIL_PICTURE",
						10 => "DATE_ACTIVE_FROM",
						11 => "ACTIVE_FROM",
						12 => "DATE_ACTIVE_TO",
						13 => "ACTIVE_TO",
						14 => "SHOW_COUNTER",
						15 => "SHOW_COUNTER_START",
						16 => "IBLOCK_TYPE_ID",
						17 => "IBLOCK_ID",
						18 => "IBLOCK_CODE",
						19 => "IBLOCK_NAME",
						20 => "IBLOCK_EXTERNAL_ID",
						21 => "DATE_CREATE",
						22 => "CREATED_BY",
						23 => "CREATED_USER_NAME",
						24 => "TIMESTAMP_X",
						25 => "MODIFIED_BY",
						26 => "USER_NAME",
						27 => $arParams["LIST_OFFERS_FIELD_CODE"],
						28 => "",
					),
					"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
					"OFFERS_SORT_FIELD" => "shows",
					"OFFERS_SORT_ORDER" => "desc",
					"OFFERS_SORT_FIELD2" => "timestamp_x",
					"OFFERS_SORT_ORDER2" => "asc",
					"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"])?$arParams["LIST_OFFERS_LIMIT"]:0),
					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"SECTION_URL" => "/catalog/",
					"DETAIL_URL" => "/catalog/#ID#",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"HIDE_NOT_AVAILABLE" => "Y",
					"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
					"LABEL_PROP" => $arParams["LABEL_PROP"],
					"LABEL_PROP_MOBILE" => $arParams["LABEL_PROP_MOBILE"],
					"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
					"ADD_PICT_PROP" => $arParams["ADD_PICT_PROP"],
					"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
					"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
					"PRODUCT_ROW_VARIANTS" => $arParams["LIST_PRODUCT_ROW_VARIANTS"],
					"ENLARGE_PRODUCT" => $arParams["LIST_ENLARGE_PRODUCT"],
					"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
					"SHOW_SLIDER" => $arParams["LIST_SHOW_SLIDER"],
					"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
					"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
					"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
					"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
					"PRODUCT_SUBSCRIPTION" => $arParams["PRODUCT_SUBSCRIPTION"],
					"SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
					"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
					"SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
					"SHOW_MAX_QUANTITY" => $arParams["SHOW_MAX_QUANTITY"],
					"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
					"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
					"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
					"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
					"MESS_BTN_BUY" => (isset($arParams["~MESS_BTN_BUY"])?$arParams["~MESS_BTN_BUY"]:""),
					"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["~MESS_BTN_ADD_TO_BASKET"])?$arParams["~MESS_BTN_ADD_TO_BASKET"]:""),
					"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
					"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
					"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
					"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
					"USE_ENHANCED_ECOMMERCE" => (isset($arParams["USE_ENHANCED_ECOMMERCE"])?$arParams["USE_ENHANCED_ECOMMERCE"]:""),
					"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
					"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
					"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => $basketAction,
					"SHOW_CLOSE_POPUP" => isset($arParams["COMMON_SHOW_CLOSE_POPUP"])?$arParams["COMMON_SHOW_CLOSE_POPUP"]:"",
					"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
					"COMPARE_NAME" => $arParams["COMPARE_NAME"],
					"USE_COMPARE_LIST" => "Y",
					"BACKGROUND_IMAGE" => "-",
					"COMPATIBLE_MODE" => "N",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SHOW_ALL_WO_SECTION" => "N",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
					"SEF_MODE" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"SET_BROWSER_TITLE" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_META_DESCRIPTION" => "Y"
				),
				$component
			);?>
	</div>
</div>

<div class="product product_green">
	<div class="container container-xs">
		<div class="product_head">
			<div class="product_title">Новинки</div>
			<a href="#" class="product_all">Все предложения <i class="svg-arrow"></i></a>
		</div>
		<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section", 
				"main_section", 
				array(
					"DIV_TYPE" => "product_list",
					"COMPONENT_TEMPLATE" => "sect_new",
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => "14",
					"ELEMENT_SORT_FIELD" => "name",
					"ELEMENT_SORT_ORDER" => "desc",
					"ELEMENT_SORT_FIELD2" => "timestamp_x",
					"ELEMENT_SORT_ORDER2" => "desc",
					"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"])?$arParams["LIST_PROPERTY_CODE"]:[]),
					"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
					"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
					"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
					"BROWSER_TITLE" => "-",
					"SET_LAST_MODIFIED" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"FILTER_NAME" => "arrFilter",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "N",
					"SET_TITLE" => "N",
					"MESSAGE_404" => $arParams["~MESSAGE_404"],
					"SET_STATUS_404" => "N",
					"SHOW_404" => "N",
					"FILE_404" => $arParams["FILE_404"],
					"DISPLAY_COMPARE" => "N",
					"PAGE_ELEMENT_COUNT" => "0",
					"LINE_ELEMENT_COUNT" => "2",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
					"PRICE_VAT_INCLUDE" => "N",
					"USE_PRODUCT_QUANTITY" => "N",
					"ADD_PROPERTIES_TO_BASKET" => "N",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => "N",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"LAZY_LOAD" => $arParams["LAZY_LOAD"],
					"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
					"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],
					"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
					"OFFERS_FIELD_CODE" => array(
						0 => "ID",
						1 => "CODE",
						2 => "XML_ID",
						3 => "NAME",
						4 => "TAGS",
						5 => "SORT",
						6 => "PREVIEW_TEXT",
						7 => "PREVIEW_PICTURE",
						8 => "DETAIL_TEXT",
						9 => "DETAIL_PICTURE",
						10 => "DATE_ACTIVE_FROM",
						11 => "ACTIVE_FROM",
						12 => "DATE_ACTIVE_TO",
						13 => "ACTIVE_TO",
						14 => "SHOW_COUNTER",
						15 => "SHOW_COUNTER_START",
						16 => "IBLOCK_TYPE_ID",
						17 => "IBLOCK_ID",
						18 => "IBLOCK_CODE",
						19 => "IBLOCK_NAME",
						20 => "IBLOCK_EXTERNAL_ID",
						21 => "DATE_CREATE",
						22 => "CREATED_BY",
						23 => "CREATED_USER_NAME",
						24 => "TIMESTAMP_X",
						25 => "MODIFIED_BY",
						26 => "USER_NAME",
						27 => $arParams["LIST_OFFERS_FIELD_CODE"],
						28 => "",
					),
					"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
					"OFFERS_SORT_FIELD" => "shows",
					"OFFERS_SORT_ORDER" => "desc",
					"OFFERS_SORT_FIELD2" => "timestamp_x",
					"OFFERS_SORT_ORDER2" => "asc",
					"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"])?$arParams["LIST_OFFERS_LIMIT"]:0),
					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"SECTION_URL" => "/catalog/",
					"DETAIL_URL" => "/catalog/#ID#",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"HIDE_NOT_AVAILABLE" => "Y",
					"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
					"LABEL_PROP" => $arParams["LABEL_PROP"],
					"LABEL_PROP_MOBILE" => $arParams["LABEL_PROP_MOBILE"],
					"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
					"ADD_PICT_PROP" => $arParams["ADD_PICT_PROP"],
					"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
					"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
					"PRODUCT_ROW_VARIANTS" => $arParams["LIST_PRODUCT_ROW_VARIANTS"],
					"ENLARGE_PRODUCT" => $arParams["LIST_ENLARGE_PRODUCT"],
					"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
					"SHOW_SLIDER" => $arParams["LIST_SHOW_SLIDER"],
					"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
					"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
					"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
					"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
					"PRODUCT_SUBSCRIPTION" => $arParams["PRODUCT_SUBSCRIPTION"],
					"SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
					"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
					"SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
					"SHOW_MAX_QUANTITY" => $arParams["SHOW_MAX_QUANTITY"],
					"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
					"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
					"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
					"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
					"MESS_BTN_BUY" => (isset($arParams["~MESS_BTN_BUY"])?$arParams["~MESS_BTN_BUY"]:""),
					"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["~MESS_BTN_ADD_TO_BASKET"])?$arParams["~MESS_BTN_ADD_TO_BASKET"]:""),
					"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
					"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
					"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
					"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
					"USE_ENHANCED_ECOMMERCE" => (isset($arParams["USE_ENHANCED_ECOMMERCE"])?$arParams["USE_ENHANCED_ECOMMERCE"]:""),
					"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
					"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
					"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => $basketAction,
					"SHOW_CLOSE_POPUP" => isset($arParams["COMMON_SHOW_CLOSE_POPUP"])?$arParams["COMMON_SHOW_CLOSE_POPUP"]:"",
					"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
					"COMPARE_NAME" => $arParams["COMPARE_NAME"],
					"USE_COMPARE_LIST" => "Y",
					"BACKGROUND_IMAGE" => "-",
					"COMPATIBLE_MODE" => "N",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SHOW_ALL_WO_SECTION" => "N",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
					"SEF_MODE" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"SET_BROWSER_TITLE" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_META_DESCRIPTION" => "Y"
				),
				$component
			);?>
	</div>
</div>

<?$APPLICATION->IncludeComponent(
		"bitrix:main.feedback",
		"feedback",
		Array(
			"EMAIL_TO" => "sale@webstore.com",
			"EVENT_MESSAGE_ID" => array(),
			"OK_TEXT" => "Спасибо, ваше сообщение принято.",
			"REQUIRED_FIELDS" => array(),
			"USE_CAPTCHA" => "Y"
		)
	);?>

<!-- TODO: -->

<div class="useful">
	<div class="container container-xs">
		<div class="title_under useful_title">Полезные статьи</div>
		<div class="useful_list">
			<div class="useful_coll">
				<div class="useful_item useful_item_big">
					<a href="#" class="useful_item_img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/useful_item_1.jpg" alt=""></a>
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
					<a href="#" class="useful_item_img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/useful_item_2.jpg" alt=""></a>
					<div class="useful_item_content">
						<div class="useful_item_date"><i class="svg-calendar"></i>10.08.2016</div>
						<a href="" class="useful_item_title">Как выбрать матрас?</a>
						<p><a href="#">Благодаря уникальному сочетанию этих преи-муществ предметы коллекции Ocean не оказывают обратного давления на тело спящего человека.</a></p>
						<a href="#" class="btn">Подробнее</a>
					</div>
				</div>
				<div class="useful_item">
					<a href="#" class="useful_item_img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/useful_item_2.jpg" alt=""></a>
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



<?$APPLICATION->IncludeComponent(
	"bitrix:sender.subscribe",
	"subscribe",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "subscribe",
		"CONFIRMATION" => "N",
		"HIDE_MAILINGS" => "N",
		"SET_TITLE" => "Y",
		"SHOW_HIDDEN" => "N",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "1",
		"USER_CONSENT_IS_CHECKED" => "N",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_PERSONALIZATION" => "N"
	)
);?>


<div class="about_w">
	<div class="container container-xs">
		<div class="about">
			<div class="about_title title_under">О компании</div>
			<a href="#" class="about_img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/about.jpg" alt=""></a>
			<div class="about_content">

				<? $APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/main_info.php"
					)
				);?>
				
				<a href="contact.php" class="btn_more">Подробнее</a>
			</div>
		</div>
	</div>
</div>


<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.comments",
	"last_comments",
	Array(
		"BLOG_TITLE" => "Комментарии",
		"BLOG_URL" => "catalog_comments",
		"BLOG_USE" => "Y",
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"COMMENTS_COUNT" => "5",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => "1100",
		"EMAIL_NOTIFY" => "N",
		"FB_USE" => "N",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "catalog",
		"PATH_TO_SMILE" => "/bitrix/images/blog/smile/",
		"RATING_TYPE" => "standart",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_RATING" => "Y",
		"SHOW_SPAM" => "Y",
		"TEMPLATE_THEME" => "blue",
		"URL_TO_COMMENT" => "",
		"VK_USE" => "N",
		"WIDTH" => ""
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>