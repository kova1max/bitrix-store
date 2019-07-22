<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="complexity">
	<div class="container">

		<form name="SIMPLE_FORM_2" enctype="multipart/form-data" action="<?= POST_FORM_ACTION_URI ?>" method="POST" class="complexity_form">

			<?= bitrix_sessid_post() ?>
			<input type="hidden" name="WEB_FORM_ID" value="2">
			<input type="hidden" name="web_form_apply" value="y">

			<div class="complexity_title">Возникли вопросы или трудности?</div>
			<div class="complexity_desc">Вы можете обратиться к специалисту за бесплатной консультацией оформив заявку на сайте</div>
		
			<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {?>

				<input type="text" name="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE'][0]['FIELD_ID']?>" value="" placeholder="<?=$arQuestion['CAPTION']?>" required> 

			<?}?>
			
			<button type="submit" name="web_form_submit" class="btn" value="Заказать консультацию">Заказать консультацию</button>

		</form>

	</div>
</div>