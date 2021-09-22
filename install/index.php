<?

IncludeModuleLangFile(__FILE__);

use Academy\CrmStores\Entity\StoreTable;
use Bitrix\Main\Application;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Class Gitmr_D7 extends CModule
{
    const MODULE_ID = "gitmr.d7";
    var $MODULE_ID = self::MODULE_ID;
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $errors;

    function __construct()
    {
        //$arModuleVersion = array();
        $this->MODULE_VERSION = "1.0.0";
        $this->MODULE_VERSION_DATE = "16.09.2021";
        $this->MODULE_NAME = "GITMRП D7";
        $this->MODULE_DESCRIPTION = "gitmr";
    }

    function DoInstall()
    {
	global $DOCUMENT_ROOT, $APPLICATION;
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallFiles();
        \Bitrix\Main\ModuleManager::RegisterModule("gitmr.d7");
		$APPLICATION->IncludeAdminFile("Установлен модуль gitmr", __DIR__."step.php");
        return true;
    }

    function DoUninstall()
    {
	global $DOCUMENT_ROOT, $APPLICATION;
        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        \Bitrix\Main\ModuleManager::UnRegisterModule("gitmr.d7");
		$APPLICATION->IncludeAdminFile("Удален модуль gitmr", __DIR__."unstep.php");
        return true;
    }

    function InstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/gitmr.d7/install/db/install.sql");
        if (!$this->errors) {

            return true;
        } else
            return $this->errors;
    }

    function UnInstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/gitmr.D7/install/db/uninstall.sql");
        if (!$this->errors) {
            return true;
        } else
            return $this->errors;
    }

    function InstallEvents()
    {
        $eventManager = EventManager::getInstance();

        $eventManager->registerEventHandlerCompatible(
            'crm',
            'OnAfterCrmControlPanelBuild',
            self::MODULE_ID,
            'Gitmr\D7\Handler\CrmMenu',
            'addGitmr'
        );

    }

    function UnInstallEvents()
    {
        $eventManager = EventManager::getInstance();

        $eventManager->unRegisterEventHandler(
            'crm',
            'OnAfterCrmControlPanelBuild',
            self::MODULE_ID,
            'Gitmr\D7\Handler\CrmMenu',
            'addGitmr'
        );

    }

    function InstallFiles()
    {
		  $documentRoot = Application::getDocumentRoot();

        // CopyDirFiles(
            // __DIR__ . '/files/components',
            // $documentRoot . '/local/components',
            // true,
            // true
        // );

        CopyDirFiles(
            __DIR__ . '/files/pub/gitmr',
            $documentRoot . '/gitmr',
            true,
            true
        );
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx('/gitmr');
        // DeleteDirFilesEx('/local/components/gitmr.d7');

    }
}