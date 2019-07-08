<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Компания");
$APPLICATION->SetTitle("Компания");
?>

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