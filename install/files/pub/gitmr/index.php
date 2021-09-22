<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Логирование операций с Git");
if (CModule::IncludeModule("gitmr.d7")){
    Gitmr\D7\View::get();
    }
?>
<?
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
