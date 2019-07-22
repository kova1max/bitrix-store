<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$APPLICATION->SetTitle(""); 
global $APPLICATION;
$APPLICATION->RestartBuffer();
COption::SetOptionString("catalog", "default_quantity_trace", "N");

?>
<div class="modal_5" class="modal hidden_modal">
   <div class="modal_title">Купить в один клик<a href="" class="fancybox-close"></a></div>
        
   <?$APPLICATION->IncludeComponent(
      "wisesolutions:one.click.buy",
      "ws",
      Array(
         'AJAX_MODE'=>'Y',
         "IBLOCK_TYPE" => "catalog",
         "ELEMENT_ID" => intval($_REQUEST['id']),
         "SEF_FOLDERIX" => "/catalog/",
         "ORDER_FIELDS" => array("PHONE"),
         "REQUIRED_ORDER_FIELDS" => array("PHONE"),
         "DEFAULT_PERSON_TYPE" => "1",
         "DEFAULT_DELIVERY" => "2",
         "DEFAULT_PAYMENT" => "3",
         "DEFAULT_CURRENCY" => "UAH",
         "BUY_MODE" => "ONE",
         "PRICE_ID" => "1",
         "DUPLICATE_LETTER_TO_EMAILS" => array("a", "s"),
         "INSERT_ELEMENT" => "",
         "CACHE_TYPE" => "N",
         "CACHE_TIME" => "864000",
      ),
   false
   );
   ?>

</div>

<? die(); ?>