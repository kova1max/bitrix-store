<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

if ($arParams['GUEST_MODE'] !== 'Y')
{
	Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/bootstrap_v4/script.js");
	Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/bootstrap_v4/style.css");
}
CJSCore::Init(array('clipboard', 'fx'));

$APPLICATION->SetTitle("");

if (!empty($arResult['ERRORS']['FATAL']))
{
	$component = $this->__component;
	foreach($arResult['ERRORS']['FATAL'] as $code => $error)
	{
		if ($code !== $component::E_NOT_AUTHORIZED)
			ShowError($error);
	}

	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		?>
<div class="row">
	<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
		<div class="alert alert-danger"><?= $arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED] ?></div>
	</div>
	<? $authListGetParams = array(); ?>
	<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
		<?$APPLICATION->AuthForm('', false, false, 'N', false);?>
	</div>
</div>
<?
	}
}
else
{
	if (!empty($arResult['ERRORS']['NONFATAL']))
	{
		foreach ($arResult['ERRORS']['NONFATAL'] as $error)
		{
			ShowError($error);
		}
	}
}
?>

<? $APPLICATION->RestartBuffer(); ?>

<div class="modal_title"><i class="svg-check"></i>Спасибо, ваш заказ принят!</div>
<div class="zakaz_info">
	<div class="zakaz_info_title">Детали заказа:</div>

	<?foreach($arResult['ORDER_PROPS'] as $prop){?>
	<p><?= $prop['NAME'] ?>: <strong><?= $prop['VALUE'] ?></strong></p>
	<?}?>
</div>
<p class="zakaz_desc">В ближайшее время мы свяжемся с вами для подтверждения заказа. <br>
	Копия информации о заказе отправлена на ваш e-mail. <br>
	Остались вопросы? Пишите письмо с номерром заказа на почту domsna@yandex.ru</p>
<div class="modal_social">
	Присоединяйтесь к нам в соц. сетях:
	<div class="modal_social_list">
		<a href="#"><span class="icons-vk"></span></a>
		<a href="#"><span class="icons-google"></span></a>
		<a href="#"><span class="icons-facebook"></span></a>
		<a href="#"><span class="icons-youtube"></span></a>
	</div>
</div>

<p class="continue">
	<a href="/" class="btn btn_blue">Продолжить покупки</a>
</p>

<div class="subscribe">
	<form action="#" method="post">
		<div class="subscribe_title">Подписаться на скидки/акции</div>
		<input type="text" placeholder="Email">
		<button type="submit" class="btn">Подписаться</button>
	</form>
</div>

<? die(); ?>