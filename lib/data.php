<?php
namespace Gitmr\D7;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
 
class DataTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'gitmr';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('DATA_ENTITY_ID_FIELD'),
			),
			'COMMIT' => array(
				'data_type' => 'text',
				'required' => true,
				'title' => Loc::getMessage('DATA_ENTITY_COMMIT_FIELD'),
			),
			'BRANCHE' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('DATA_ENTITY_BRANCHE_FIELD'),
			),
			'SORT' => array(
				'data_type' => 'integer',
				'title' => Loc::getMessage('DATA_ENTITY_SORT_FIELD'),
			),
			'USER_ID' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('DATA_ENTITY_USER_ID_FIELD'),
			),
			'MR_ID' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('DATA_ENTITY_MR_ID_FIELD'),
			),
			'MR_DATE' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('DATA_ENTITY_MR_DATE_FIELD'),
			),
			'TYPE' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('DATA_ENTITY_TYPE_FIELD'),
			),
			'CREATED' => array(
				'data_type' => 'datetime',
				'title' => Loc::getMessage('DATA_ENTITY_CREATED_FIELD'),
			),
		);
	}
}