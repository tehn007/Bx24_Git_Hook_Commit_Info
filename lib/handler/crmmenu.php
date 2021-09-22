<?php

namespace Gitmr\D7\Handler;

use Bitrix\Main\Localization\Loc;

class CrmMenu
{
    public static function addStores(&$items)
    {
        $items[] = array(
            'ID' => 'GITMR',
            'MENU_ID' => 'menu_crm_gitmr',
            'NAME' => Loc::getMessage('CRMSTORES_MENU_ITEM_STORES'),
            'TITLE' => Loc::getMessage('CRMSTORES_MENU_ITEM_STORES'),
            'URL' => '/gitmr/'
        );
    }
}