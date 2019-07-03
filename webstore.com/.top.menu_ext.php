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
					array("ID", "NAME", "SECTION_PAGE_URL", "DEPTH_LEVEL", 'UF_ROLE', "SORT")
				);

				
				while ($ob = $res->GetNext()) {
					$url = parse_url($ob['SECTION_PAGE_URL'])['query'];
					parse_str($url, $url);

					$res_array[$key_sec] = array(
						0 => $ob['NAME'],
						1 => $ob['SECTION_PAGE_URL'],
						3 => array(
							'IS_PARRENT' => '1',
							'DEPTH_LEVEL' => $ob['ELEMENT_CNT'] > 0 ? 2 : 1,
							'FROM_IBLOCK' => '1',
							'ELEMENT_CNT' => $ob['ELEMENT_CNT'],
							'UF_ROLE' => $ob['UF_ROLE'],
							'SORT' => $ob['SORT'],
							'URL' => '/catalog/'.$url['SECTION_ID'].'/'
						)
					);

					
					$key_sec++;
				}

				global $collection_menu_ext;
				
				foreach ($collection_menu_ext as $item) {
					$res_array[] = array(
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
					print_r($item);

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

$aMenuLinksExt = $res_array;

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);


