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

$arViewModeList = $arResult['VIEW_MODE_LIST'];
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID']){
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
}

$intCurrentDepth = 1;

?>

<div class="slider">
	<div class="container">
		<div class="slider_form_w">
			<div class="slider_form">
				<div class="slider_form_head">
					<div class="slider_form_title">Нужно купить</div>
					<select class="select main_select">
						<?foreach($arResult['SECTIONS'] as $arOption){?>
							<option value="<?= $arOption['ID'] ?>"><?= $arOption['NAME'] ?></option>
						<?}?>
					</select>
				</div>

				<?foreach($arResult['SECTIONS'] as $arSection){?>

					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.smart.filter",
						".main_smrtfltr",
						Array(
							"CACHE_GROUPS" => "Y",
							"CACHE_TIME" => "36000000",
							"CACHE_TYPE" => "A",
							"COMPONENT_TEMPLATE" => ".custom_smrtfilter",
							"CONVERT_CURRENCY" => "N",
							"DISPLAY_ELEMENT_COUNT" => "Y",
							"FILTER_NAME" => "arrFilter",
							"FILTER_VIEW_MODE" => "vertical",
							"HIDE_NOT_AVAILABLE" => "Y",
							"IBLOCK_ID" => "14",
							"IBLOCK_TYPE" => "catalog",
							"PAGER_PARAMS_NAME" => "arrPager",
							"PREFILTER_NAME" => "smartPreFilter",
							"PRICE_CODE" => array(0=>"BASE"),
							"SAVE_IN_SESSION" => "N",
							"SECTION_CODE" => "",
							"SECTION_DESCRIPTION" => "-",
							"SECTION_ID" => $arSection['ID'],
							"SECTION_TITLE" => "-",
							"SEF_MODE" => "Y",
							"FORM_ACTION"=>$arSection['~SECTION_PAGE_URL'],
							"SEF_RULE" => "/catalog/#SECTION_ID#/filter/#SMART_FILTER_PATH#/apply/",
							"XML_EXPORT" => "N"
						)
					);

				}?>

			</div>
			<div class="slider_nav"><i class="svg-next"></i></div>
		</div>

		<!-- TODO: CONTENT -->

		<div class="slider_content">
			<div class="slider_title">Optima Classic EVS</div>
			<ul>
				<li>ormafoam (10 мм)</li>
				<li>латексированная кокосовая койра (10 мм)</li>
				<li>спанбонд</li>
			</ul>
			<a href="" class="btn_more">Подробнее</a>
		</div>

	</div>
</div>