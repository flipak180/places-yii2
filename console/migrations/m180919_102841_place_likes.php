<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180919_102841_place_likes
 */
class m180919_102841_place_likes extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_likes}}', [
            'id'                => Schema::TYPE_PK,
            'place_id'          => Schema::TYPE_INTEGER . ' NOT NULL',
            'user_id'           => Schema::TYPE_INTEGER,
            'ip'                => Schema::TYPE_STRING . ' NOT NULL',
            'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_likes}}');
    }
}
