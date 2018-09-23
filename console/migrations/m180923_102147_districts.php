<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180923_102147_districts
 */
class m180923_102147_districts extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%districts}}', [
            'id'            => Schema::TYPE_PK,
            'name'          => Schema::TYPE_STRING . ' NOT NULL',
            'city_id'       => Schema::TYPE_INTEGER . ' NOT NULL',
            'seo_text'      => Schema::TYPE_TEXT,
            'created_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%districts}}');
    }
}
