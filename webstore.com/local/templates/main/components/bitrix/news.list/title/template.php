<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<div class="filter_head">Новости ( 250 )</div>
<div class="filter_item">
	<?foreach($arResult['ITEMS']['SECTION_ID']['INPUT'] as $arItem) {?>
			<a href="?<?=$arResult['ITEMS']['SECTION_ID']['INPUT_NAME']?>=<?=$arItem['ID']?>"><?=$arItem["SECTION"]?> <span></span></a>
	<?}?>
</div>

