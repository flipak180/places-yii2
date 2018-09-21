<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180919_224833_comforts
 */
class m180919_224833_comforts extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comforts}}', [
            'id'                => Schema::TYPE_PK,
            'name'              => Schema::TYPE_STRING . ' NOT NULL',
            'description'       => Schema::TYPE_STRING,
            'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%comforts}}');
    }
}
