<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main,
	Bitrix\Main\Config,
	Bitrix\Main\Localization,
	Bitrix\Main\Localization\Loc,
	Bitrix\Highloadblock as HL,
	Bitrix\Main\Loader,
	Bitrix\Sale;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

global $arResult_order; 
$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order.detail",
	"detail-page",
	array(
		"PATH_TO_LIST" => $arResult["PATH_TO_LIST"],
		"PATH_TO_CANCEL" => $arResult["PATH_TO_CANCEL"],
		"PATH_TO_COPY" => $arResult["PATH_TO_LIST"].'?COPY_ORDER=Y&ID=#ID#',
		"PATH_TO_PAYMENT" => $arParams["PATH_TO_PAYMENT"],
		"SET_TITLE" =>'N',
		"ID" => $arResult['ORDER_ID'],
		"ACTIVE_DATE_FORMAT" => $arParams["ACTIVE_DATE_FORMAT"],
		"ALLOW_INNER" => $arParams["ALLOW_INNER"],
		"ONLY_INNER_FULL" => $arParams["ONLY_INNER_FULL"],
		"CACHE_TYPE" => 'N',
		"CACHE_TIME" => 0,
		"CACHE_GROUPS" => 'N',
		"RESTRICT_CHANGE_PAYSYSTEM" => $arParams["RESTRICT_CHANGE_PAYSYSTEM"],
		"CUSTOM_SELECT_PROPS" => $arParams["CUSTOM_SELECT_PROPS"],
		"HIDE_USER_INFO" => $arParams["DETAIL_HIDE_USER_INFO"]
	),
	$component
); 
 
if(!empty($arResult_order)) {
	$arResult['RESULT_DATA']=$arResult_order;
	unset($arResult_order);
}
if ($arParams["SET_TITLE"] == "Y") {
	$APPLICATION->SetTitle(GetMessage('THANK_FOR_U_ORDER'));
}

return true;

?>