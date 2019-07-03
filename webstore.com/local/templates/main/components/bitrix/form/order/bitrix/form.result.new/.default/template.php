<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<div class="container">

	<form action="" method="GET">

		<div class="order">
			<div class="order_row order_formed">
				<div class="order_formed_head">
					Ваш заказ:
					<a href="#" class="order_edit">Редактировать заказ</a>
				</div>
				<table class="order_formed_list">

					<!-- ORDER ITEMS -->

					<?foreach($arResult['GRID']['ROWS'] as $arItem){?>

						<tr>
							<td class="order_img"><a href="#"><img src="<?=$arItem['PREVIEW_PICTURE_SRC']?>" alt=""></a></td>
							<td class="order_name"><a href="#"><?=$arItem['NAME']?> </a></td>
							<td class="order_count"><?=$arItem['QUANTITY']?> шт.</td>
							<td class="order_price"><?=$arItem['SUM_FULL_PRICE_FORMATED']?></td>
						</tr>

					<?}?>

				</table>

				<div class="order_total">
					<div class="order_total_title">Итого:</div>
					<div class="order_total_item"><?=$arResult['ORDERABLE_BASKET_ITEMS_COUNT']?> товара на суму: <strong><?=$arResult['allSum_FORMATED']?></strong></div>
					<div class="order_total_item">Стоимость доставки: <strong>800 руб.</strong></div>
				</div>

				<div class="order_score">
					К оплате: <span>27 600 руб.</span>
					<a href="#" onclick="$('form').submit()" class="btn">Оформить заказ</a>
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
						<option value="">Москва</option>
						<option value="">lorem</option>
					</select>

					<input type="hidden" name="DELIVERY_CITY" value="">

					<label class="ib">Улица<input name="DELIVERY_STREET" type="text" class="input_md"></label>
					<label class="ib">Дом<input name="DELIVERY_HOUSE" type="text" class="input_sm"></label>
					<label class="ib">Квартира<input name="DELIVERY_ROOM" type="text" class="input_sm"></label>

				</div>

				<div class="order_item">
					<div class="order_title">3. Способ оплаты</div>
					<label><input type="radio" value="beznal" name="pay" class="checkbox">Безналичный</label>
					<label><input type="radio" value="nal" name="pay" class="checkbox">Наличными курьеру</label>
					<label><input type="radio" value="cart" name="pay" class="checkbox">Карта VISA/Mastercard</label>
				</div>

			</div>
		</div>

	</form>

</div>