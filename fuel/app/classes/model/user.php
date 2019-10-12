<?php
use Orm\Model;

class Model_User extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'email',
		'password',
		'picture',
		'birthday_year',
		'birthday_month',
		'birthday_day',
		'comment',
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
		$val->add_field('name', 'Name', 'required|max_length[255]');//具体的な検証ルール
		$val->add_field('email', 'Email', 'required|max_length[255]');//具体的な検証ルール
		$val->add_field('password', 'Password', 'required|max_length[255]');//具体的な検証ルール
		$val->add_field('birthday_year', 'Birthday_year', 'required|max_length[255]');//具体的な検証ルール
		$val->add_field('birthday_month', 'Birthday_year', 'required|max_length[255]');//具体的な検証ルール
		$val->add_field('birthday_day', 'Birthday_day', 'required|max_length[255]');//具体的な検証ルール
		// $val->add_field('ip', 'Ip', 'required|max_length[255]');

		return $val;
	}
}