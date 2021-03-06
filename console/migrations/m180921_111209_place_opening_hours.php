<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180921_111209_place_opening_hours
 */
class m180921_111209_place_opening_hours extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_opening_hours}}', [
            'id'            => Schema::TYPE_PK,
            'place_id'      => Schema::TYPE_INTEGER . ' NOT NULL',
            'weekday'       => Schema::TYPE_TINYINT . ' NOT NULL',
            'hour'          => Schema::TYPE_TINYINT . ' NOT NULL',
            'created_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_opening_hours}}');
    }
}
