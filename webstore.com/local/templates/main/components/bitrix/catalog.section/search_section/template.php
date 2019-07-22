<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

global $APPLICATION;

$arSort = array(

	0 => array(
		'name' => 'По имени (возр.)',
		'sort' => 'name',
		'method' => 'asc',
		'selected'=>true
	),

	1 => array(
		'name' => 'По имени (спад.)',
		'sort' => 'name',
		'method' => 'desc'
	),

	2 => array(
		'name' => 'По дате создания (возр.)',
		'sort' => 'timestamp_x',
		'method' => 'asc'
	),

	3 => array(
		'name' => 'По дате создания (спад.)',
		'sort' => 'timestamp_x',
		'method' => 'desc'
	),

);

foreach($arSort as &$sort_method) {
	if($sort_method['sort']==$_REQUEST['sort'] && $sort_method['method']==$_REQUEST['method']) 
	{
		unset($sort_method[0]['selected']);
		$sort_method['selected']='true';
	}
}

?>

<div class="catalog_head">

	<?if($arParams['SEARCH_COUNT']) {?>
		<div class="catalog_search">По запросу «<?=$arParams['QUERY_NAME']?>» найдено <span><?=$arParams['SEARCH_COUNT']?> товар(ов)</span></div>
	<? } ?>

	<div class="catalog_sort">
		Сортировать:
		<select class="select_sort select">

			<? foreach($arSort as $arSortItem) { ?>

				<?
					$url = $APPLICATION->GetCurPageParam(
						'sort=' . $arSortItem['sort'] . '&method=' . $arSortItem['method'] . '&q=' . $arParams['QUERY_NAME'],
						array('sort', 'method')
					);
				?>
		
				<option <?if($arSortItem['selected']=='true') {?> selected <?}?> data-url="<?=$url?>" name="<?=$arSortItem['sort']?>" value="<?=$arSortItem['method']?>"><?=$arSortItem['name']?></option>

			<? } ?>

		</select>
	</div>

</div>

<div class="catalog_list">
	
	<?if($arParams['SEARCH_COUNT']) {?>


		<? foreach ($arResult["ITEMS"] as $arItem) { ?>

			<? if($arParams['SECT_ID'] == $arItem['IBLOCK_SECTION_ID'] || $arParams['SECT_ID'] == '') { ?>

				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
				?>

				<? if (is_array($arItem["PREVIEW_PICTURE"])) { ?>

					<div class="product_item">
						<div href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="product_item_img">
							<div class="product_item_quick">
									<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>?use_ajax=y" class="btn btn_blue fancymodal2" data-fancybox data-type="ajax"  data-src="<?= $arItem["DETAIL_PAGE_URL"] ?>?use_ajax=y">Быстрый просмотр</a>
								</div>
							<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="product img">
						</div>
						<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="product_item_title"><?= $arItem['NAME'] ?></a>
						<div class="product_item_size">Варианты:

							<select class="select catalog-items-list">
								<? if (is_array($arItem['OFFERS'])) { ?>
									<? foreach ($arItem['OFFERS'] as $arOption) { ?>
										<option data-compare="<?= '/catalog/' . $arParams['SECT_ID'] . '/?action=ADD_TO_COMPARE_LIST&id=' . $arOption['ID'] ?>" data-add2basket="<?= '/catalog/' . $arParams['SECT_ID'] . '/?action=ADD2BASKET&id=' . $arOption['ID'] ?>" data-price="<?= $arOption['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?>" data-size="<?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?>"><?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?> - <?= $arOption['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?></option>
									<? } ?>
								<? } ?>
							</select>

						</div>	
						<div class="product_item_price"><?= $arItem['OFFERS'][0]['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?></div>
						<div class="product_item_bottom">
							<a href="<?= '/catalog/' . $arParams['SECT_ID'] . '/?action=ADD_TO_COMPARE_LIST&id=' . $arItem['OFFERS'][0]['ID'] ?>" class="fancymodal product_item_comparison"><i class="svg-list"></i></a>
							<a href="<?= '/catalog/' . $arParams['SECT_ID'] . '/?action=ADD2BASKET&id=' . $arItem['OFFERS'][0]['ID'] ?>" class="fancymodal btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
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