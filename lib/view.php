<?php

namespace Gitmr\D7;

use Gitmr\D7\DataTable;

class View{

    public static function get() {
        $result = DataTable::getList(
                        array(
                            'select' => array('*')
        ));
        
        while ($row = $result->fetch())
        {
        print "<pre>"; print_r($row); print "</pre>";
        }
        return $row;
    }

}
