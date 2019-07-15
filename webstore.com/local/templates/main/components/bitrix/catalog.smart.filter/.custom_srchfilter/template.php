<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	$this->setFrameMode(true);
?>

<form class="filter" name="<? echo $arResult[" FILTER_NAME"] . "_form" ?>" action="
	<? echo $arResult["FORM_ACTION"] ?>" method="get">

	<input type="hidden" name="q" value="<?=$arParams['SEARCH_RESULT']['QUERY']?>">
	<input type="hidden" name="section" value="<?=$arParams['SECTION_ID']?>">

	<input type="hidden" name="sort" value="<?=$arParams['ELEMENT_SORT_FIELD']?>">
	<input type="hidden" name="method" value="<?=$arParams['ELEMENT_SORT_ORDER']?>">
	
	<? foreach ($arResult["HIDDEN"] as $arItem) { ?>

		<input type="hidden" name="<? echo $arItem[" CONTROL_NAME"] ?>" id="
		<? echo $arItem["CONTROL_ID"] ?>" value="
		<? echo $arItem["HTML_VALUE"] ?>" />

	<? } ?>

	<div class="filter_head">Все результаты (<?=$arParams['ALL_COUNT']?>)</div>

	<?if($arParams['ALL_COUNT'] > 0) {?>

	<div class="filter_item">

		<?foreach($arParams['SECTIONS_RESULT'] as $id => $arItem) {?>

			<?if($arItem['ID'] != $arParams['SECTION_ID']) {?>

				<a href="/catalog/search.php?q=<?=$arParams['SEARCH_RESULT']['QUERY']?>&section=<?=$arItem['ID']?>"><?=$arItem['NAME']?> <span>(<?=$arItem['COUNT']?>)</span></a>

			<?} else {?>
			
				<div class="filter_title"><?=$arItem['NAME']?> <span>(<?=$arItem['COUNT']?>)</span></div>
			
			<?}?>

		<?}?>

	</div>
	<?} else {?>
	
		<div class="filter_item">
			<p>Фильтр не доступен, так как <b>результатов по данному запросу не найдено</b>. Пожалуйста измените ваш запрос или попробуйте найти нужный товар в <a href="/catalog/" >каталоге</a></p>
		</div>
	
	<? } ?>


	<?if($arParams['ALL_COUNT'] > 0) {?>

		<? foreach ($arResult["ITEMS"] as $key => $arItem) { ?>

			<?

			$key = $arItem["ENCODED_ID"];
			$precision = $arItem["DECIMALS"] ? $arItem["DECIMALS"] : 0;

			$minPrice = number_format($arItem["VALUES"]["MIN"]["VALUE"], $precision, ".", "");
			$maxPrice = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
			$minValuePrice = isset($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? $arItem["VALUES"]["MIN"]["HTML_VALUE"] : $minPrice;
			$maxValuePrice = isset($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? $arItem["VALUES"]["MAX"]["HTML_VALUE"] : $maxPrice;

			?>

			<? if ($arItem['PRICE'] == 1) { ?>

				<div class="filter_item">
					<div class="filter_title"><?= $arItem['NAME'] ?></div>
					<div class="filter_range">
						<div class="range_slider" data-value-min="<?= $minValuePrice ?>" data-value-max="<?= $maxValuePrice ?>" data-min="<?= $minPrice ?>" data-max="<?= $maxPrice ?>" data-step="10"></div>
						<input class="filter_range_input range_input_min" name="<?= $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>" id="<?= $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>" value="<?= $arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>" size="5">
						<span></span>
						<input class="filter_range_input range_input_max" name="<?= $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>" id="<?= $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>" value="<?= $arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>" size="5">
					</div>
				</div>

			<? } else { ?>

				<div class="filter_item">
					<div class="filter_title"><?= $arItem['NAME'] ?><i class="svg-next"></i></div>
					<div class="label_wrap" style="display: none;">
						<? $c = 0; ?>
						<? foreach ($arItem['VALUES'] as $arLabel) { ?>
							<? if ($c == 7) : ?>
							<a href="#" class="filter_item_more">Все производители</a>
							<? endif; ?>
							<label>
								<input type="checkbox" class="checkbox" name="<?= $arLabel["CONTROL_NAME"] ?>" id="<?= $arLabel["CONTROL_ID"] ?>" value="<?= $arLabel["HTML_VALUE"] ?>" <? echo $arLabel["CHECKED"] ? 'checked="checked"' : '' ?>>
								<?= $arLabel['VALUE'] ?> <span></span>
							</label>
							<? $c++; ?>
						<? } ?>
					</div>
				</div>

			<? } ?>


		<? } ?>
	<? } ?>

	<?if($arParams['ALL_COUNT'] > 0) {?>
		<input style="cursor: pointer;background: #01a0e1;color: white;display: block;width: 110px;border: none;padding: 10px;margin: 20px auto;" class="bx_filter_search_button" type="submit" id="set_filter" name="set_filter" value="Показать" />
	<? } ?>
</form>