<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180919_202553_place_contacts
 */
class m180919_202553_place_contacts extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_contacts}}', [
            'id'                => Schema::TYPE_PK,
            'place_id'          => Schema::TYPE_INTEGER . ' NOT NULL',
            'type'              => Schema::TYPE_SMALLINT . ' NOT NULL',
            'value'             => Schema::TYPE_STRING . ' NOT NULL',
            'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_contacts}}');
    }
}
