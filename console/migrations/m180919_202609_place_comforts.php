<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180919_202609_place_comforts
 */
class m180919_202609_place_comforts extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_comforts}}', [
            'id'                => Schema::TYPE_PK,
            'place_id'          => Schema::TYPE_INTEGER . ' NOT NULL',
            'comfort_id'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_comforts}}');
    }
}
