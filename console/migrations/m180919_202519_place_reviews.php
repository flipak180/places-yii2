<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180919_202519_place_reviews
 */
class m180919_202519_place_reviews extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_reviews}}', [
            'id'                => Schema::TYPE_PK,
            'place_id'          => Schema::TYPE_INTEGER . ' NOT NULL',
            'user_id'           => Schema::TYPE_INTEGER . ' NOT NULL',
            'name'              => Schema::TYPE_STRING . ' NOT NULL',
            'text'              => Schema::TYPE_TEXT,
            'rating'            => Schema::TYPE_DECIMAL . '(3,2) DEFAULT 0',
            'status'            => Schema::TYPE_TINYINT . ' NOT NULL DEFAULT 10',
            'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_reviews}}');
    }
}
