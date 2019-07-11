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

// TODO: Убрать тайтл подписки на рассылки
// TODO: На главной товарам добавить свойства и отфильтровать

?>

<div class="container">
	<h1>Новости, статьи и обзоры</h1>
	<div class="catalog novosti">

		<!-- LEFT FILTER -->
		<form class="filter">

			<?foreach($arResult['SECTIONS'] as $arItem) {?>
				<?if($arItem['DEPTH_LEVEL'] == 1){?>
					<div class="filter_head"><?= $arItem['NAME'] ?> (<?= $arItem['ELEMENT_CNT'] ?>)</div>
					<div class="filter_item">

						<?foreach($arResult['SECTIONS'] as $arSection) {?>
							<?foreach($arItem['CHILDREN'] as $child) {?>
								<?if($child['ID'] == $arSection['ID']){?>

									<a href="<?= $arSection['SECTION_PAGE_URL'] ?>"><?= $arSection['NAME'] ?> <span>(<?= $arSection['ELEMENT_CNT'] ?>)</span></a>

								<?}?>
						<?}	}?>
					</div>
				<?}?>
			<?}?>

		</form>

		<!-- RIGHT CONTENT -->
		<div class="catalog_content">

			<!-- TABS -->
			<div class="cart_tabs">
				<div class="cart_tabs_nav news_tabs_nav">
					<?foreach($arResult['SECTIONS'] as $arSection) {
						
						if($arSection['TAB_ID']) {?>
							<a href="<?echo $arSection['ELEMENT_CNT'] < 1 ? '' : $arSection['SECTION_PAGE_URL'] ?>" data-tabs="<?=$arSection['TAB_ID']?>" <?echo $arSection['ELEMENT_CNT'] < 1 ? 'style="color:#989898" data-disabled="true"' : '' ?> <?echo $_REQUEST['SECTION'][0] == $arSection['SECTION_PAGE_URL'] ? 'class="active"' : '' ?>><?= $arSection['NAME'] ?></a>
					<?}}?>
				</div>

				<!-- CONTENT -->
				<div class="cart_content">
					<div class="cart_tabs_content">

						<?foreach($arResult['SECTIONS'] as $arSection) {?>
							<?if($arSection['TAB_ID']) {?>

								<div class="cart_tabs_item <?echo $_REQUEST['SECTION'][0] == $arSection['SECTION_PAGE_URL'] ? 'active' : '' ?>" data-tabs="<?= $arSection['TAB_ID'] ?>">
									

									<?$i = 0;?>
									<?foreach($arResult['ITEMS'] as $arItem) {?>

										<?foreach($arSection['CHILDREN'] as $arChild) {?>
											<?if($arItem['IBLOCK_SECTION_ID'] == $arChild['ID']) {?>

												<?
													$time = new DateTime($arItem['TIMESTAMP_X']);
												?>

												<?if($i == 0) {?>
													<h3 class="novosti_title"><?= $arChild['NAME'] ?></h3>
												<?}?>

												<div class="novosti_item_first <?echo $i != 0 ? 'second' : ''?> clearfix">
													<div class="novosti_img_wrap">
														<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
														<ul class="news_icon">
															<li><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><span class="icons-chat"></span><?=$arItem['PROPERTIES']['COMMENTS_COUNT']['VALUE']?></a></li>
															<li><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><span class="icons-visible"></span><?=$arItem['PROPERTIES']['VIEWS_COUNT']['VALUE']?></a></li>
														</ul>
													</div>
													<div class="novosti_item_first_descr">
														<span class="time"><?=$time->format('d.m.Y')?></span>
														<h4><?=$arItem['NAME']?></h4>
														<p><?=$arItem['PREVIEW_TEXT']?></p>
														<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn">Подробнее</a>
													</div>
												</div>

											<?
												
											}
										}
										$i++;
									}$i=0;?>

									<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
										<?=$arResult["NAV_STRING"]?>
									<?endif;?>
								</div>

						<?
							}
						}?>

					</div>
				</div>
			</div>


		</div>
	</div>
</div>