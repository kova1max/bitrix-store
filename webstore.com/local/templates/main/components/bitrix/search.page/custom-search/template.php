<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

	global $arrFilter;

	$sections = array();

	// Выборка по элементам
	foreach($arResult['SEARCH'] as $num => $arElement) {

		// Поиск нужной ссылки типа "/catalog/section/id/"
		preg_match("~/[a-z]+/[0-9]+/[0-9]+/~", $arElement['URL_WO_PARAMS'], $isNeeded);

		// Если ссылка не та то:
		if(!$isNeeded[0]){

			// Удалить елемент
			unset($arResult['SEARCH'][$num]);

		// Иначе
		} else {

			// Получение SECTION.ID и SECTION
			preg_match("~[0-9]+~", $arElement['URL_WO_PARAMS'], $section_id);
			$section = CIBlockSection::GetByID($section_id[0])->fetch();

			// Формирование массива SECTIONS
			$sections[$section_id[0]][] = array(
				'NAME' => $section['NAME'],
				'URL' => '/catalog/' . $section['ID'] . '/',
				'ID' => $section['ID']
			);

			$arrFilter['ID'][] = $arElement['ITEM_ID'];
		}

	}

	// Обьеденить массив и записать кол-во елементов
	foreach($sections as $section_id => $section) {
		$count = count($sections[$section_id]);
		$sections[$section_id] = array_unique($sections[$section_id]);
		$sections[$section_id] = array(
			'NAME' => $sections[$section_id][0]['NAME'],
			'COUNT' => $count,
			'URL' => $sections[$section_id][0]['URL'],
			'ID' => $sections[$section_id][0]['ID']
		);
	}

	// ПОЛУЧЕНИЕ $sectionID -> [SECTION_ID]

	$sectionID = undefined;
	foreach($sections as $sec){
		$firstID = $sec['ID'];
		break;
	}

	switch(count($sections)){
		case 0: 
			$sectionID = 0;
			break;
		case 1: 
			$sectionID = $firstID;
			break;
		default:
			if($_REQUEST['section']){
				$sectionID = $_REQUEST['section'];
			} else {
				$sectionID = $firstID;
			}
			break;
	}

	// СОРТУВАННЯ

	if($_GET['sort'] && $_GET['sort'] != " ") {
		$sortField = $_GET['sort'];
		if($_GET['method'] && $_GET['method'] != " ") {
			$sortOrder = $_GET['method'];
		} else {
			$sortOrder = "desc";
		}
	} else {
		$sortField = "name";
		$sortOrder = "desc";
	}

?>

<div class="container">
	<div class="catalog">
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.smart.filter",
		".custom_srchfilter",
		Array(
			"ELEMENT_SORT_FIELD" => $sortField,
			"ELEMENT_SORT_ORDER" => $sortOrder,
			"SECTIONS_RESULT" => $sections,
			"ALL_COUNT" => count($arResult['SEARCH']),
			"CACHE_GROUPS" => "N",
			"CACHE_TIME" => "36000",
			"CACHE_TYPE" => "A",
			"CONVERT_CURRENCY" => "N",
			"CURRENCY_ID" => $arParams['CURRENCY_ID'],
			"DISPLAY_ELEMENT_COUNT" => "Y",
			"FILTER_NAME" => "arrFilter",
			"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
			"HIDE_NOT_AVAILABLE" => "N",
			"IBLOCK_ID" => "14",
			"IBLOCK_TYPE" => "catalog",
			"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
			"PAGER_PARAMS_NAME" => "",
			"PREFILTER_NAME" => "smartPreFilter",
			"PRICE_CODE" => array("BASE"),
			"SAVE_IN_SESSION" => "N",
			"SEARCH_RESULT" => array('QUERY'=>$arResult['REQUEST']['QUERY']),
			"SECTION_CODE" => "",
			"SECTION_CODE_PATH" => $_REQUEST["SECTION_CODE_PATH"],
			"SECTION_DESCRIPTION" => "DESCRIPTION",
			"SECTION_ID" => $sectionID,
			"SECTION_TITLE" => "NAME",
			"SEF_MODE" => "N",
			"SEF_RULE" => "",
			"SMART_FILTER_PATH" => "",
			"TEMPLATE_THEME" => "",
			"XML_EXPORT" => "N"
		),
	$component,
	Array(
		'HIDE_ICONS' => 'Y'
	)
	);
	?>

	<div class="catalog_content">
		<?
		$sectionID = $_REQUEST['section'];
		?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section",
			"search_section",
			Array(
				"ELEMENT_SORT_FIELD" => $sortField,
				"ELEMENT_SORT_ORDER" => $sortOrder,
				"SECTION_ID" => "#SECTION_ID#",
				"SECT_ID" => $sectionID,
				"ACTION_VARIABLE" => $action,
				"QUERY_NAME" => $arResult['REQUEST']['QUERY'],
				"SEARCH_COUNT" => count($arResult['SEARCH']),
				"ADD_PICT_PROP" => "-",
				"ADD_PROPERTIES_TO_BASKET" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"ADD_TO_BASKET_ACTION" => "ADD",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"BACKGROUND_IMAGE" => "-",
				"BASKET_URL" => "/personal/cart/",
				"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "36000",
				"CACHE_TYPE" => "A",
				"COMPARE_NAME" => $arParams["COMPARE_NAME"],
				"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
				"COMPATIBLE_MODE" => "N",
				"CONVERT_CURRENCY" => "Y",
				"CURRENCY_ID" => "UAH",
				"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
				"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
				"DETAIL_URL" => "/catalog/#SECTION_ID#/#ELEMENT_ID#/",
				"DISABLE_INIT_JS_IN_COMPONENT" => "N",
				"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"DISPLAY_COMPARE" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"DIV_TYPE" => "product_list",
				"ENLARGE_PRODUCT" => "STRICT",
				"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
				"FILE_404" => $arParams["FILE_404"],
				"FILTER_NAME" => "arrFilter",
				"HIDE_NOT_AVAILABLE" => "N",
				"HIDE_NOT_AVAILABLE_OFFERS" => "N",
				"IBLOCK_ID" => "14",
				"IBLOCK_TYPE" => "catalog",
				"INCLUDE_SUBSECTIONS" => "Y",
				"ITEMS" => $arResult['SEARCH'],
				"LABEL_PROP" => array(),
				"LABEL_PROP_MOBILE" => array(),
				"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
				"LAZY_LOAD" => "N",
				"LINE_ELEMENT_COUNT" => "2",
				"LOAD_ON_SCROLL" => "N",
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
				"OFFERS_FIELD_CODE" => array("ID", "CODE", "XML_ID", "NAME", "TAGS", "SORT", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT", "DETAIL_PICTURE", "DATE_ACTIVE_FROM", "ACTIVE_FROM", "DATE_ACTIVE_TO", "ACTIVE_TO", "SHOW_COUNTER", "SHOW_COUNTER_START", "IBLOCK_TYPE_ID", "IBLOCK_ID", "IBLOCK_CODE", "IBLOCK_NAME", "IBLOCK_EXTERNAL_ID", "DATE_CREATE", "CREATED_BY", "CREATED_USER_NAME", "TIMESTAMP_X", "MODIFIED_BY", "USER_NAME", ""),
				"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"])?$arParams["LIST_OFFERS_LIMIT"]:0),
				"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
				"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
				"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
				"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "pag_new",
				"PAGER_TITLE" => $arParams["PAGER_TITLE"],
				"PAGE_ELEMENT_COUNT" => "100",
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
				"PRICE_CODE" => array("BASE"),
				"PRICE_VAT_INCLUDE" => "N",
				"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
				"PRODUCT_DISPLAY_MODE" => "N",
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"PRODUCT_ROW_VARIANTS" => "[]",
				"PRODUCT_SUBSCRIPTION" => "N",
				"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"])?$arParams["LIST_PROPERTY_CODE"]:[]),
				"PROPERTY_CODE_MOBILE" => array("OTHER_PICTURES", "CERTIFICATES", "DELIVERY", "GUARANTEE", "FAVORITES", "STATUS"),
				"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
				"RCM_TYPE" => "personal",
				"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
				"SECTION_CODE" => "",
				"SECTION_CODE_PATH" => "",
				"SECTION_ID" => "",
				"SECTION_ID_VARIABLE" => "",
				"SECTION_URL" => "/catalog/#SECTION_ID#/",
				"SECTION_USER_FIELDS" => array("UF_ICON", ""),
				"SEF_MODE" => "N",
				"SEF_RULE" => "",
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SHOW_ALL_WO_SECTION" => "Y",
				"SHOW_CLOSE_POPUP" => "N",
				"SHOW_DISCOUNT_PERCENT" => "N",
				"SHOW_FROM_SECTION" => "N",
				"SHOW_MAX_QUANTITY" => "N",
				"SHOW_OLD_PRICE" => "N",
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
				"SHOW_SLIDER" => "N",
				"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
				"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
				"USE_COMPARE_LIST" => "Y",
				"USE_ENHANCED_ECOMMERCE" => "N",
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

<script src="<?=SITE_TEMPLATE_PATH?>/components/bitrix/search.page/custom-search/js/custom.js">
</script>