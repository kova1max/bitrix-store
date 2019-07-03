<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Контакты");
$APPLICATION->SetTitle("Контакты");
?>
	<div class="contact_wrapper">
		<div class="container">
			<h1>Контакты</h1>
			<div class="contact">
				<div class="contact_left">
					<div class="contact_item">
						<div class="header_item header_basket">
							<span class="header_item_icon"><span class="icons-phone-call"></span></span>
							<span class="contact_descr">
								<span class="contact_item_content left">
									<strong>0 800 505 90 90</strong><br>
									<strong>0 800 505 90 90</strong>
								</span>
								<span> <a href="#" class="btn btn_contact">Обратный звонок</a></span>
							</span>
						</div>
					</div>

					<div class="contact_item">
						<div class="header_item header_basket">
							<span class="header_item_icon"><span class="icons-mail"></span></span>
							<span class="contact_descr">
								<span class="contact_item_content">
									<span><a class="contact_link" href="mailto:domsna@yandex.ru">domsna@yandex.ru</a></span>
								</span>
							</span>
						</div>
					</div>

					<div class="contact_item">
						<div class="header_item header_basket">
							<span class="header_item_icon"><span class="icons-clock"> </span></span>
							<span class="contact_item_content">
								<span>Прием заказов по телефону: <strong>c 10:00 до 21:00</strong> (По МСК)</span>
								<span>Прием заказов через сайт: <strong>круглосуточно</strong></span>
							</span>
						</div>
					</div>

					<div class="contact_item">
						<div class="header_item header_basket">
							<span class="header_item_icon"><span class="icons-location"></span></span>
							<span class="contact_item_content">
								<strong>Москва, ул. Пушкина 10</strong>
							</span>
						</div>
					</div>


					<div class="contact_item">
						<div class="header_item header_basket flex">
							<span class="social">
								<span>Присоеденитесь к нам</span>
							</span>
							<ul class="contact_social">
								<li><a href=""><i class="sprite sprite-vk"></i></a></li>
								<li><a href=""><i class="sprite sprite-facebook"></i></a></li>
								<li><a href=""><i class="sprite sprite-twitter"></i></a></li>
								<li><a href=""><i class="sprite sprite-ok"></i></a></li>
								<li><a href=""><i class="sprite sprite-youtube"></i></a></li>
							</ul>
						</div>
					</div>


				</div>
				<div class="contact_map">
					<iframe src="https://api-maps.yandex.ua/frame/v1/-/CZgdJRn5"></iframe>
				</div>
			</div>
		</div>
	</div>




	<div class="complexity">
		<div class="container">
			<form action="#" method="post" class="complexity_form">
				<div class="complexity_title">Возникли вопросы или трудности?</div>
				<div class="complexity_desc">Вы можете обратиться к специалисту за бесплатной консультацией оформив заявку на сайте</div>
				<input type="text" placeholder="Имя*">
				<input type="text" placeholder="+7 000 000-00-00"> <span class="ore">или</span>
				<input type="email" placeholder="example@gmail.com"><br>
				<button type="submit" class="btn">Заказать консультацию</button>
			</form>
		</div>
	</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>