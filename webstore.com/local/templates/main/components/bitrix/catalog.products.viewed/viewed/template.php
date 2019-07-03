<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

?>

<div class="product product_green">
	<div class="container container-xs">

		<div class="product_slider">

			<div class="product_head">
				<div class="product_title">Просмотренные товары</div>
				<div class="product_nav">
					<div class="swiper-button-prev"><i class="svg-arrow"></i></div>
					<div class="swiper-button-next"><i class="svg-arrow"></i></div>
				</div>
			</div>

			<div class="swiper-container">
				<div class="swiper-wrapper -product_list">

					<?if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS'])):?>

					<?foreach($arResult['ITEMS'] as $arItem):?>

						<? 
							$price = CCatalogProduct::GetOptimalPrice( $arItem['ID'], 1, array(), "N", array(), false, false );
							$curr = $price['PRICE']['CURRENCY'];

							$days = round(-1*(time() - strtotime($arItem['DATE_CREATE'])) / 216000);
						?>

						<div class="product_item swiper-slide">

							<?if($days < 7 ):?>
								<div class="product_item_prom">
									<div class="product_item_new" title="Новый товар">new</div>
								</div>
							<?endif;?>

							<a href="<?='/catalog/' . $arItem['IBLOCK_SECTION_ID'] . '/' . $arItem['ID'] . '/'?>" class="product_item_img"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="product img"></a>
							<a href="<?='/catalog/' . $arItem['IBLOCK_SECTION_ID'] . '/' . $arItem['ID'] . '/'?>" class="product_item_title"><?=$arItem['OFFERS'][0]['NAME']?></a>

							<div class="product_item_size">Варианты:
								<select class="select">
									<? foreach ($arItem['OFFERS'] as $arOption) : ?>
										<option data-compare="<?= $arOption['COMPARE_URL'] ?>" data-add2basket="<?= $arOption['ADD_URL'] ?>" data-price="<?= CurrencyFormat( $arOption['ITEM_PRICES'][0]['PRICE'], 'RUB' ) ?>" data-size="<?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?>"><?= $arOption['PROPERTIES']['SIZE']['VALUE'] ?> - <?= CurrencyFormat( $arOption['ITEM_PRICES'][0]['PRICE'], 'RUB' ) ?></option>
									<? endforeach; ?>
								</select>
							</div>

							<div class="product_item_price"><?= CurrencyFormat( $price['DISCOUNT_PRICE'], $curr ) ?></div>

							<div class="product_item_bottom">
								<a href="?action=ADD_TO_COMPARE_LIST&id=<?= $arItem['OFFERS'][0]['ID'] ?>" class="product_item_comparison"><i class="svg-list"></i></a>
								<a href="?action=ADD2BASKET&id=<?= $arItem['OFFERS'][0]['ID'] ?>" class="btn product_item_btn"><i class="svg-basket"></i> В корзину</a>
							</div>

						</div>

					<?endforeach;?>
					<?endif;?>

				</div>
			</div>

		</div>
	</div>
</div>