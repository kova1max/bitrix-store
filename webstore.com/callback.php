<?
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
    global $APPLICATION;
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.feedback",
    "feedback",
    Array(
        "EMAIL_TO" => "sale@webstore.com",
        "EVENT_MESSAGE_ID" => array(),
        "OK_TEXT" => "Спасибо, ваше сообщение принято.",
        "REQUIRED_FIELDS" => array(),
        "USE_CAPTCHA" => "Y"
    )
);?>