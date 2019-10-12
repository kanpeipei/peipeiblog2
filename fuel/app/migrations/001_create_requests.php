<?php

namespace Fuel\Migrations;

class Create_requests
{
	public function up()
	{
		\DBUtil::create_table('requests', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'body' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'ip' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('requests');
	}
}