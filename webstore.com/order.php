<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Заказ");
$APPLICATION->SetTitle("Заказ");
?>
	<div class="container">
		<div class="order">
			<div class="order_row order_formed">
				<div class="order_formed_head">
					Ваш заказ:
					<a href="#" class="order_edit">Редактировать заказ</a>
				</div>
				<table class="order_formed_list">
					<tr>
						<td class="order_img"><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog_1.jpg" alt=""></a></td>
						<td class="order_name"><a href="#">Матрас Венето Family Style 120х190 см </a></td>
						<td class="order_count">1 шт.</td>
						<td class="order_price">8 500 руб</td>
					</tr>
					<tr>
						<td class="order_img"><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog_1.jpg" alt=""></a></td>
						<td class="order_name"><a href="#">Матрас Венето Family Style 120х190 см </a></td>
						<td class="order_count">1 шт.</td>
						<td class="order_price">8 500 руб</td>
					</tr>
					<tr>
						<td class="order_img"><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog_1.jpg" alt=""></a></td>
						<td class="order_name"><a href="#">Матрас Венето Family Style 120х190 см</a></td>
						<td class="order_count">1 шт.</td>
						<td class="order_price">8 500 руб</td>
					</tr>
				</table>
				<div class="order_total">
					<div class="order_total_title">Итого:</div>
					<div class="order_total_item">3 товара на суму: <strong>26 800 руб.</strong></div>
					<div class="order_total_item">Стоимость доставки: <strong>800 руб.</strong></div>
				</div>
				<div class="order_score">
					К оплате: <span>27 600 руб.</span>
					<a href="#" class="btn">Оформить заказ</a>
				</div>
			</div>
			
			<div class="order_row">
				<div class="order_item">
					<div class="order_title">1. Контактная информация</div>
					<label>Имя<input type="text"></label>
					<label>Телефон<input type="text"></label>
					<label>Ваш e-mail<input type="text"></label>
				</div>
				<div class="order_item">
					<div class="order_title">2. Доставка</div>
					<select class="select">
						<option value="">Москва</option>
						<option value="">lorem</option>
					</select>
					<label class="ib">Улица<input type="text" class="input_md"></label>
					<label class="ib">Дом<input type="text" class="input_sm"></label>
					<label class="ib">Квартира<input type="text" class="input_sm"></label>
				</div>
				<div class="order_item">
					<div class="order_title">3. Способ оплаты</div>
					<label><input type="radio" name="pay" class="checkbox">Безналичный</label>
					<label><input type="radio" name="pay" class="checkbox">Наличными курьеру</label>
				</div>
			</div>
		</div>
	</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>