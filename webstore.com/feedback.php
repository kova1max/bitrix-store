<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modultes/main/include/prolog_before.php");

$arEventsFields = array(
    "USER_NAME" => htmlspecialcharsbx($_POST['NAME']),
    "USER_EMAIL" => htmlspecialcharsbx($_POST['EMAIL']),
    "USER_PHONE" => htmlspecialcharsbx($_POST['PHONE'])
);

if(CEvent::Send('FEEDBACK', 's1', $arEventsFields, "N", "", array())){
    echo '<pre>';
    print_r("CEvent::Send -> success");
    echo '</pre>';
};
?>