<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die()?>

<? if($arResult["CONFIRM_ORDER"] != 'Y') {?>

	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.element",
		"popup-element",
		Array(
			"CURRENCY_ID" => "RUB",
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ELEMENT_ID" => $arParams["ELEMENT_ID"],
			"ELEMENT_CODE" => "",
			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"SECTION_URL" => "",
			"DETAIL_URL" => "",
			"BASKET_URL" => "",
			"ACTION_VARIABLE" => "",
			"PRODUCT_ID_VARIABLE" => "",
			"PRODUCT_QUANTITY_VARIABLE" => "",
			"PRODUCT_PROPS_VARIABLE" => "",
			"SECTION_ID_VARIABLE" => "",
			"META_KEYWORDS" => "-",
			"META_DESCRIPTION" => "-",
			"BROWSER_TITLE" => "-",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"PROPERTY_CODE" => array('COLOR_REF', 'CML2_LINK.DETAIL_PICTURE'),
			"OFFERS_LIMIT" => "0",
			"PRICE_CODE" => array("BASE"),
			"USE_PRICE_COUNT" => "N",
			"SHOW_PRICE_COUNT" => "",
			"PRICE_VAT_INCLUDE" => "Y",
			"PRICE_VAT_SHOW_VALUE" => "N",
			"PRODUCT_PROPERTIES" => array('COLOR_REF'),
			"USE_PRODUCT_QUANTITY" => "N",
			"LINK_IBLOCK_TYPE" => "",
			"LINK_IBLOCK_ID" => "",
			"LINK_PROPERTY_SID" => "",
			"LINK_ELEMENTS_URL" => "",
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "36000000",
			"CACHE_NOTES" => "",
			"CACHE_GROUPS" => "Y",
			"USE_ELEMENT_COUNTER" => "N",
			"CONVERT_CURRENCY" => "Y"
		)
	);?>

	<form method="post" action="<?= $component->arParams['PAGE_URI']; ?>">
		<input type="hidden" name="buyMode" value="<?= $arParams['BUY_MODE'] ?>" />
		<input type="hidden" name="submit_form" id="submit_form" value="1" />
		<input type="hidden" name="new_sale_order" id="new_sale_order" value="1" />
		<input type="hidden" name="paysystemId" value="<?= $arParams['DEFAULT_PAYMENT'] ?>" />
		<input type="hidden" name="deliveryId" value="<?= $arParams['DEFAULT_DELIVERY'] ?>" />
		<input type="hidden" name="personTypeId" value="<?= $arParams['DEFAULT_PERSON_TYPE'] ?>" />
		<input type="hidden" name="priceId" value="<?= $arParams['PRICE_ID'] ?>" />
		<input type="hidden" name="currencyCode" value="<?= $arParams['DEFAULT_CURRENCY'] ?>" />
		<input type="hidden" name="id" value="<?= $arParams["ELEMENT_ID"]; ?>" />
		<?
			// foreach($arParams['ORDER_FIELDS'] as $curItem) {
			// 	if($_REQUEST['new_order'][$curItem]=='') {
			// 		$value='';
			// 		if ($USER->IsAuthorized()) {
			// 			switch($curItem) {
			// 				case 'EMAIL':
			// 					$value = $USER->GetEmail();
			// 				break;
			// 				case 'FIO':
			// 					$value = $USER->GetFullName();
			// 				break;
			// 				case 'PHONE':
			// 					$value = $arResult['USER_PHONE'];
			// 				break;
			// 			}
			// 		}
			// 	}
			// 	else {
			// 		$value = htmlspecialcharsbx($_REQUEST['new_order'][$curItem]);
			// 	}
		?>

		<div class="basket_info">
			<label>Имя<input name="new_order[FIO]" value="" type="text"></label>
			<label>Телефон<input name="new_order[PHONE]" value="" type="text"></label>
			<label>Ваш e-mail<input name="new_order[EMAIL]" value="" type="email"></label>
			<div class="basket_info_bottom">
					<input type="submit" name="send" value="Купиить" class="btn" />
					<p>Наш оператор свяжется с Вами в течение часа</p>
			</div>
		</div>

		<!-- FIXME: CHEAPER SHOULD BE HERE -->

	</form>
	<script type="text/javascript">
		setTimeout('OnLoad()', 10);
	</script>
<? } ?>