<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;
if (isset($templateData['TEMPLATE_THEME']))
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);

if($_REQUEST['DELETE_ALL_COMPARE'] == "Y"){
	session_start();
	$_SESSION['CATALOG_COMPARE_LIST'] = array();
}