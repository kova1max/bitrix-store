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

<div class='<?=$arParams['DIV_TYPE']?>'>

	<? foreach ($arResult["ITEMS"] as $arItem) : ?>
		<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
			$trimmed = trim($arItem["DISPLAY_PROPERTIES"]["URL"]["VALUE"]);
			if ($trimmed !== '') {
				if (strpos(strtolower($trimmed), "http") !== 0) {
					$trimmed = 'http://' . $trimmed;
				}
			}
			$arItem["DETAIL_PAGE_URL"] = $trimmed;
		?>

		<? if (is_array($arItem["PREVIEW_PICTURE"])) : ?>

			<div class="product_item">
				<div href="<?= $arItem["~DETAIL_PAGE_URL"] ?>" class="product_item_img">
					<div class="product_item_quick">
						<a href="<?= $arItem["~DETAIL_PAGE_URL"] ?>?ajax=y" class="btn btn_blue fancymodal2" data-fancybox data-type="ajax" data-src="<?= $arItem["~DETAIL_PAGE_URL"] ?>?ajax=y">Быстрый просмотр</a>
					</div>
					<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="product img">
				</div>
				<a href="<?= $arItem["~DETAIL_PAGE_URL"] ?>" class="product_item_title"><?= $arItem["OFFERS"][0]["NAME"] ?></a>
				<div class="product_item_size">Варианты:

					<select class="select catalog-items-list">
						<? if (is_array($arItem['OFFERS'])) : ?>
							<? foreach ($arItem['OFFERS'] as $arOption) : ?>
								<option 
									data-compare="<?= $arOption['COMPARE_URL'] ?>" 
									data-add2basket="<?= $arOption['ADD_URL'] ?>" 
									data-price="<?= $arOption['PRICES']['BASE']['PRINT_VALUE'] ?>" 
									data-size="<?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?>">
								<?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?> - <?= $arOption['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?>
								</option>
							<? endforeach; ?>
						<? endif; ?>
					</select>

				</div>
				<div class="product_item_price"><?= $arItem['OFFERS'][0]['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?></div>
				<div class="product_item_bottom">
					<a href="<?= $arItem['OFFERS'][0]['COMPARE_URL'] ?>" class="fancymodal product_item_comparison"><i class="svg-list"></i></a>
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