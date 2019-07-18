<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 **/

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');
?>

<div class="product">
	<div class="container container-xs">

		<div class="product_slider">

			<div class="product_head">
				<div class="product_title">Также интересуются</div>
				<div class="product_nav">
					<div class="swiper-button-prev"><i class="svg-arrow"></i></div>
					<div class="swiper-button-next"><i class="svg-arrow"></i></div>
				</div>
			</div>

			<div class="swiper-container">
				<div class="swiper-wrapper -product_list">

					<?if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS'])) {?>

						<?foreach($arResult['ITEMS'] as $arItem) {?>
							
							<?if(($arItem['CATALOG_TYPE'] != 2) && ($arItem['ID'] != $_REQUEST['ELEMENT_ID'])) {?>
							<? 
								$price = CCatalogProduct::GetOptimalPrice( $arItem['ID'], 1, array(), "N", array(), false, false );
								$curr = $price['PRICE']['CURRENCY'];
							?>

								<div class="product_item swiper-slide swiper-slide-active" style="width: 280px; margin-right: 20px;">

									<?if($arItem['PRICE']['DISCOUNT']):?>
										<div class="product_item_prom">
											<div class="product_item_discount" title="Скидка">%</div>
										</div>
									<?endif;?>

									<a href="<?='/catalog/' . $arItem['IBLOCK_SECTION_ID'] . '/' . $arItem['ID'] . '/'?>" class="product_item_img"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="product img"></a>
									<a href="<?='/catalog/' . $arItem['IBLOCK_SECTION_ID'] . '/' . $arItem['ID'] . '/'?>" class="product_item_title"><?=$arItem['OFFERS'][0]['NAME']?></a>
									
									<div class="product_item_size">Варианты:
										<select class="select">
											<? foreach ($arItem['OFFERS'] as $arOption) : ?>
												<?$optPrice = CCatalogProduct::GetOptimalPrice( $arOption['ID'], 1, array(), "N", array(), false, false )['DISCOUNT_PRICE']?>

												<option data-compare="<?= $arOption['COMPARE_URL'] ?>" data-add2basket="<?= $arOption['ADD_URL'] ?>" data-price="<?= CurrencyFormat( $arOption['ITEM_PRICES'][0]['PRICE'], 'RUB' ) ?>" data-size="<?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?>"><?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?> - <?= CurrencyFormat( $optPrice, 'RUB' ) ?></option>
											<? endforeach; ?>
										</select>
									</div>
									
									<div class="product_item_price"><?= CurrencyFormat( $price['DISCOUNT_PRICE'], $curr ) ?></div>

									<div class="product_item_bottom">
										<a href="?action=ADD_TO_COMPARE_LIST&id=<?= $arItem['OFFERS'][0]['ID'] ?>" class="product_item_comparison"><i class="svg-list"></i></a>
										<a href="<?= $arItem['OFFERS'][0]['ADD_URL'] ?>" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
									</div>

								</div>

							<?}?>
						<?}?>
					<?}?>

				</div>
			</div>

		</div>
	</div>
</div>