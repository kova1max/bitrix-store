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

// TODO: На главной товарам добавить свойства и отфильтровать

?>

<div class="useful">
	<div class="container container-xs">
		<div class="title_under useful_title">Полезные статьи</div>
		<div class="useful_list">

			<?$iteration = 0;?>
			<?foreach($arResult['ITEMS'] as $id => $arItem) {?>

				<?
					$date = new DateTime($arItem['DATE_CREATE']);	
				?>

				<? if($iteration > 2) break; ?>

				<?if(($iteration == 0) || ($iteration == 1)) {?>
					<div class="useful_coll">
				<?}?>

				<div class="useful_item <?echo $iteration == 0 ? 'useful_item_big' : ''?>">
					<a href="#" class="useful_item_img"><img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt=""></a>
					<div class="useful_item_content">
						<div class="useful_item_date"><i class="svg-calendar"></i>
							<?= $date->format('d.m.Y') ?>
						</div>
						<a href="" class="useful_item_title"><?= $arItem['NAME'] ?></a>
						<p><a href="#"><?= $arItem['PREVIEW_TEXT'] ?></a></p>
						<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn">Подробнее</a>
					</div>
				</div>

				<?if( ($iteration == 0) || ($iteration == 2) || ($iteration == 1) && (count($arResult['ITEMS']) == 2 ) ) {?>
					</div>
				<?}?>

				<?$iteration++;?>

			<?}?>

		</div>
	</div>
	<a href="/<?= $arResult['CODE'] ?>/" class="useful_all btn_more">Все статьи</a>
</div>
</div>