<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

$aMenuLinksExt = array();

$obCache = new CPHPCache();
$cache_path = '/cache_main_custom_menu/';
$cache_id = 'IBlockMenu' . $arIBlock["ID"];

if ($obCache->InitCache('600', $cache_id, $cache_path)) {
	$vars = $obCache->GetVars();
	$res_array = $vars['res_array'];
	$obCache->Output();
} else {
	if (CModule::IncludeModule('iblock')) {
		$arFilter = array(
			"TYPE" => "catalog",
			"SITE_ID" => SITE_ID,
		);

		$dbIBlock = CIBlock::GetList(array('SORT' => 'ASC', 'ID' => 'ASC'), $arFilter);
		$dbIBlock = new CIBlockResult($dbIBlock);

		if ($arIBlock = $dbIBlock->GetNext()) {

			if (defined("BX_COMP_MANAGED_CACHE"))
				$GLOBALS["CACHE_MANAGER"]->RegisterTag("iblock_id_" . $arIBlock["ID"]);

			if ($arIBlock["ACTIVE"] == "Y") {

				$arFilter = array(
					"IBLOCK_ID" => $arIBlock['ID'],
					"ACTIVE_DATE" => "Y",
					"ACTIVE" => "Y",
					"GLOBAL_ACTIVE" => "Y",
					"CNT_ACTIVE" => "Y",
					'UF_ROLE' => $SITE_PARAMS['SECTION_ROLES']['SHOW_IN_MAIN_M']
				);

				$res = CIBlockSection::GetList(
					array("left_margin" => "asc", "sort" => "asc"),
					$arFilter,
					true,
					array("ID", "NAME", "SECTION_PAGE_URL", "DEPTH_LEVEL", 'UF_ROLE', "UF_ICON", "SORT")
				);

				$key = 0;
				while ($ob = $res->GetNext()) {

					$APPLICATION->IncludeComponent(
						"bitrix:catalog.smart.filter",
						".custom_smrtfilter",
						Array(
							"CACHE_GROUPS" => "N",
							"CACHE_TIME" => "360000",
							"CACHE_TYPE" => "A",
							"CONVERT_CURRENCY" => "N",
							"CURRENCY_ID" => $arParams['CURRENCY_ID'],
							"DISPLAY_ELEMENT_COUNT" => "N",
							"FILTER_NAME" => "",
							"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
							"GET_RESULT" => true,
							"HIDE_NOT_AVAILABLE" => "N",
							"IBLOCK_ID" => "14",
							"IBLOCK_TYPE" => "catalog",
							"INCLUDE_TEMPLATE" => false,
							"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
							"PAGER_PARAMS_NAME" => "",
							"PREFILTER_NAME" => "smartPreFilter",
							"PRICE_CODE" => array("BASE"),
							"SAVE_IN_SESSION" => "N",
							"SECTION_CODE" => "",
							"SECTION_CODE_PATH" => "",
							"SECTION_DESCRIPTION" => "DESCRIPTION",
							"SECTION_ID" => $ob['ID'],
							"SECTION_TITLE" => "NAME",
							"SEF_MODE" => "N",
							"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
							"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
							"TEMPLATE_THEME" => "",
							"XML_EXPORT" => "N"
						),
						$component,
						Array('HIDE_ICONS' => 'Y')
					);
					global $sub_menu;

					foreach ($sub_menu as $key => $arItem) {

						if($arItem['CODE'] != "SIZE"){
						
							$temp[$key] = array(
								'ID' => $ob['ID'],
								'NAME' => $arItem['NAME'],
								'DEPTH_LEVEL' => count($arItem['VALUES']) > 0 ? 2 : 1
							);
						
							foreach ($arItem['VALUES'] as $arLabel) {
								$temp[$key]['VALUES'][] = array(
									'NAME' => $arLabel['VALUE'],
									'LINK' => '/catalog/' . $ob['ID'] . '/filter/'. strtolower($arItem['CODE']) .'-is-'.$arLabel['URL_ID'].'/apply/'
								);
							};

						}

					};

					$res_array[$id_key] = array(
						0 => $ob['NAME'],
						1 =>$ob['SECTION_PAGE_URL'],
						3 => array(
							'IS_PARRENT' => '1',
							'DEPTH_LEVEL' => $ob['ELEMENT_CNT'] > 0 ? 2 : 1,
							'FROM_IBLOCK' => '1',
							'ELEMENT_CNT' => $ob['ELEMENT_CNT'],
							'UF_ROLE' => $ob['UF_ROLE'],
							'SORT' => $ob['SORT'],
							'URL' => $ob['SECTION_PAGE_URL'],
							'ID' => $ob['ID'],
							'ICON' => $ob['UF_ICON'],
							'ITEMS' => $temp
						)
					);
 
					$id_key++;
				}


				global $collection_menu_ext;
				foreach ($collection_menu_ext as $item) {
					$res_array['FILTERED'][] = array(
						0 => $item['~NAME'],
						1 => $item['SET_PAGE_URL'],
						3 => array(
							'IS_PARRENT' => '1',
							'DEPTH_LEVEL' => '1',
							'FROM_IBLOCK' => '1',
							'UF_ROLE' => $item['UF_ROLE'],
							'SORT' => $item['SORT']
						)
					);
				}

				function sort_menu($a, $b)
				{
					if ($a[3]['SORT'] == $b[3]['SORT']) {
						return 0;
					}
					return ($a[3]['SORT'] < $b[3]['SORT']) ? -1 : 1;
				};

				uasort($res_array, 'sort_menu');
			}
		}

		$obCache->EndDataCache(array("res_array" => $res_array));

		if (defined("BX_COMP_MANAGED_CACHE"))
			$GLOBALS["CACHE_MANAGER"]->RegisterTag("iblock_id_new");
	}
}

if($res_array['BASE']) unset($res_array['BASE']);

$aMenuLinksExt = $res_array;
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);