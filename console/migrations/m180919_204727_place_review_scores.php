<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180919_204727_place_review_scores
 */
class m180919_204727_place_review_scores extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place_review_scores}}', [
            'id'                => Schema::TYPE_PK,
            'review_id'         => Schema::TYPE_INTEGER . ' NOT NULL',
            'feature'           => Schema::TYPE_SMALLINT . ' NOT NULL',
            'score'             => Schema::TYPE_DECIMAL . '(3,2) DEFAULT 0',
            'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place_review_scores}}');
    }
}
