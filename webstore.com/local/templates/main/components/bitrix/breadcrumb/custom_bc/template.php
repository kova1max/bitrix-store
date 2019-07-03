<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
if (empty($arResult))
	return "";
$str = '
			<ul class="breadcrumbs">
				<li>
					<a title="' . $arResult[0]['TITLE'] . '" href="' . $arResult[0]['LINK'] . '">
						<i class="svg-home"></i>
					</a>
				</li>
		';
$iSize = count($arResult);
for ($i = 1; $i < $iSize; $i++) {

	$t = htmlspecialcharsex($arResult[$i]['TITLE']);
	$l = htmlspecialcharsex($arResult[$i]['LINK']);
	$str .= "<li><a href='" . $l . "'>" . $t . "</a></li>";
	
}
$str .= '<li>' . $APPLICATION->sDocTitle . '</li></ul>';
return $str;
