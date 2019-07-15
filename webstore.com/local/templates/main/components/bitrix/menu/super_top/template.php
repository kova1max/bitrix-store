<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $PARAMS;
?>	
<?if (!empty($arResult)):?>
	<ul class="<?=$arParams['CLASS']?>">
		<?foreach($arResult as $arItem):?>
					<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endforeach?>
	</ul>
<?endif;?>