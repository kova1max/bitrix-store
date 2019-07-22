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

<?if($_REQUEST['use_ajax'] == "y") {
	 $APPLICATION->RestartBuffer();?>
	 <div id="modal_3" class="modal" style="display: block;">
<?}?>

	<form action="<?= $APPLICATION->GetCurPage(); ?>" method="POST" name="ORDER_FORM" style="display: block;" onsubmit="submitForm(this); return false;">
	<?if($_REQUEST['use_ajax'] == "y") {?>
	<div class="modal_title">Корзина<a href="" class="fancybox-close"></a></div>
	<?}?>


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
		<input type="hidden" name="PERSON_TYPE" id="PERSON_TYPE" value="<?= $arr['PERSON_TYPE_ID'] ?>">
		<?
			break;
		}
		?>

		<? if($_REQUEST['use_ajax'] !== "y") { ?>

		<div class="container">

			<div class="order">
				<div class="order_row order_formed">
					<div class="order_formed_head">
						Ваш заказ:
						<a href="#" class="order_edit">Редактировать заказ</a>
					</div>
		<?}?>

					<table class="<?echo $_REQUEST['use_ajax'] == "y" ? 'basket_formed_list' : 'order_formed_list' ?>">

						<!-- ORDER ITEMS -->

						<?foreach($arResult['JS_DATA']['GRID']['ROWS'] as $arItem) {?>

						<?if($_REQUEST['use_ajax'] == "y") {?>

						<?

								// GETTING OFFERS OF PRODUCT (PARENT OF CURRENT OFFER)
								$productID = CCatalogSku::GetProductInfo($arItem['data']['PRODUCT_ID'])['ID'];
								$arOffers = CCatalogSKU::getOffersList(
									$productID,
									0,
									array(),
									array('*'),
									array()
								);

						?>

						<tr>
							<td class="basket_dell"><a href="?action=REMOVE_FROM_BASKET&id=<?= $arItem['data']['PRODUCT_ID'] ?>" class=""><i class="svg-cancel-o"></i></a></td>
							<td class="basket_img">
								<a href="#"><img src="<?= $arItem['data']['PREVIEW_PICTURE_SRC'] ?>" alt=""></a>
							</td>
							<td class="basket_name">
								<a href="#"><?= $arItem['data']['NAME'] ?> </a>
								<select class="select">
									<?foreach($arOffers[$productID] as $arOffer) {?>

									<?if($arOffers[$productID]) {?>

									<option><?= $arOffer['NAME'] ?></option>

									<?} else {?>

									<option>No offers added yet</option>

									<?}?>

									<?}?>

								</select>
							</td>
							<td class="basket_count_w">
								<div class="basket_count">
									<div class="basket_count_btn basket_count_minus">−</div>
									<input type="text" class="basket_count_val" readonly value="<?= $arItem['data']['QUANTITY'] ?>">
									<div class="basket_count_btn basket_count_plus">+</div>
								</div>
							</td>
							<td class="basket_price"><?= $arItem['data']['SUM_BASE_FORMATED'] ?></td>
						</tr>

						<?} else {?>

						<tr>
							<td class="order_img"><a href="#"><img src="<?= $arItem['data']['PREVIEW_PICTURE_SRC'] ?>" alt=""></a></td>
							<td class="order_name"><a href="#"><?= $arItem['data']['NAME'] ?> </a></td>
							<td class="order_count"><?= $arItem['data']['QUANTITY'] ?> шт.</td>
							<td class="order_price"><?= $arItem['data']['SUM_BASE_FORMATED'] ?></td>
						</tr>

						<?}?>

						<?}?>

					</table>

					<?if($_REQUEST['use_ajax'] !== "y"){?>

					<div class="order_total">
						<div class="order_total_title">Итого:</div>

						<?
						$elements = 0;
						foreach($arResult['JS_DATA']['GRID']['ROWS'] as $arItem)
							$elements = $elements + $arItem['data']['QUANTITY'];

						?>

						<div class="order_total_item"><?= $elements ?> товар(ов) на суму: <strong><?= CurrencyFormat($arResult['BASE_BASKET_INFO']['SUM'], 'UAH') ?></strong></div>
						<div class="order_total_item">Стоимость доставки:
							<strong class="delivery_price"><?= $arResult['DELIVERY'][2]['PRICE_FORMATED'] ?></strong>
						</div>
					</div>

					<div class="order_score">
						К оплате: <span><?= CurrencyFormat($arResult['BASE_BASKET_INFO']['SUM'] + $arResult['DELIVERY'][2]['PRICE'], 'UAH') ?></span>
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

							<select class="select order_delivery" name="DELIVERY_ID">
								<?foreach($arResult['DELIVERY'] as $arDel) {?>
									<option data-price="<?=$arDel['PRICE_FORMATED']?>" value="<?= $arDel['ID'] ?>"><?= $arDel['NAME']?></option>
								<?}?>
							</select>

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

		<?} else {?>

		<div class="basket_formed">
			<a href="/catalog/" class="btn_more">Продолжить покупки</a>
			<div class="basket_formed_total">
				Итого <span><?= CurrencyFormat($arResult['BASE_BASKET_INFO']['SUM'], 'RUB') ?></span>
				<a href="/personal/order/make" class="btn btn_modal_add">Оформить заказ</a>
			</div>
		</div>

		<!-- CHEAPER -->

		<?
		$temp_id = 0;
		
		foreach($arResult['JS_DATA']['GRID']['ROWS'] as $arItem){

			$temp_id = $arItem['data']['PRODUCT_ID'];
			break;
		}
		

			$elms = CCatalogProductSet::getList( 
				array(), 
				array(	
					'TYPE' => CCatalogProductSet::TYPE_SET, 
					'ITEM_ID' => $temp_id
				), 
				false, 
				false
			);
		?>

				
		<?if($elms->result->num_rows) {?>

		<div class="cheaper">
			<div class="container">
				<div class="title_under">Вместе дешевле</div>
				<div class="cheaper_swiper">
					<div class="swiper-container">
						<div class="swiper-wrapper">

							<? while( $set = $elms->fetch() ){ 
										$count = 0;
									?>

							<?$set = CCatalogProductSet::getSetByID( $set['SET_ID'] );?>

							<div class="swiper-slide">

								<? foreach($set['ITEMS'] as $offer) { ?>
								<?

												unset($prices);
												$product = CCatalogProduct::GetByIDEx( $offer['ITEM_ID'], false );
												$price = CCatalogProduct::GetOptimalPrice($offer['ITEM_ID'], $offer['QUANTITY'], false, "N", false);
												$outPrice = CurrencyFormat(CCatalogProduct::GetOptimalPrice($set['OWNER_ID'], $offer['QUANTITY'], false, "N", false)['DISCOUNT_PRICE'], 'RUB');

												// GETTING CALCULATED PRICE 
												$price = $price['RESULT_PRICE']['BASE_PRICE'] == $price['RESULT_PRICE']['DISCOUNT_PRICE'] ? $price['RESULT_PRICE']['BASE_PRICE'] : $price['RESULT_PRICE']['DISCOUNT_PRICE'];
												
												$product['PREVIEW_PICTURE'] = !$product['PREVIEW_PICTURE'] ? CCatalogProduct::GetByIDEx( $product['PROPERTIES']['CML2_LINK']['VALUE'], true )['PREVIEW_PICTURE'] : 0;
												$parentID = CCatalogSku::GetProductInfo($offer['ITEM_ID'])['ID'];
												$prices = array(
													'OLD_PRICE' => CurrencyFormat($price, 'RUB'),
													'DISCOUNT_PRICE' => CurrencyFormat($price - ($price * $offer['DISCOUNT_PERCENT'] / 100), 'RUB'),
													'SALE' => $offer['DISCOUNT_PERCENT']
												);

											?>

								<div class="cheaper_item">
									<a href="#" class="cheaper_item_img"><img src="<?= CFile::GetPath($product['PREVIEW_PICTURE']) ?>" alt="PRODUCT IMG"></a>
									<div class="cheaper_item_content">
										<a href="<?= '/catalog/' . $arParams['SECTION_ID'] . '/' . $parentID . '/' ?>"><?= $product['NAME'] ?></a>

										<?if($prices['SALE']):?>
										<span class="cheaper_item_old"><?= $prices['OLD_PRICE'] ?></span>
										<?endif;?>
										<span><?= $prices['DISCOUNT_PRICE'] ?></span>

									</div>
								</div>

								<?if(!$count){?>
								<div class="cheaper_item_operation">+</div>
								<?}
												$count++;
											}?>

								<div class="cheaper_item_operation">=</div>

								<div class="cheaper_item_cheaper">
									<span><?= $outPrice ?></span>
									<a href="?action=ADD2BASKET&id=<?= $set['OWNER_ID']; ?>" class="btn btn_blue">Купить комплект</a>
								</div>

							</div>

							<?}?>

						</div>
					</div>
					<div class="swiper-button-next"><i class="svg-next-2"></i></div>
					<div class="swiper-button-prev"><i class="svg-next-2"></i></div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
		<?}?>

		<!-- END CHEAPER -->

<?}?>

	</form>

<?

if($_REQUEST['use_ajax'] == "y"){?>
</div>
<?
	die();
}?>