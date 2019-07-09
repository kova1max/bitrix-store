<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global	$PARAMS;
		$IBlock = 14;
?>

<!-- FIXME: БАГ ІКОНОК ТА ЛІНКІВ -->

<?if((CModule::IncludeModule("iblock")) && (!empty($arResult))):?>
	<div class="menu">
		<div class="container">
			<ul class="menu_list">
				<?foreach($arResult as $arItem):?>
					<?$sect = explode("=", (parse_url($arItem["LINK"])['query']));
					$ar_result=CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$IBlock, "ID"=>$sect[1]),false, Array("UF_ICON"));
					if($res=$ar_result->GetNext()):?>

						<?if($arItem["DEPTH_LEVEL"] > 1):?>
							<li class="menu_item">
						<a href="<?=$arItem['PARAMS']['URL']?>" class="menu_link"><i class="<?=$res["UF_ICON"];?>"></i><?=$arItem['TEXT']?></a>
						<div class="menu_submenu">
							<div class="menu_submenu_left">
								<div class="menu_submenu_item menu_submenu_item_big">
									<div class="menu_submenu_title">Матрасы по типу</div>
									<ul>
										<li><a href="#">Пружинные</a></li>
										<li><a href="#">Для диванов</a></li>
										<li><a href="#">Беспружинные</a></li>
										<li><a href="#">Детские</a></li>
										<li><a href="#">в вакуумной упаковке</a></li>
										<li><a href="#">Кокосовые</a></li>
										<li><a href="#">Высокие</a></li>
										<li><a href="#">Латексные</a></li>
										<li><a href="#">Тонкие</a></li>
									</ul>
								</div>
								<div class="menu_submenu_item menu_submenu_item_big">
									<div class="menu_submenu_title">Матрасы по бренду</div>
									<ul>
										<li><a href="#">Аскона</a></li>
										<li><a href="#">Торис</a></li>
										<li><a href="#">DreamLine</a></li>
										<li><a href="#">Perrino</a></li>
										<li><a href="#">Райтон</a></li>
										<li><a href="#">Vegas</a></li>
										<li><a href="#">Орматек</a></li>
										<li><a href="#">Lonax</a></li>
									</ul>
								</div>
								<div class="menu_submenu_item">
									<div class="menu_submenu_title">Форма матраса</div>
									<ul>
										<li><a href="#">Односпальные</a></li>
										<li><a href="#">Полуторные</a></li>
										<li><a href="#">Двуспальные</a></li>
										<li><a href="#">Кругыле матрасы</a></li>
									</ul>
								</div>
								<div class="menu_submenu_item">
									<div class="menu_submenu_title">Жесткость матрасов</div>
									<ul>
										<li><a href="#">Мягкие</a></li>
										<li><a href="#">Умерено-мягкие</a></li>
										<li><a href="#">Срнедне-жесткие</a></li>
										<li><a href="#">Жесткие</a></li>
										<li><a href="#">Очень жосткие</a></li>
									</ul>
								</div>
							</div>
							<div class="menu_submenu_right">
								<a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu_baner.jpg" alt=""></a>
							</div>
						</div>
						</li>
						<?else:?>
							<li class="menu_item"><a href="<?=$arItem['PARAMS']['URL']?>" class="menu_link"><i class="<?=$res["UF_ICON"];?>"></i><?=$arItem["TEXT"]?></a></li>
						<?endif;?>
					<?endif;?>
				<?endforeach?>
			</ul>
		</div>
	</div>
<?endif?>