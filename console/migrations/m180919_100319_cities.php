<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180919_100319_cities
 */
class m180919_100319_cities extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%cities}}', [
            'id'                => Schema::TYPE_PK,
            'name'              => Schema::TYPE_STRING . ' NOT NULL',
            'alias'             => Schema::TYPE_STRING . ' NOT NULL',
            'padezh_rodit'      => Schema::TYPE_STRING . ' NOT NULL',
            'padezh_predl'      => Schema::TYPE_STRING . ' NOT NULL',
            'time_shift'        => Schema::TYPE_TINYINT,
            'seo_text'          => Schema::TYPE_TEXT,
            'latitude'          => Schema::TYPE_DECIMAL . '(11, 8)',
            'longitude'         => Schema::TYPE_DECIMAL . '(11, 8)',
            'position'          => Schema::TYPE_INTEGER . ' DEFAULT 0',
            'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%cities}}');
    }
}
