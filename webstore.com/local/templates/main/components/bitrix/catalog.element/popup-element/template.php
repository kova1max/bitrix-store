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

?>

<table class="basket_formed_list">
	<tr>
			<td class="basket_dell"><a href="/" class=""><i class="svg-cancel-o"></i></a></td>
			<td class="basket_img">
				<a href="<?=$arResult['DETAIL_PAGE_URL']?>"><img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""></a>
			</td>
			<td class="basket_name">
				<a href="<?=$arResult['DETAIL_PAGE_URL']?>"><?=$arResult['NAME']?> - <?=$arResult['OFFERS'][0]['PROPERTIES']['SIZE']['VALUE']?></a>
				<select class="select">
					<?foreach($arResult['OFFERS'] as $arOffer) {?>
						<option value=""><?=$arOffer['PROPERTIES']['SIZE']['VALUE']?></option>
					<?}?>
				</select>
			</td>
			<td class="basket_count_w">
				<div class="basket_count">
					<div class="basket_count_btn basket_count_minus">−</div>
					<input type="text" class="basket_count_val" readonly value="1">
					<div class="basket_count_btn basket_count_plus">+</div>
				</div>
			</td>
			<td class="basket_price"><?=$arResult['OFFERS'][0]['MIN_PRICE']['PRINT_DISCOUNT_VALUE']?></td>
	</tr>
</table>