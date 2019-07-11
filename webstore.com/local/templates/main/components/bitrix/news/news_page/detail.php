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

<?$ElementID = $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"custom_detail",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"FIELD_CODE" => array("", "={$arParams["DETAIL_FIELD_CODE"]}", ""),
		"FILE_404" => $arParams["FILE_404"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "pag_new",
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PROPERTY_CODE" => array("COMMENTS_COUNT", "VIEWS_COUNT", "={$arParams["DETAIL_PROPERTY_CODE"]}", ""),
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"SET_BROWSER_TITLE" => "N",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
		"SHARE_HIDE" => $arParams["SHARE_HIDE"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
		"SHOW_404" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N"
	),
$component
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.comments",
	"common_comments",
	Array(
		"BLOG_TITLE" => "Комментарии",
		"BLOG_URL" => "catalog_comments",
		"BLOG_USE" => "Y",
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"COMMENTS_COUNT" => "3",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => $ElementID,
		"EMAIL_NOTIFY" => "N",
		"FB_USE" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
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
