<?php
use Orm\Model;

class Model_Request extends Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'body',
		'ip',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);

	public static function validate($factory)//入力内容の検証
	{
		$val = Validation::forge($factory);//validationオブジェクトを生成
		$val->add_field('body', 'Body', 'required|max_length[255]');//具体的な検証ルール
		// $val->add_field('ip', 'Ip', 'required|max_length[255]');

		return $val;
	}

}
