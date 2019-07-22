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

	<?if(count($arResult['SEARCH'])){?>
		<div class="catalog_search">По запросу «<?=$arResult['REQUEST']['QUERY']?>» найдено <span><?=count($arResult['SEARCH'])?> товар(ов)</span></div>
	<?} else {?>
		<div class="catalog_search">По запросу «<?=$arResult['REQUEST']['QUERY']?>» ничего не найдено</div>
	<?}?>
	<div class="catalog_sort">
		Сортировать:
		<select class="select">
			<option value="">По рейтингу</option>
			<option value="">lorem</option>
		</select>
	</div>
</div>

<div class="catalog_list">

	<? foreach ($arResult['ORIGINAL_PARAMETERS']["ITEMS"] as $arItem) : ?>

		<?
			$arItem = CIBlockElement::GetByID($arItem['ITEM_ID'])->fetch();

			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));

		?>

		<? if ($arItem["PREVIEW_PICTURE"]) : ?>

			<div class="product_item">
				<div href="/catalog/<?= $arItem["IBLOCK_SECTION_ID"] . '/' . $arItem['ID']?>/" class="product_item_img">
					<div class="product_item_quick">
							<a href="/catalog/<?= $arItem["IBLOCK_SECTION_ID"] . '/' . $arItem['ID']?>/" class="btn btn_blue fancymodal2" data-fancybox data-type="ajax"  data-src="<?= $arItem["~DETAIL_PAGE_URL"] ?>?ajax=y">Быстрый просмотр</a>
						</div>
					<img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE'])?>" alt="product img">
				</div>
				<a href="<?= $arItem["~DETAIL_PAGE_URL"] ?>" class="product_item_title"><?= $arItem["NAME"] ?></a>
				<div class="product_item_size">Варианты:

					<select class="select catalog-items-list">

						<? if (is_array($arItem['OFFERS'])) : ?>
							<? foreach ($arItem['OFFERS'] as $arOption) : ?>
								<option data-compare="<?= $arOption['COMPARE_URL'] ?>" data-add2basket="<?= $arOption['ADD_URL'] ?>" data-price="<?= $arOption['PRICES']['BASE']['PRINT_VALUE'] ?>" data-size="<?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?>"><?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?> - <?= $arOption['PRICES']['BASE']['PRINT_VALUE'] ?></option>
							<? endforeach; ?>
						<? endif; ?>
					</select>

				</div>	
				<div class="product_item_price"><?= $arItem['OFFERS'][0]['PRICES']['BASE']['PRINT_VALUE'] ?></div>
				<div class="product_item_bottom">
					<a href="123<?= $arItem['OFFERS'][0]['COMPARE_URL'] ?>" class="fancymodal product_item_comparison"><i class="svg-list"></i></a>
					<a href="<?= $arItem['OFFERS'][0]['ADD_URL'] ?>" class="fancymodal btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
				</div>
			</div>

		<? endif; ?>


	<? endforeach; ?>

</div>


<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
	<br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
</div>