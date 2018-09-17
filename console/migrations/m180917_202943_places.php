<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180917_202943_places
 */
class m180917_202943_places extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%places}}', [
			'id'                => Schema::TYPE_PK,
			'name'              => Schema::TYPE_STRING . ' NOT NULL',
			'alias'             => Schema::TYPE_STRING . ' NOT NULL',
			'user_id'       	=> Schema::TYPE_INTEGER . ' NOT NULL',
			'city_id'       	=> Schema::TYPE_INTEGER . ' NOT NULL',
			'coordinates'       => Schema::TYPE_STRING . ' NOT NULL',
			'address'       	=> Schema::TYPE_STRING . ' NOT NULL',
			'phone'       		=> Schema::TYPE_STRING,
			'website'       	=> Schema::TYPE_STRING,
			'introtext'       	=> Schema::TYPE_TEXT,
			'description'       => Schema::TYPE_TEXT,
			'rating'       		=> Schema::TYPE_DECIMAL . '(3,2) DEFAULT 0',
			'total_views'       => Schema::TYPE_INTEGER . ' DEFAULT 0',
			'total_likes'       => Schema::TYPE_INTEGER . ' DEFAULT 0',
			'status'            => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
			'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
			'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%places}}');
	}
}
