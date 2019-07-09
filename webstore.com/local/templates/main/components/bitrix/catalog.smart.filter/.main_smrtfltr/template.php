<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
$selectVal = "";

// FIXME: СКРЫТОЕ СВОЙСТВО [СHECKED] ПОД ("Показать еще") НЕ ПОЯВЛЯЕТСЯ 
?>

<form style="display: none;" data-section="<?=$arParams['SECTION_ID']?>" class="slider_form_content" name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<? echo $arParams["FORM_ACTION"] ?>" method="get">

	<? foreach ($arResult["HIDDEN"] as $arItem) : ?>
		<input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>" id="<? echo $arItem["CONTROL_ID"] ?>" value="<? echo $arItem["HTML_VALUE"] ?>" />
	<? endforeach; ?>

	<input type="hidden" name="ajax" id="ajax" value="y" />
	<input type="hidden" name="SECTION_ID" id="ajax" value="<?=$arParams['SECTION_ID']?>" />

	<div class="slider_form_row">

		<? $itemCount = 0?>
		<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>

			<?
			foreach($arItem['VALUES'] as $val){
				$selectVal = $val['CONTROL_NAME'];
			}	
			?>

			<?if($itemCount < 3){?>
				<div class="slider_form_item">
					<label><?=$arItem['NAME']?>:</label>
					<select name="<?=$selectVal?>" class="select">
						<?foreach($arItem['VALUES'] as $arValue){?>
							<option data-name="<?=$arValue['CONTROL_NAME']?>" value="<?=$arValue['HTML_VALUE']?>"><?=$arValue['VALUE']?></option>
						<?}?>
					</select>
				</div>

			<?
				}
				$selectVal = "";
				$itemCount++; 
			?>
		<? endforeach;?>

	</div>
	<div class="slider_form_row slider_hide">
		<? $itemCount = 0 ?>
		<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>

			<?if(($itemCount >= 3) && ($arItem['PROPERTY_TYPE'])){?>
				<div class="slider_form_item">
					<label><?=$arItem['NAME']?>:</label>
					<select class="select">
						<?foreach($arItem['VALUES'] as $arValue){?>
							<option value="<?=$arValue['HTML_VALUE_ALT']?>"><?=$arValue['VALUE']?></option>
						<?}?>
					</select>
				</div>
			<?}?>
			<? $itemCount++; ?>
		<? endforeach; ?>
	</div>

	<div class="slider_form_row slider_form_range">
		<div class="slider_form_item">
			<label>Цена:</label>

			<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
				
				<?if($arItem['PROPERTY_TYPE'] != "S"){?>
				
					<div class="range">
						<input class="range_input range_input_min" name="<?= $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>" id="<?= $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>" value="<?= $arItem["VALUES"]["MIN"]['VALUE'] ?>" size="5">
						<span></span>
						<input class="range_input range_input_max" name="<?= $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>" id="<?= $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>" value="<?= $arItem["VALUES"]["MAX"]['VALUE'] ?>" size="5">
						<div id="range" class="range_slider" data-value-min="<?= $arItem["VALUES"]["MIN"]['VALUE'] ?>" data-value-max="<?= $arItem["VALUES"]["MAX"]['VALUE'] ?>" data-min="<?= $arItem["VALUES"]["MIN"]['VALUE'] ?>" data-max="<?= $arItem["VALUES"]["MAX"]['VALUE'] ?>" data-step="10"></div>
					</div>

				<?}?>

			<? endforeach; ?>

		</div>

		<button type="submit" id="set_filter" value="Y" name="set_filter" class="btn">Показать 28 товаров</button>

		<a href="#" class="btn slider_more">Расширенный фильтр</a>
	</div>
	
</form>