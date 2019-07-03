<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CMain $APPLICATION
 * @var CUser $USER
 * @var SaleOrderAjax $component
 * @var string $templateFolder
 */

?>

<? if($_REQUEST['ajax'] == "y") $APPLICATION->RestartBuffer() ?>

<div class="container">

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
							<td class="order_img"><a href="#"><img src="<?=$arItem['data']['PREVIEW_PICTURE_SRC']?>" alt=""></a></td>
							<td class="order_name"><a href="#"><?=$arItem['data']['NAME']?> </a></td>
							<td class="order_count"><?=$arItem['data']['QUANTITY']?> шт.</td>
							<td class="order_price"><?=$arItem['data']['SUM_BASE_FORMATED']?></td>
						</tr>

					<?}?>

				</table>

				<div class="order_total">
					<div class="order_total_title">Итого:</div>
					<div class="order_total_item"><?=count($arResult['JS_DATA']['GRID']['ROWS'])?> товара на суму: <strong><?=$arResult['allSum_FORMATED']?></strong></div>
					<div class="order_total_item">Стоимость доставки: <strong><?=$delivery?> руб.</strong></div>
				</div>

				<div class="order_score">
					К оплате: <span><?=CurrencyFormat($arResult['allSum'] + $delivery, 'RUB')?></span>
					<a href="javascript:void(0)" class="btn" data-save-button="true">Оформить заказ</a>
				</div>
			</div>
			
			<div class="order_row">

				<div class="order_item">
					<div class="order_title">1. Контактная информация</div>
					<label>Имя<input name="USER_NAME" value="<?=$USER->GetFullName()?>" type="text"></label>
					<label>Телефон<input name="USER_PHONE" value="" type="text"></label>
					<label>Ваш e-mail<input name="USER_EMAIL" value="<?=$USER->GetEmail()?>" type="text"></label>
				</div>

				<div class="order_item">
					<div class="order_title">2. Доставка</div>
					<select class="select">

						<?foreach($arResult['DELIVERY'] as $arDelivery){?>
							<option value="<?=$arDelivery['ID']?>"><?=$arDelivery['NAME']?></option>
						<?}?>

					</select>

					<input type="hidden" name="DELIVERY_CITY" value="">

					<label class="ib">Улица<input name="DELIVERY_STREET" type="text" class="input_md"></label>
					<label class="ib">Дом<input name="DELIVERY_HOUSE" type="text" class="input_sm"></label>
					<label class="ib">Квартира<input name="DELIVERY_ROOM" type="text" class="input_sm"></label>

				</div>

				<div class="order_item">
					<div class="order_title">3. Способ оплаты</div>

					<?foreach($arResult['PAY_SYSTEM'] as $arPayment){?>
						<label>
							<input type="radio" value="<?=$arPayment['PAY_SYSTEM_ID']?>" name="pay" class="checkbox">
							<?=$arPayment['NAME']?>
						</label>
					<?}?>
					
				</div>

			</div>
		</div>

	</div>

	<? if($_REQUEST['ajax'] == "y") die() ?>