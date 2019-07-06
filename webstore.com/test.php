<?php 
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("TEST PAGE");
?>
<?
echo '<pre>';
print_r('TEST PAGE');
echo '</pre>';
?>

<?php 
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>