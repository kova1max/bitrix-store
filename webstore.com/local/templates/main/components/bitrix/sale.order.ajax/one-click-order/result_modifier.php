<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var SaleOrderAjax $component
 */

if (!function_exists("PrintPropsForm"))
{
	function PrintPropsForm($arSource = array(), $locationTemplate = ".default")
	{
		if (!empty($arSource)) {
			foreach ($arSource as $arProperties) {				
				switch($arProperties['TYPE']) {
					case 'LOCATION':
					?>
						<input type="hidden" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$arProperties["DEFAULT_VALUE"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" />
						<p class="form_errors"></p>
						<?
					break;
					default:
						?>
						<label><?=$arProperties["NAME"]?>
							<input type="text" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$arProperties["VALUE"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" />
							<div class="form_errors" data-name="<?=$arProperties["NAME"]?>"></div>
						</label>
						<?
					break;
				}
			}
		}
	} 
}

foreach ($arResult['JS_DATA']['GRID']['ROWS'] as $item) {
	$item = $item['data'];

	$arResult['BASE_BASKET_INFO']['QUANTITY'] += $item['QUANTITY'];
	$arResult['BASE_BASKET_INFO']['SUM'] += $item['SUM_BASE'] * $item['QUANTITY'];
}