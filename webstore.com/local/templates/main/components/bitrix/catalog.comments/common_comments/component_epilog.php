<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @global CMain $APPLICATION */
/** @global CDatabase $DB */
/** @var array $arResult */
/** @var array $arParams */
/** @var CBitrixComponent $this */

$ajaxMode = 1;

if (!$ajaxMode)
{
	CJSCore::Init(array('window', 'ajax'));
}

if ($ajaxMode)
{
	if($arParams['ID'])
		$arResult['BLOG_DATA']['BLOG_POST_ID']=$arParams['ID'];

	if($arParams['BLOG_URL'])
		$arResult['BLOG_DATA']['BLOG_URL']=$arParams['BLOG_URL'];

	//$APPLICATION->ShowAjaxHead();

	$arBlogCommentParams = array(
		'SEO_USER' => 'N',
		'ID' => $arResult['BLOG_DATA']['BLOG_POST_ID'],
		'BLOG_URL' => $arResult['BLOG_DATA']['BLOG_URL'],
		'PATH_TO_SMILE' => $arParams['PATH_TO_SMILE'],
		'COMMENTS_COUNT' => $arParams['COMMENTS_COUNT'],
		"DATE_TIME_FORMAT" => $DB->DateFormatToPhp(FORMAT_DATETIME),
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"AJAX_POST" => $arParams["AJAX_POST"],
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"SIMPLE_COMMENT" => "Y",
		"SHOW_SPAM" => $arParams["SHOW_SPAM"],
		"NOT_USE_COMMENT_TITLE" => "Y",
		"SHOW_RATING" => $arParams["SHOW_RATING"],
		"RATING_TYPE" => $arParams["RATING_TYPE"],
		"PATH_TO_POST" => $arResult["URL_TO_COMMENT"],
		"IBLOCK_ID" => $arResult['ELEMENT']['IBLOCK_ID'],
		"ELEMENT_ID" => $arResult['ELEMENT']['ID'],
		"COMMENT_PROPERTY" => array('UF_ADVANTAGES', 'UF_DISADVANTAGES', "UF_BLOG_COMMENT_DOC", "UF_RATING", "UF_COMMENTS_LINK"),
		"NO_URL_IN_COMMENTS" => "L",
	);

	if(isset($arParams["USER_CONSENT"]))
		$arBlogCommentParams["USER_CONSENT"] = $arParams["USER_CONSENT"];
	if(isset($arParams["USER_CONSENT_ID"]))
		$arBlogCommentParams["USER_CONSENT_ID"] = $arParams["USER_CONSENT_ID"];
	if(isset($arParams["USER_CONSENT_IS_CHECKED"]))
		$arBlogCommentParams["USER_CONSENT_IS_CHECKED"] = $arParams["USER_CONSENT_IS_CHECKED"];
	if(isset($arParams["USER_CONSENT_IS_LOADED"]))
		$arBlogCommentParams["USER_CONSENT_IS_LOADED"] = $arParams["USER_CONSENT_IS_LOADED"];

		
	session_start();
	$_REQUEST['IBLOCK_ID']=$arBlogCommentParams['IBLOCK_ID'];
	$_REQUEST['ELEMENT_ID']=$arBlogCommentParams['ELEMENT_ID'];
	$_SESSION[ 'IBLOCK_CATALOG_COMMENTS_PARAMS_'.$arBlogCommentParams['IBLOCK_ID'].'_'.$arBlogCommentParams['ELEMENT_ID'] ] = $arBlogCommentParams;


	$APPLICATION->IncludeComponent(
		'bitrix:blog.post.comment',
		'adapt',
		$arBlogCommentParams,
		$this,
		array('HIDE_ICONS' => 'Y')
	);
	return;
}
