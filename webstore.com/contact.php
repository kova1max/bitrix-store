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
								<li><a href="vk.com/bitrix"><i class="sprite sprite-vk"></i></a></li>
								<li><a href="fb.com/bitrix"><i class="sprite sprite-facebook"></i></a></li>
								<li><a href="twitter.com/bitrix"><i class="sprite sprite-twitter"></i></a></li>
								<li><a href="ok.ru/bitrix"><i class="sprite sprite-ok"></i></a></li>
								<li><a href="youtube.com/bitrix"><i class="sprite sprite-youtube"></i></a></li>
							</ul>
						</div>
					</div>


				</div>
				<div class="contact_map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d20704.289078233578!2d25.571650528833008!3d49.55934135484449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1593784178959!5m2!1sru!2sua" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
	</div>

	<?$APPLICATION->IncludeComponent(
		"bitrix:main.feedback",
		"feedback",
		Array(
			"EMAIL_TO" => "sale@webstore.com",
			"EVENT_MESSAGE_ID" => array(),
			"OK_TEXT" => "Спасибо, ваше сообщение принято.",
			"REQUIRED_FIELDS" => array(),
			"USE_CAPTCHA" => "Y"
		)
	);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>