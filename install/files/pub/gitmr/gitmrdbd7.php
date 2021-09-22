<?php

class gitmrdbd7 extends CBitrixComponent
{
    var $connection;
    var $sqlHelper;
    var $sql;
    var $A,$B;

    function __construct($component = null)
    {
        parent::__construct($component);
        $this->connection = \Bitrix\Main\Application::getConnection();
        $this->sqlHelper = $this->connection->getSqlHelper();

//Строка запроса. Выбираем все логины, активных пользователей
//        $this->sql = 'SELECT LOGIN FROM b_user WHERE ACTIVE = \''.$this->sqlHelper->forSql('Y', 1).'\' ';
    }
    /*
     * Возвращаем все значения
     */
/*
    function var1()
    {
        $recordset = $this->connection->query($this->sql);
        while ($record = $recordset->fetch())
        {
            $arResult[]=$record;
        }
        return $arResult;
    }
*/
    /*
     * Выполняем запрос, не возвращая результат, т. е. INSERT, UPDATE, DELETE
     */
    function insert($A,$B,$C,$D,$E)
    {
//        $this->connection->queryExecute('UPDATE b_user SET ACTIVE = \'N\' WHERE LOGIN=\'test\' ');//Заменить на UPDATE
//          $this->connection->queryExecute("INSERT INTO gitmr (COMMIT, USER_ID) VALUES ('$A', '$B')");
	    $this->connection->queryExecute("INSERT INTO gitmr (COMMIT, USER_ID, BRANCHE, MR_DATE, TYPE) VALUES ('$A', '$B','$C','$D','$E')");
    }

    /*
     * Модифицируем результат
     */
/*  
  function var6()
    {
        $recordset = $this->connection->query($this->sql);
        $recordset->addFetchDataModifier(
            function ($data)
            {
                $data["LOGIN"] .= ": Логин пользователя";
                return $data;
            }
        );
        while ($record = $recordset->fetch())
        {
            $arResult[]=$record;
        }
        return $arResult;
    }
    public function executeComponent()
    {
        //$this->arResult = $this->var1();

        //$this->arResult = $this->var2();

        //$this->arResult = $this->var3();

        //$this->arResult = $this->var4();

        //$this->var5();

        $this->arResult = $this->var6();

        $this->includeComponentTemplate();
    }
*/
};