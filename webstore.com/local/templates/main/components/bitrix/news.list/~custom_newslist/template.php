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

<div class="catalog_content">

	<div class="cart_tabs">
		<div class="cart_tabs_nav">
			<?foreach($_SESSION['NEWS_TREE_ITEMS'] as $arItem) {?>
				<a href="#" data-tabs="<?=$arItem['TAB_ID']?>" <?echo $_REQUEST['TYPE'] == $arItem['TAB_ID'] ? 'class="active"' : ''?>><?=$arItem['NAME']?></a>
			<?}?>
		</div>

		<div class="cart_content">
			<div class="cart_tabs_content">

				<?foreach($arResult as $arItem) {?>
					<div class="cart_tabs_item active" data-tabs="1">
						<h3 class="novosti_title">Матрасы</h3>

						<?$c=0;?>
						<? foreach($arResult['ITEMS'] as $arItem) {?>
							<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							
							$date = new DateTime($arItem['TIMESTAMP_X']);
							$c++;
							?>
						
							<div class="novosti_item_first <?echo $c == 1 ? '' : 'second' ?> clearfix">
								<div class="novosti_img_wrap">
									<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">

									<ul class="news_icon">
										<li>
											<a href="#">
												<span class="icons-chat"></span>
												<?echo $arItem['PROPERTIES']['COMMENTS_COUNT']['VALUE'] 
												? $arItem['PROPERTIES']['COMMENTS_COUNT']['VALUE'] 
												: $arItem['PROPERTIES']['COMMENTS_COUNT']['~VALUE'] ?>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="icons-visible"></span>
												<?echo $arItem['PROPERTIES']['VIEWS_COUNT']['VALUE'] 
												? $arItem['PROPERTIES']['VIEWS_COUNT']['VALUE'] 
												: $arItem['PROPERTIES']['VIEWS_COUNT']['~VALUE'] ?>
											</a>
										</li>
									</ul>

								</div>
								<div class="novosti_item_first_descr">
									<span class="time"><?echo $date->format('Y.m.d')?></span>
									<h4><?echo $arItem['NAME']?></h4>
									<p><?echo $arItem['PREVIEW_TEXT']?></p>
									<a href="<?=$arItem['LIST_PAGE_URL'] . $arItem['DETAIL_PAGE_URL']?>" class="btn">Подробнее</a>
								</div>
							</div>

						<?}?>

						<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
							<?= $arResult["NAV_STRING"] ?>
						<?endif;?>

					</div>

				<?}?>

			</div>
		</div>
	</div>

</div>