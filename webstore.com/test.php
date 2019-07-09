<?php 
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("TEST PAGE");
?>
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
<?php 
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>