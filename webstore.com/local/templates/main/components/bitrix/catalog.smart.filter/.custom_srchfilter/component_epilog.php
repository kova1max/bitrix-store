<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;
CJSCore::Init(array('fx', 'popup'));

if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}

global $sub_menu;

if($arParams['GET_RESULT'] == true) $sub_menu = $arResult['ITEMS'];
?>