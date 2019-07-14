<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	$this->setFrameMode(true);
?>

<form class="filter" name="<? echo $arResult[" FILTER_NAME"] . "_form" ?>" action="
	<? echo $arResult["FORM_ACTION"] ?>" method="get">

	<? foreach ($arResult["HIDDEN"] as $arItem) : ?>
		<input type="hidden" name="<? echo $arItem[" CONTROL_NAME"] ?>" id="
		<? echo $arItem["CONTROL_ID"] ?>" value="
		<? echo $arItem["HTML_VALUE"] ?>" />
	<? endforeach; ?>

	<input type="hidden" name="ajax" id="ajax" value="y" />

	<div class="filter_head">Все результаты (кол-во)</div>
	<div class="filter_item">
		<div class="filter_title">Матрасы <span>(36)</span></div>
		<a href="#">Наматрасники <span>(302)</span></a>
		<a href="#">Подушки <span>(302)</span></a>
		<a href="#">Одеяла <span>(302)</span></a>
		<a href="#">Белье <span>(302)</span></a>
		<a href="#">Пледы <span>(302)</span></a>
		<a href="#">Для ванной <span>(3)</span></a>
		<a href="#">Для кухни <span>(302)</span></a>
		<a href="#">Мебель <span>(2)</span></a>
	</div>

	<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>

	<?

		$key = $arItem["ENCODED_ID"];
		$precision = $arItem["DECIMALS"] ? $arItem["DECIMALS"] : 0;

		$minPrice = number_format($arItem["VALUES"]["MIN"]["VALUE"], $precision, ".", "");
		$maxPrice = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
		$minValuePrice = isset($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? $arItem["VALUES"]["MIN"]["HTML_VALUE"] : $minPrice;
		$maxValuePrice = isset($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? $arItem["VALUES"]["MAX"]["HTML_VALUE"] : $maxPrice;

		?>

	<? if ($arItem['PRICE'] == 1) : ?>

	<div class="filter_item">
		<div class="filter_title"><?= $arItem['NAME'] ?></div>
		<div class="filter_range">
			<div class="range_slider" data-value-min="<?= $minValuePrice ?>" data-value-max="<?= $maxValuePrice ?>" data-min="<?= $minPrice ?>" data-max="<?= $maxPrice ?>" data-step="10"></div>
			<input class="filter_range_input range_input_min" name="<?= $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>" id="<?= $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>" value="<?= $arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>" size="5">
			<span></span>
			<input class="filter_range_input range_input_max" name="<?= $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>" id="<?= $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>" value="<?= $arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>" size="5">
		</div>
	</div>

	<? else : ?>

	<div class="filter_item">
		<div class="filter_title"><?= $arItem['NAME'] ?><i class="svg-next"></i></div>
		<div class="label_wrap" style="display: none;">
			<? $c = 0; ?>
			<? foreach ($arItem['VALUES'] as $arLabel) : ?>
			<? if ($c == 7) : ?>
			<a href="#" class="filter_item_more">Все производители</a>
			<? endif; ?>
			<label>
				<input type="checkbox" class="checkbox" name="<?= $arLabel["CONTROL_NAME"] ?>" id="<?= $arLabel["CONTROL_ID"] ?>" value="<?= $arLabel["HTML_VALUE"] ?>" <? echo $arLabel["CHECKED"] ? 'checked="checked"' : '' ?>>
				<?= $arLabel['VALUE'] ?> <span></span>
			</label>
			<? $c++; ?>
			<? endforeach; ?>
		</div>
	</div>

	<? endif; ?>


	<? endforeach; ?>

	<input style="cursor: pointer;background: #01a0e1;color: white;display: block;width: 110px;border: none;padding: 10px;margin: 20px auto;" class="bx_filter_search_button" type="submit" id="set_filter" name="set_filter" value="Показать" />

</form>