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

	

	<div class="filter_head">Все результаты (<?=count($arParams['SEARCH_RESULT']['ITEMS'])?>)</div>
	<div class="filter_item">

		<?$i = 0;?>
		<?foreach($arParams['SEARCH_RESULT']['ITEMS'] as $arItem) {?>

			<?
				 preg_match("~[0-9]+~", $arItem['URL_WO_PARAMS'], $section_id);
				 $section = CIBlockSection::GetByID($section_id[0])->fetch();
				 $count = 0;

				 foreach($arParams['SEARCH_RESULT']['ITEMS'] as $arElm){
					 if($arElm['ITEM_ID'] == $arItem['ITEM_ID']) $count++;
				 }

			?>
			<?if($_REQUEST['section']) {?>

				<?if($section_id[0] == $_REQUEST['section']){?>
					<div class="filter_title"><?=$section['NAME']?> <span>(<?=$count?>)</span></div>
				<?} else {?>
					<a href="?section=<?=$section_id[0]?>&q=<?=$arParams['SEARCH_RESULT']['QUERY']?>"><?=$section['NAME']?> <span>(<?=$count?>)</span></a>
				<?}?>

			<?} else {?>

				<?if($i === 0) {?>
					<div class="filter_title"><?=$section['NAME']?> <span>(<?=$count?>)</span></div>
				<?} else {?>
					<a href="?section=<?=$section_id[0]?>&q=<?=$arParams['SEARCH_RESULT']['QUERY']?>"><?=$section['NAME']?> <span>(<?=$count?>)</span></a>
				<?}?>

			<?}?>

			<?$i++;?>
		<?}?>

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