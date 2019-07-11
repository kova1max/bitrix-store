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

$date = new DateTime($arResult['TIMESTAMP_X']);
$newCount = $arResult['PROPERTIES']['VIEWS_COUNT']['VALUE']++;
$views = CIBlockElement::GetProperty($arResult['IBLOCK_ID'], $arResult['ID'], array("sort" => "asc"), Array('CODE' => 'VIEWS_COUNT'))->fetch()['VALUE'];

$views++;

CIBlockElement::SetPropertyValuesEx($arResult['ID'], false, array("VIEWS_COUNT" => $views));
?>

<div class="news-wrapper">
	<div class="container">
		<h1><?=$arResult['NAME']?></h1>
		<div class="news clearfix">
		
			<?if($arResult['DETAIL_PICTURE']){?>
				<div class="news_img left">
					<img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="">
				</div>
			<?}?>

			<span class="time"><?echo $date->format('d.m.Y')?></span>
			<p><?echo $arResult['DETAIL_TEXT']?></p>
			<div class="news_footer">
				<a href="<?=$arResult['LIST_PAGE_URL']?>" class="btn_more">Вернуться к списку новостей</a>
				<ul class="news_icon">
					<li><a href="#"><span class="icons-chat"></span><?=$_COOKIE['comments_count']?></a></li>
					<li><a href="#"><span class="icons-visible"></span><?=$arResult['PROPERTIES']['VIEWS_COUNT']['VALUE']?></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>