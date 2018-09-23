<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180923_102155_metro_stations
 */
class m180923_102155_metro_stations extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%metro_stations}}', [
            'id'            => Schema::TYPE_PK,
            'name'          => Schema::TYPE_STRING . ' NOT NULL',
            'city_id'       => Schema::TYPE_INTEGER . ' NOT NULL',
            'district_id'   => Schema::TYPE_INTEGER,
            'latitude'      => Schema::TYPE_DECIMAL . '(11, 8)',
            'longitude'     => Schema::TYPE_DECIMAL . '(11, 8)',
            'created_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%metro_stations}}');
    }
}
