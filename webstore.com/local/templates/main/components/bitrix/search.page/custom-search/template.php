<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
	// if(!$arResult['REQUEST']['QUERY']) LocalRedirect('/');
?>

<div class="container">

	<div class="catalog">

		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.smart.filter",
			".custom_srchfilter",
			Array(
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CONVERT_CURRENCY" => "N",
				"CURRENCY_ID" => $arParams['CURRENCY_ID'],
				"DISPLAY_ELEMENT_COUNT" => "N",
				"FILTER_NAME" => "",
				"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
				"HIDE_NOT_AVAILABLE" => "N",
				"IBLOCK_ID" => "14",
				"IBLOCK_TYPE" => "catalog",
				"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
				"PAGER_PARAMS_NAME" => "",
				"PREFILTER_NAME" => "smartPreFilter",
				"PRICE_CODE" => array("BASE"),
				"SAVE_IN_SESSION" => "N",
				"SECTION_CODE" => "",
				"SECTION_CODE_PATH" => "",
				"SECTION_DESCRIPTION" => "DESCRIPTION",
				"SECTION_ID" => "36",
				"SECTION_TITLE" => "NAME",
				"SEF_MODE" => "Y",
				"SEF_RULE" => "",
				"SMART_FILTER_PATH" => "",
				"TEMPLATE_THEME" => "",
				"XML_EXPORT" => "N"
			),
			$component,
			Array(
				'HIDE_ICONS' => 'Y'
			)
		);?>
	<div class="catalog_content">
		<div class="catalog_head">
			<?if(count($arResult['SEARCH'])){?>
				<div class="catalog_search">По запросу «<?=$arResult['REQUEST']['QUERY']?>» найдено <span><?=count($arResult['SEARCH'])?> товар(ов)</span></div>
			<?} else {?>
				<div class="catalog_search">По запросу «<?=$arResult['REQUEST']['QUERY']?>» ничего не найдено</div>
			<?}?>
			<div class="catalog_sort">
				Сортировать:
				<select class="select">
					<option value="">По рейтингу</option>
					<option value="">lorem</option>
				</select>
			</div>
		</div>
			
		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section",
			"sect_new",
			Array(
				"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
				"ADD_PICT_PROP" => $arParams["ADD_PICT_PROP"],
				"ADD_PROPERTIES_TO_BASKET" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"ADD_TO_BASKET_ACTION" => $basketAction,
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"BACKGROUND_IMAGE" => "-",
				"BASKET_URL" => $arParams["BASKET_URL"],
				"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_TYPE" => "A",
				"COMPARE_NAME" => $arParams["COMPARE_NAME"],
				"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
				"COMPATIBLE_MODE" => "N",
				"COMPONENT_TEMPLATE" => "sect_new",
				"CONVERT_CURRENCY" => "Y",
				"CURRENCY_ID" => "RUB",
				"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
				"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
				"DETAIL_URL" => "/catalog/#ID#",
				"DISABLE_INIT_JS_IN_COMPONENT" => "N",
				"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_COMPARE" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"DIV_TYPE" => "product_list",
				"ELEMENT_SORT_FIELD" => "name",
				"ELEMENT_SORT_FIELD2" => "timestamp_x",
				"ELEMENT_SORT_ORDER" => "desc",
				"ELEMENT_SORT_ORDER2" => "desc",
				"ENLARGE_PRODUCT" => $arParams["LIST_ENLARGE_PRODUCT"],
				"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
				"FILE_404" => $arParams["FILE_404"],
				"FILTER_NAME" => "arrFilter",
				"HIDE_NOT_AVAILABLE" => "Y",
				"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
				"IBLOCK_ID" => "14",
				"IBLOCK_TYPE" => "catalog",
				"INCLUDE_SUBSECTIONS" => "Y",
				"LABEL_PROP" => $arParams["LABEL_PROP"],
				"LABEL_PROP_MOBILE" => $arParams["LABEL_PROP_MOBILE"],
				"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
				"LAZY_LOAD" => $arParams["LAZY_LOAD"],
				"LINE_ELEMENT_COUNT" => "2",
				"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],
				"MESSAGE_404" => $arParams["~MESSAGE_404"],
				"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["~MESS_BTN_ADD_TO_BASKET"])?$arParams["~MESS_BTN_ADD_TO_BASKET"]:""),
				"MESS_BTN_BUY" => (isset($arParams["~MESS_BTN_BUY"])?$arParams["~MESS_BTN_BUY"]:""),
				"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
				"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
				"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
				"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
				"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
				"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
				"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
				"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
				"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
				"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
				"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
				"OFFERS_FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>$arParams["LIST_OFFERS_FIELD_CODE"],28=>"",),
				"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"])?$arParams["LIST_OFFERS_LIMIT"]:0),
				"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
				"OFFERS_SORT_FIELD" => "shows",
				"OFFERS_SORT_FIELD2" => "timestamp_x",
				"OFFERS_SORT_ORDER" => "desc",
				"OFFERS_SORT_ORDER2" => "asc",
				"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
				"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
				"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
				"PAGER_TITLE" => $arParams["PAGER_TITLE"],
				"PAGE_ELEMENT_COUNT" => "0",
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
				"PRICE_CODE" => array(0=>"BASE",),
				"PRICE_VAT_INCLUDE" => "N",
				"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
				"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"PRODUCT_ROW_VARIANTS" => $arParams["LIST_PRODUCT_ROW_VARIANTS"],
				"PRODUCT_SUBSCRIPTION" => $arParams["PRODUCT_SUBSCRIPTION"],
				"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"])?$arParams["LIST_PROPERTY_CODE"]:[]),
				"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
				"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
				"SECTION_URL" => "/catalog/",
				"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
				"SEF_MODE" => "N",
				"SET_BROWSER_TITLE" => "Y",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "Y",
				"SET_META_KEYWORDS" => "Y",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SHOW_ALL_WO_SECTION" => "N",
				"SHOW_CLOSE_POPUP" => isset($arParams["COMMON_SHOW_CLOSE_POPUP"])?$arParams["COMMON_SHOW_CLOSE_POPUP"]:"",
				"SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
				"SHOW_MAX_QUANTITY" => $arParams["SHOW_MAX_QUANTITY"],
				"SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
				"SHOW_SLIDER" => $arParams["LIST_SHOW_SLIDER"],
				"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
				"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
				"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
				"USE_COMPARE_LIST" => "Y",
				"USE_ENHANCED_ECOMMERCE" => (isset($arParams["USE_ENHANCED_ECOMMERCE"])?$arParams["USE_ENHANCED_ECOMMERCE"]:""),
				"USE_MAIN_ELEMENT_SECTION" => "N",
				"USE_PRICE_COUNT" => "N",
				"USE_PRODUCT_QUANTITY" => "N"
			),
		$component
		);?>

		</div>
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>