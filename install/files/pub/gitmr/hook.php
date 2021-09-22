<?
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//X-Gitlab-Token: 4UmQryAUt7r3Nfm
?>
<?
//Массив для занесения в БД
//	$aGit = array("COMMIT","USER_ID","BRANCHE","MR_ID","MR_DATE","TYPE");
//Получение данных из JSON от сервера GIT
	$handle = fopen("php://input", "rb");
//$handle = file_get_contents('php://input');
	while (!feof($handle)) {
		$http_raw_post_data .= fread($handle, 8192);
    }  
    fclose($handle);
    $arData=json_decode($http_raw_post_data, true);
//если PUSH
    if ($arData["event_name"] == "push"){
	$branch=$arData["ref"];
	$branch=str_replace("refs/heads/", "", $branch); 
	$type=$arData["event_name"];
//Формирование массива данных на основе полученных данных
foreach($arData["commits"] as $arCommit)
{
        $message=$arCommit["message"];
	$message=utf8win1251($message);
        $timestamp=$arCommit["timestamp"];
        
	foreach($arCommit["author"] as $arAuth)
	{
	$name=$arAuth['name'];
	}
	
}
//		$aGit['COMMIT']=$arData["commits"]["title"];
//		$aGit['BRANCHE']=$branch;
//		$aGit['USER_ID']=$arData["commits"]["author"]["email"];
//		$aGit['MR_DATE']=$arData["commits"]["timestamp"];
//		$aGit['TYPE']=$arData["event_name"];
//Занесение данных в БД
		require('gitmrdbd7.php');
		$gitmrdb = new gitmrdbd7;
		$gitmrdb->insert($message,$name,$branch,$timestamp,$type);

    }
?>