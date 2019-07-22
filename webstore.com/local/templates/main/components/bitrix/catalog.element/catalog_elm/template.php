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
 * @var string $templateFolder
 */

$this->setFrameMode(true);

function isInCookies($i) {
	$c = json_decode($_COOKIE['USER_FAVORITES']);
	foreach($c as $e) {
		if($e == $i){
			return true;
		}

	}
	return false;
}

// GETTING HIGH LOAD PROPS

$hldata = Bitrix\Highloadblock\HighloadBlockTable::getById(18)->fetch();
$hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
$hlDataClass = $hldata['NAME'] . 'Table';

for($i=0;$i<count($arResult['PROPERTIES']['ADVANTAGES']['VALUE']);$i++){

	$arr[] = $hlDataClass::getList(array(
		'select' => array('UF_NAME', 'UF_FILE'),
		'filter' => array('UF_XML_ID' => $arResult['PROPERTIES']['ADVANTAGES']['VALUE'][$i])
	))->fetch();

}

for ($i = 0; $i < count($arr); $i++) {
	if ($i == count($arr) - 1) {
		$str .= $arr[$i]['UF_FILE'];
	} else {
		$str .= $arr[$i]['UF_FILE'] . ',';
	}
}

$res = CFile::GetList(array("FILE_SIZE" => "desc"), array("@ID" => "$str"));

$i = 0;
while ($res_arr = $res->GetNext()){
	if($i < count($arr)){
		$arr[$i]['UF_FILE'] = '/' . COption::GetOptionString("main", "upload_dir", "upload") . "/" . $res_arr["SUBDIR"] . "/" . $res_arr["FILE_NAME"];
		$i++;
	}
}

// Комплекты

Cmodule::IncludeModule('catalog');
Cmodule::IncludeModule('currency');

$elms = CCatalogProductSet::getList( 
	array(), 
	array(	
		'TYPE' => CCatalogProductSet::TYPE_SET, 
		'ITEM_ID' => $arResult['OFFERS'][2]['ID']
	), 
	false, 
	false
);

// FAVORITES

if( $_COOKIE['FAVORITES'] == 1 ){
	$favParam = "false";
} else {
	$favParam = "true";
}

if( $_REQUEST['ADD2FAVORITES'] == "true" ){

	CIBlockElement::SetPropertyValuesEx(
		$arResult['ID'], 
		false, 
		array(
			"FAVORITES" => $arResult['PROPERTIES']['FAVORITES']['VALUE']+1
		)
	);

	if(!isInCookies($arResult['ORIGINAL_PARAMETERS']['ELEMENT_ID'])) {

		$CCookie = json_decode($_COOKIE['USER_FAVORITES']);
		$CCookie[] = intval($arResult['ORIGINAL_PARAMETERS']['ELEMENT_ID']);
		$CCookie = json_encode($CCookie);
		setcookie('USER_FAVORITES', $CCookie);
		
	};

	header("Location: " . $_SERVER['REDIRECT_SCRIPT_URI']);

} 

if( $_REQUEST['ADD2FAVORITES'] == "false" ){

	CIBlockElement::SetPropertyValuesEx(
		$arResult['ID'], 
		false, 
		array(
			"FAVORITES" => $arResult['PROPERTIES']['FAVORITES']['VALUE']-1
		)

		
	);

	header("Location: " . $_SERVER['REDIRECT_SCRIPT_URI']);
}

?>

<?if($arParams['USE_AJAX'] != "Y") {?>
<div class="container">
	<?} else {?>
	<div id="modal_cart" class="modal hidden_modal" style="display: block;">
		<div class="modal_title"><?=$arResult['NAME'] . " " . $arResult['OFFERS'][0]['PROPERTIES']['SIZE']['VALUE']?> <?echo $arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'] != "" ? "(" . $arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'] . ")" : "" ?><a href="" class="fancybox-close"></a></div>
	<?}?>

	<div class="cart">
		<div class="cart_item">
			<div class="cart_gallery">
				<div class="swiper-container cart_gallery_top">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<a href="" data-fancybox-group="gallery1" class="fancybox">
								<img src="<?= $arResult['DEFAULT_PICTURE']['SRC'] ?>" title="No pictures added yet" alt="">
							</a>
						</div>
						<? if ($arResult['OFFERS'][0]['MORE_PHOTO_COUNT']) { ?>
							<? for ($i = 0; $i < $arResult['OFFERS'][0]['MORE_PHOTO_COUNT']; $i++) { ?>
								<div class="swiper-slide">
									<a href="" data-fancybox-group="gallery1" class="fancybox">
										<img src="<?= $arResult['OFFERS'][0]['MORE_PHOTO'][$i]['SRC'] ?>" alt="">
									</a>
								</div>
							<? } ?>
						<? } ?>

					</div>
					<div class="cart_gallery_zoom"><i class="svg-glass"></i></div>
				</div>

				<div class="cart_gallery_thumbs">
					<div class="swiper-container">
						<div class="swiper-wrapper">

							<div class="swiper-slide">
								<img src="<?= $arResult['DEFAULT_PICTURE']['SRC'] ?>" title="No pictures added yet" alt="">
							</div>
							<? if ($arResult['OFFERS'][0]['MORE_PHOTO_COUNT']) { ?>
								<? for ($i = 0; $i < $arResult['OFFERS'][0]['MORE_PHOTO_COUNT']; $i++) { ?>
								<div class="swiper-slide">
									<img src="<?= $arResult['OFFERS'][0]['MORE_PHOTO'][$i]['SRC'] ?>" alt="">
								</div>
								<? } ?>
							<? } ?>

						</div>
					</div>

					<div class="swiper-button-next"><i class="svg-next-2"></i></div>
					<div class="swiper-button-prev"><i class="svg-next-2"></i></div>
				</div>
			</div>
		</div>

		<div class="cart_item">
			<div class="cart_info">
				<div class="cart_info_top">

					<!-- RATING -->
					<div class="cart_info_rating">
						<?if($_COOKIE['comments_rating'] > 0) {?>
						<div class="cart_info_star">
							<?for($i = 0; $i < $_COOKIE['comments_rating']; $i++) {?>
								<i class="svg-star"></i>
							<?}?>
							<?for($i = 0; $i < 5 - $_COOKIE['comments_rating']; $i++) {?>
								<i class="svg-star-o"></i>
							<?}?>
						</div>
						<?}?>
						<a href="#" class="cart_info_reviews"><?echo $_COOKIE['comments_count'] ? $_COOKIE['comments_count'] : "0"?> отзыв(ов)</a>
					</div>

					<!-- WISH LIST -->
					<div class="cart_info_wishlist">
						<i class="svg-heart"></i>
						<span>
							<? echo $arResult['DISPLAY_PROPERTIES']['FAVORITES']['VALUE'] ? $arResult['DISPLAY_PROPERTIES']['FAVORITES']['VALUE'] : "0" ?> людей добавили 
							<a class="fancymodal2" data-src="/include/favorites.php" data-fancybox="" data-type="ajax">в избранное</a>
						</span>
					</div>

				</div>

				<div class="cart_info_middle">
					<label>Размер:</label>
					<select class="select select-catalog">

						<? if (is_array($arResult['OFFERS'][0])) : ?>
						<? foreach ($arResult['OFFERS'] as $ar) : ?>
						<option data-price="<?= $ar['MIN_PRICE']['PRINT_DISCOUNT_VALUE'] ?>" data-sale="<?= $ar['MIN_PRICE']['DISCOUNT_DIFF_PERCENT'] ?>" data-compare="<?= $ar['COMPARE_URL'] ?>" data-add2basket="<?= $ar['ADD_URL'] ?>" data-old-price="<?= $ar['MIN_PRICE']['PRINT_VALUE'] ?>" data-size="<?= $ar['PROPERTIES']['SIZE']['VALUE'] ?>"><?= $ar['PROPERTIES']['SIZE']['VALUE'] ?> - <?= $ar['PRICES']['BASE']['PRINT_VALUE'] ?></option>
						<? endforeach; ?>
						<? else : ?>
						<option>No offers added</option>
						<? endif; ?>

					</select>

					<?if($arResult['PROPERTIES']['CML2_ARTICLE']['VALUE']) {?>
						<span>Артикул <?= $arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'] ?></span>
					<?}?>
				</div>

				<div class="cart_info_bottom">
					<div class="cart_info_item">

						<? if ($arResult['OFFERS'][0]['MIN_PRICE']['DISCOUNT_DIFF_PERCENT'] != 0) : ?>

						<div class="cart_info_price-old">
							<span><?= $arResult['OFFERS'][0]['MIN_PRICE']['PRINT_VALUE'] ?></span>
							<div class="cart_info_sale">Выгода <strong><?= $arResult['OFFERS'][0]['MIN_PRICE']['DISCOUNT_DIFF_PERCENT'] ?>%</strong></div>
						</div>

						<? endif; ?>

						<div class="cart_info_price"><?= $arResult['OFFERS'][0]['MIN_PRICE']['PRINT_DISCOUNT_VALUE'] ?></div>

						<a href="<?= $arResult['OFFERS'][0]['ADD_URL'] ?>" class="btn inbasket">
							<i class="svg-basket"></i>В корзину</a>
						<a class="fancymodal2 btn_more" data-src="/include/oneclick.php?id=729" data-fancybox="" data-type="ajax">Купить в 1 клик</a>

					</div>

					<!-- RIGHT LINKS -->

					<div class="cart_info_item cart_info_tools_list">
						<a href="?ADD2FAVORITES=<?= $favParam ?>" class="favorites cart_info_tools">
							<i class="svg-heart2"></i>
							<span>В избранное</span>
						</a>

						<a href="<?= $arResult['OFFERS'][0]['COMPARE_URL'] ?>" class="cart_info_tools">
							<i class="svg-list"></i>
							<span>Сравнить</span>
						</a>

						<a href="#" class="cart_info_tools">
							<i class="svg-loss"></i>
							<span>Следить за ценой</span>
						</a>
					</div>

				</div>
			</div>

			<!-- CART PROPERTIES -->


			<div class="cart_property">

				<? for ($i = 0; $i < count($arr); $i++) : ?>

				<div class="cart_property_item">
					<div class="cart_property_img"><img src="<?= $arr[$i]['UF_FILE'] ?>" alt="CART PROPERTY IMG"></div>
					<span><?= $arr[$i]['UF_NAME'] ?></span>
				</div>

				<? endfor; ?>

			</div>

		</div>
	</div>
	

<?if($arParams['USE_AJAX'] != "Y") {?>

</div>
<?if($elms->result->num_rows) {?>

<div class="cheaper">
	<div class="container">
		<div class="title_under">Вместе дешевле</div>
		<div class="cheaper_swiper">
			<div class="swiper-container">
				<div class="swiper-wrapper">

					<? while( $set = $elms->fetch() ){ 
								$count = 0;
							?>

					<?$set = CCatalogProductSet::getSetByID( $set['SET_ID'] );?>

					<div class="swiper-slide">

						<? foreach($set['ITEMS'] as $offer) { ?>
						<?

							unset($prices);
							$product = CCatalogProduct::GetByIDEx( $offer['ITEM_ID'], false );
							$price = CCatalogProduct::GetOptimalPrice($offer['ITEM_ID'], $offer['QUANTITY'], false, "N", false);
							$outPrice = CurrencyFormat(CCatalogProduct::GetOptimalPrice($set['OWNER_ID'], $offer['QUANTITY'], false, "N", false)['DISCOUNT_PRICE'], 'RUB');

							// GETTING CALCULATED PRICE 
							$price = $price['RESULT_PRICE']['BASE_PRICE'] == $price['RESULT_PRICE']['DISCOUNT_PRICE'] ? $price['RESULT_PRICE']['BASE_PRICE'] : $price['RESULT_PRICE']['DISCOUNT_PRICE'];
							
							$product['PREVIEW_PICTURE'] = !$product['PREVIEW_PICTURE'] ? CCatalogProduct::GetByIDEx( $product['PROPERTIES']['CML2_LINK']['VALUE'], true )['PREVIEW_PICTURE'] : 0;
							$parentID = CCatalogSku::GetProductInfo($offer['ITEM_ID'])['ID'];
							$prices = array(
								'OLD_PRICE' => CurrencyFormat($price, 'RUB'),
								'DISCOUNT_PRICE' => CurrencyFormat($price - ($price * $offer['DISCOUNT_PERCENT'] / 100), 'RUB'),
								'SALE' => $offer['DISCOUNT_PERCENT']
							);

						?>

						<div class="cheaper_item">
							<a href="#" class="cheaper_item_img"><img src="<?= CFile::GetPath($product['PREVIEW_PICTURE']) ?>" alt="PRODUCT IMG"></a>
							<div class="cheaper_item_content">
								<a href="<?= '/catalog/' . $arParams['SECTION_ID'] . '/' . $parentID . '/' ?>"><?= $product['NAME'] ?></a>

								<?if($prices['SALE']):?>
								<span class="cheaper_item_old"><?= $prices['OLD_PRICE'] ?></span>
								<?endif;?>
								<span><?= $prices['DISCOUNT_PRICE'] ?></span>

							</div>
						</div>

						<?if(!$count){?>
						<div class="cheaper_item_operation">+</div>
						<?}
										$count++;
									}?>

						<div class="cheaper_item_operation">=</div>

						<div class="cheaper_item_cheaper">
							<span><?= $outPrice ?></span>
							<a href="?action=ADD2BASKET&id=<?= $set['OWNER_ID']; ?>" class="btn btn_blue">Купить комплект</a>
						</div>

					</div>

					<?}?>

				</div>
			</div>
			<div class="swiper-button-next"><i class="svg-next-2"></i></div>
			<div class="swiper-button-prev"><i class="svg-next-2"></i></div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<?}?>
<?}?>