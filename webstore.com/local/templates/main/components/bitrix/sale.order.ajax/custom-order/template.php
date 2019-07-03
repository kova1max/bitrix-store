<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc;

$context = Main\Application::getInstance()->getContext();
$request = $context->getRequest();
$server = $context->getServer();

if(is_array($arResult['JS_DATA']['COUPON_LIST'])) {
	$arResult['COUPON_ACTIVE']=end($arResult['JS_DATA']['COUPON_LIST']);
	$arResult['COUPON_ACTIVE']=$arResult['COUPON_ACTIVE']['COUPON'];
}

if (strlen($request->get('ORDER_ID')) > 0)
{
	include($server->getDocumentRoot().$templateFolder.'/confirm.php');
	return true;
}
else {
	$this->SetViewTarget("order_title");
	?>
<div class="basket_title">
	<?= GetMessage('ORDER_TITLE'); ?>
</div>
<?
	$this->EndViewTarget();
}

?>

<form action="<?= $APPLICATION->GetCurPage(); ?>" method="POST" name="ORDER_FORM" id="ORDER_FORM" onsubmit="submitForm(this); return false;">


	<?= bitrix_sessid_post() ?>
	<?
	if (strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0)
		echo $arResult["PREPAY_ADIT_FIELDS"];
	?>

	<input type="hidden" id="ajax_request" name="ajax_request" value="N">
	<input type="hidden" id="save" name="save" value="N">
	<input type="hidden" id="action2" name="action2" value="order">
	<input type="hidden" class="actiont_holder" name="action" value="saveOrderAjax">
	<input type="hidden" name="location_type" value="code">
	<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?= $arResult["BUYER_STORE"] ?>">
	<input type="hidden" name="coupon" id="coupon" value="<?= $arResult['COUPON_ACTIVE']; ?>">

	<?
		foreach( $arResult['ORDER_PROP']['USER_PROFILES'] as $arr){
	?>
		<input type="hidden" name="PERSON_TYPE" id="PERSON_TYPE" value="<?=$arr['PERSON_TYPE_ID']?>">
	<?
		break;
	}
	?>
	
	

	<? if($_REQUEST['ajax_request']=='y') $APPLICATION->RestartBuffer(); ?>

	<div class="container" <?if($_REQUEST['ajax_request'] == 0) echo 'style="margin-top: 20px"'?>>

		<div class="order">
			<div class="order_row order_formed">
				<div class="order_formed_head">
					Ваш заказ:
					<a href="#" class="order_edit">Редактировать заказ</a>
				</div>
				<table class="order_formed_list">

					<!-- ORDER ITEMS -->

					<?foreach($arResult['JS_DATA']['GRID']['ROWS'] as $arItem){?>

						<tr>
							<td class="order_img"><a href="#"><img src="<?= $arItem['data']['PREVIEW_PICTURE_SRC'] ?>" alt=""></a></td>
							<td class="order_name"><a href="#"><?= $arItem['data']['NAME'] ?> </a></td>
							<td class="order_count"><?= $arItem['data']['QUANTITY'] ?> шт.</td>
							<td class="order_price"><?= $arItem['data']['SUM_BASE_FORMATED'] ?></td>
						</tr>

					<?}?>

				</table>

				<div class="order_total">
					<div class="order_total_title">Итого:</div>
					<div class="order_total_item"><?= count($arResult['JS_DATA']['GRID']['ROWS']) ?> товар(ов) на суму: <strong><?= CurrencyFormat($arResult['BASE_BASKET_INFO']['SUM'], 'RUB') ?></strong></div>
					<div class="order_total_item">Стоимость доставки: 
						<strong><?= 100 ?> руб.</strong>
					</div>
				</div>

				<div class="order_score">
					К оплате: <span><?= CurrencyFormat($arResult['BASE_BASKET_INFO']['SUM'], 'RUB') ?></span>
					<button class="btn basket_button">Оформить заказ</button>
				</div>
			</div>

			<div class="order_row">

				<div class="order_item">
					<div class="order_title">1. Контактная информация</div>

					<?foreach($arResult['ORDER_PROP']['USER_PROPS_Y'] as $arProp){?>
					<?if($arProp['GROUP_NAME'] == "Личные данные"){?>
					<label><?= $arProp['NAME'] ?><input name="<?= $arProp['FIELD_NAME'] ?>" value="<?= $arProp['VALUE'] ?>" type="text"></label>
					<?}?>
					<?}?>

				</div>

				<div class="order_item">
					<div class="order_title">2. Доставка</div>

					<?foreach($arResult['ORDER_PROP']['USER_PROPS_Y'] as $arProp){?>

						<?if($arProp['GROUP_NAME'] == "Данные для доставки"){?>
							<?if($arProp['TYPE'] != "LOCATION"){?>
								<label class="ib">
									<?= $arProp['NAME'] ?>
									<input name="<?= $arProp['FIELD_NAME'] ?>" type="text" class="input_sm">
								</label>
							<?} else{?>
								<select class="select" name="<?= $arProp['FIELD_NAME'] ?>">
									<?foreach($arProp['VARIANTS'] as $variant){?>
										<?if($variant['CITY_NAME']){?>
											<option value="<?= $variant['ID'] ?>"><?= $variant['COUNTRY_NAME'] . " - " . $variant["CITY_NAME"] ?></option>
									<?}}?>
								</select>
					<?}}}?>

				</div>

				<div class="order_item">
					<div class="order_title">3. Способ оплаты</div>

					<?foreach($arResult['PAY_SYSTEM'] as $arPayment){?>
					<label>
						<input type="radio" value="<?= $arPayment['PAY_SYSTEM_ID'] ?>" name="PAY_SYSTEM_ID" class="checkbox">
						<?= $arPayment['NAME'] ?>
					</label>
					<?}?>

				</div>

			</div>
		</div>

	</div>

	<? if($_REQUEST['ajax_request']=='y') die; ?>

</form>