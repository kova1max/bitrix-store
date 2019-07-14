<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global	$PARAMS;
		$IBlock = 14;
?>

<?if((CModule::IncludeModule("iblock")) && (!empty($arResult))):?>
	<div class="menu">
		<div class="container">
			<ul class="menu_list">

				<?foreach($arResult as $arItem) {?>

					<? 
						unset($arItem['PARAMS']['ITEMS']['BASE']);
					?>
				
					<li class="menu_item">
						<a href="<?=$arItem['LINK']?>" class="menu_link">
							<i class="<?=$arItem['PARAMS']['ICON']?>"></i>
							<?=$arItem['TEXT']?> 
							<span>от 2 400 руб.</span>
						</a>

						<?if($arItem['PARAMS']['DEPTH_LEVEL'] > 1) {?>
							<div class="menu_submenu">

								<div class="menu_submenu_left">
									<?foreach($arItem['PARAMS']['ITEMS'] as $arVal) {?>
										<div class="menu_submenu_item <?echo count($arVal['VALUES']) > 5 ? 'menu_submenu_item_big' : ''?>">
											<div class="menu_submenu_title"><?=$arVal['NAME']?></div>

											<?if($arVal['VALUES']) {?>
												<ul>
													<?foreach($arVal['VALUES'] as $arValue) {?>
														<li><a href="<?=$arValue['LINK']?>"><?=$arValue['NAME']?></a></li>
													<?}?>
												</ul>
											<?}?>
										</div>
									<?}?>
								</div>

								<!-- BANNER -->
								<!-- <div class="menu_submenu_right">
									<a href="#"><img src="<?//=SITE_TEMPLATE_PATH?>/img/menu_baner.jpg" alt=""></a>
								</div> -->

							</div>
						<?}?>
					</li>
				
				<?}?>

			</ul>
		</div>
	</div>
<?endif?>