<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>

<div class="catalog_head">

	<?if($arParams['SEARCH_COUNT']) {?>
		<div class="catalog_search">По запросу «<?=$arParams['QUERY_NAME']?>» найдено <span><?=$arParams['SEARCH_COUNT']?> товар(ов)</span></div>
	<? } ?>

	<div class="catalog_sort">
		Сортировать:
		<select class="select_sort select">
			<option name="name" value="desc">По имени</option>
			<option name="timestamp_x" value="desc">По дате добавления</option>
		</select>
	</div>

</div>

<div class="catalog_list">
	
	<?if($arParams['SEARCH_COUNT']) {?>


		<? foreach ($arResult["ITEMS"] as $arItem) { ?>

			<? if($arParams['SECT_ID'] == $arItem['IBLOCK_SECTION_ID']) { ?>

				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
				?>

				<? if (is_array($arItem["PREVIEW_PICTURE"])) { ?>

					<div class="product_item">
						<div href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="product_item_img">
							<div class="product_item_quick">
									<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>?ajax=y" class="btn btn_blue fancymodal2" data-fancybox data-type="ajax"  data-src="<?= $arItem["DETAIL_PAGE_URL"] ?>?ajax=y">Быстрый просмотр</a>
								</div>
							<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="product img">
						</div>
						<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="product_item_title"><?= $arItem['NAME'] ?></a>
						<div class="product_item_size">Варианты:

							<select class="select catalog-items-list">
								<? if (is_array($arItem['OFFERS'])) { ?>
									<? foreach ($arItem['OFFERS'] as $arOption) { ?>
										<option data-compare="<?= '/catalog/' . $arParams['SECTION_ID'] . '/?action=ADD_TO_COMPARE_LIST&id=' . $arOption['ID'] ?>" data-add2basket="<?= '/catalog/' . $arParams['SECTION_ID'] . '/?action=ADD2BASKET&id=' . $arOption['ID'] ?>" data-price="<?= $arOption['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?>" data-size="<?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?>"><?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?> - <?= $arOption['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?></option>
									<? } ?>
								<? } ?>
							</select>

						</div>	
						<div class="product_item_price"><?= $arItem['OFFERS'][0]['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?></div>
						<div class="product_item_bottom">
							<a href="<?= '/catalog/' . $arParams['SECTION_ID'] . '/?action=ADD_TO_COMPARE_LIST&id=' . $arItem['OFFERS'][0]['ID'] ?>" class="fancymodal product_item_comparison"><i class="svg-list"></i></a>
							<a href="<?= '/catalog/' . $arParams['SECTION_ID'] . '/?action=ADD2BASKET&id=' . $arItem['OFFERS'][0]['ID'] ?>" class="fancymodal btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
						</div>
					</div>

				<? } ?>

			<? } ?>

		<? } ?>
	
	<? } else {?>
	
		<p>Товаров не найдено.</p>
	
	<?}?>

</div>


<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
	<br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
</div>