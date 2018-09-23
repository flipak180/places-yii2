<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180921_111221_place_override_hours
 */
class m180921_111221_place_override_hours extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_override_hours}}', [
            'id'            => Schema::TYPE_PK,
            'place_id'      => Schema::TYPE_INTEGER . ' NOT NULL',
            'start_date'    => Schema::TYPE_DATE . ' NOT NULL',
            'end_date'      => Schema::TYPE_DATE . ' NOT NULL',
            'weekday'       => Schema::TYPE_TINYINT . ' NOT NULL',
            'open_hour'     => Schema::TYPE_TIME . ' NOT NULL',
            'close_hour'    => Schema::TYPE_TIME . ' NOT NULL',
            'closed'        => Schema::TYPE_BOOLEAN . ' NOT NULL',
            'created_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_override_hours}}');
    }
}
