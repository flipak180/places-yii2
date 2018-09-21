<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180919_103651_place_networks
 */
class m180919_103651_place_networks extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_networks}}', [
            'id'                => Schema::TYPE_PK,
            'name'              => Schema::TYPE_STRING . ' NOT NULL',
            'alias'             => Schema::TYPE_STRING . ' NOT NULL',
            'user_id'           => Schema::TYPE_INTEGER . ' NOT NULL',
            'description'       => Schema::TYPE_TEXT,
            'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_networks}}');
    }
}
