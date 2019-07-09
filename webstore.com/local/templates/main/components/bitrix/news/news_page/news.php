<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:search.tags.cloud",
	"",
	Array(
		"CHECK_DATES" => "Y",
		"arrWHERE" => Array("iblock_".$arParams["IBLOCK_TYPE"]),
		"arrFILTER" => Array("iblock_".$arParams["IBLOCK_TYPE"]),
		"arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => Array($arParams["IBLOCK_ID"]),
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"URL_SEARCH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"],

		"PAGE_ELEMENTS" => $arParams["TAGS_CLOUD_ELEMENTS"],
		"PERIOD_NEW_TAGS" => $arParams["PERIOD_NEW_TAGS"],
		"FONT_MAX" => $arParams["FONT_MAX"],
		"FONT_MIN" => $arParams["FONT_MIN"],
		"COLOR_NEW" => $arParams["COLOR_NEW"],
		"COLOR_OLD" => $arParams["COLOR_OLD"],
		"WIDTH" => $arParams["TAGS_CLOUD_WIDTH"],
	),
	$component
);?>

<div class="container">
	<h1>Новости, статьи и обзоры</h1>
	<div class="catalog novosti">

	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.filter",
		"custom_newsfltr",
		Array(
			"CACHE_GROUPS" => "N",
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_TYPE" => "A",
			"FIELD_CODE" => array("ID","CODE","XML_ID","NAME","TAGS","SORT","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","DATE_ACTIVE_FROM","ACTIVE_FROM","DATE_ACTIVE_TO","ACTIVE_TO","SHOW_COUNTER","SHOW_COUNTER_START","IBLOCK_TYPE_ID","IBLOCK_ID","IBLOCK_CODE","IBLOCK_NAME","IBLOCK_EXTERNAL_ID","DATE_CREATE","CREATED_BY","CREATED_USER_NAME","TIMESTAMP_X","MODIFIED_BY","USER_NAME","SECTION_ID","={$arParams["FILTER_FIELD_CODE"]}",""),
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"IBLOCK_ID" => "1",
			"IBLOCK_TYPE" => "news",
			"LIST_HEIGHT" => "5",
			"NUMBER_WIDTH" => "5",
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
			"PREFILTER_NAME" => "preFilter",
			"PRICE_CODE" => array("BASE"),
			"PROPERTY_CODE" => array("COMMENTS_COUNT","VIEWS_COUNT","={$arParams["FILTER_PROPERTY_CODE"]}",""),
			"SAVE_IN_SESSION" => "N",
			"TEXT_WIDTH" => "20"
		),
	$component
	);?>

		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"custom_newslist",
			Array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"NEWS_COUNT" => $arParams["NEWS_COUNT"],
				"SORT_BY1" => $arParams["SORT_BY1"],
				"SORT_ORDER1" => $arParams["SORT_ORDER1"],
				"SORT_BY2" => $arParams["SORT_BY2"],
				"SORT_ORDER2" => $arParams["SORT_ORDER2"],
				"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
				"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
				"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"MESSAGE_404" => $arParams["MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["PAGER_TITLE"],
				"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
				"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
				"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
				"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
				"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
				"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
				"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
				"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
				"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
				"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
				"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
				"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
				"USE_RATING" => $arParams["USE_RATING"],
				"MAX_VOTE" => $arParams["MAX_VOTE"],
				"VOTE_NAMES" => $arParams["VOTE_NAMES"],
				"CHECK_DATES" => $arParams["CHECK_DATES"],
			),
			$component
		);?>
	</div>
</div>