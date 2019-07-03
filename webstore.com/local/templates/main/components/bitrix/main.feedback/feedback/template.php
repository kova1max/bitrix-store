<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>

<div class="complexity">
	<div class="container">
		<?
		if (mail("kova1max99@gmail.com", "Заявка с сайта", "ФИО:".$_POST['user_name'].". E-mail: ".$_POST['user_email'] . ". PHONE: " . $_POST['user_num'], "From: asdasd@mail.ua")){
				echo 'Success.';
			}
		?>
		
		<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="complexity_form">
		<?=bitrix_sessid_post()?>
			<div class="complexity_title">Возникли вопросы или трудности?</div>
			<div class="complexity_desc">Вы можете обратиться к специалисту за бесплатной консультацией оформив
				заявку на сайте</div>
			<input type="text" name="NAME" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="Имя*">
			<input type="text" name="MESSAGE" placeholder="+7 000 000-00-00"> <span class="ore">или</span>
			<input type="email" name="EMAIL" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder="example@gmail.com"><br>
			<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
			<button type="submit" onClick="$('.complexity_form').submit()" name="submit" class="btn">Заказать консультацию</button>
		</form>
	</div>
</div>
