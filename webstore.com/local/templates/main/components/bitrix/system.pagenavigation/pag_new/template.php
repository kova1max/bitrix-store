<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arResult
 * @var array $arParam
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>

<div class="catalog_more_w">
	<a href="#" class="catalog_more">Показать еще 12 товаров</a>
</div>


<ul class="pagination"><?
	$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
	$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

	if($arResult["bDescPageNumbering"] === true):

			if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
				if($arResult["bSavePage"]):
					?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">&lt;&lt;</a></li><?
				else:
					if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
						?><li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">&lt;&lt;</a></li><?
					else:
						?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">&lt;&lt;</a></li><?
					endif;
				endif;
			else:
				?><li><a>&lt;&lt;</a></li><?
			endif;


			if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
				if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
					if($arResult["bSavePage"]):
						?><li><a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">1</a></li><?
					else:
						?><li><a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a></li><?
					endif;

					if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
						?><a class="main-ui-pagination-page main-ui-pagination-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=intVal($arResult["nStartPage"] + ($arResult["NavPageCount"] - $arResult["nStartPage"]) / 2)?>">...</a><?
					endif;
				endif;
			endif;

			do
			{
				$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

				if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
					?><li class="active"><a><?=$NavRecordGroupPrint?></a></li><?
				elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
					?><li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a></li><?
				else:
					?><li <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]+1){?>class="next_active"<?}?>><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a></li><?
				endif;

				$arResult["nStartPage"]--;
			}

			while($arResult["nStartPage"] >= $arResult["nEndPage"]);

			if ($arResult["NavPageNomer"] > 1):
				if ($arResult["nEndPage"] > 1):
					if ($arResult["nEndPage"] > 2):
						?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] / 2)?>">...</a></li><?
					endif;
					?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a></li><?
				endif;
			endif;
			?>
		</ul>

		<?
			if ($arResult["bShowAll"]):
				if ($arResult["NavShowAll"]):
					?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("MAIN_UI_PAGINATION__PAGED")?></a></li><?
				else:
					?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("MAIN_UI_PAGINATION__ALL")?></a></li><?
				endif;
			endif;

			if ($arResult["NavPageNomer"] > 1):
				?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">&gt;&gt;</a></li><?
			else:
				?><li><a>&gt;&gt;</a></li><?
			endif;
			
	else:
		
			if ($arResult["NavPageNomer"] > 1):
				if($arResult["bSavePage"]):
					?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">&lt;&lt;</a></li><?
				else:
					if ($arResult["NavPageNomer"] > 2):
						?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">&lt;&lt;</a></li><?
					else:
						?><li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">&lt;&lt;</a></li><?
					endif;
				endif;
			else:
				?><li><a>&lt;&lt;</a><?
			endif;


			if ($arResult["NavPageNomer"] > 1):
				if ($arResult["nStartPage"] > 1):
					if($arResult["bSavePage"]):
						?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a></li><?
					else:
						?><li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a></li><?
					endif;

					if ($arResult["nStartPage"] > 2):
						?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">...</a></li><?
					endif;
				endif;
			endif;

			do
			{
				if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
					?><li class="active"><a><?=$arResult["nStartPage"]?></a></li><?
				elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
					?><li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a></li><?
				else:
					?><li  <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]+1){?>class="next_active"<?}?>><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a></li><?
				endif;
				$arResult["nStartPage"]++;
			}

			while($arResult["nStartPage"] <= $arResult["nEndPage"]);

			if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
				if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
					if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
						?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>">...</a></li><?
					endif;
					?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a></li><?
				endif;
			endif;

			if ($arResult["bShowAll"]):
				if ($arResult["NavShowAll"]):
					?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("MAIN_UI_PAGINATION__PAGED")?></a></li><?
				else:
					?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("MAIN_UI_PAGINATION__ALL")?></a></li><?
				endif;
			endif;

			if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
				?><li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">&gt;&gt;</a></li><?
			else:
				?><li><a>&gt;&gt;</a></li><?
			endif;
			?>
	<?
	endif;
	?></ul>