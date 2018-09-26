<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180925_230904_place_metro
 */
class m180925_230904_place_metro extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_metro}}', [
            'id'            => Schema::TYPE_PK,
            'place_id'      => Schema::TYPE_INTEGER . ' NOT NULL',
            'metro_id'      => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_metro}}');
    }
}
