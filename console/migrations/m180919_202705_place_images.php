<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180919_202705_place_images
 */
class m180919_202705_place_images extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_images}}', [
            'id'                => Schema::TYPE_PK,
            'place_id'          => Schema::TYPE_INTEGER . ' NOT NULL',
            'path'              => Schema::TYPE_STRING . ' NOT NULL',
            'position'          => Schema::TYPE_INTEGER,
            'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_images}}');
    }
}
