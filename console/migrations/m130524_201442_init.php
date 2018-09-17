<?php

use yii\db\Schema;
use yii\db\Migration;
use yii\base\InvalidConfigException;
use yii\rbac\DbManager;

class m130524_201442_init extends Migration
{
    protected function getAuthManager()
    {
        $authManager = Yii::$app->getAuthManager();
        if (!$authManager instanceof DbManager) {
            throw new InvalidConfigException('You should configure "authManager" component to use database before executing this migration.');
        }
        return $authManager;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users}}', [
            'id'            => Schema::TYPE_PK,
            'email'         => Schema::TYPE_STRING . ' NOT NULL',
            'name'          => Schema::TYPE_STRING . ' NOT NULL',
            'balance'       => Schema::TYPE_DECIMAL . '(10,2) DEFAULT 0',
            'avatar'    	=> Schema::TYPE_STRING,
            'place_id'     	=> Schema::TYPE_INTEGER,
            'description'   => Schema::TYPE_TEXT,
            'auth_key'              => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash'         => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token'  => Schema::TYPE_STRING,
            'email_confirm_token'  	=> Schema::TYPE_STRING,
            'role'          => Schema::TYPE_STRING . ' NOT NULL',
            'status'        => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'    => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('email_index_unique', '{{%users}}', 'email', true);

        $time = time();
        $this->insert('{{%users}}', [
            'id'            => 1,
            'email'         => 'admin',
            'name'          => 'admin',
            'balance'       => 0,
            'auth_key'      => 'D08uUhskO3frc5t1f1G2TUOK8fQxOQ3t',
            'password_hash' => '$2y$13$KM5JdtkTlSc3aTZouDRuXevcowCQs0EljhxI2DXgeHpnzTIpVxciG', //123456
            'role'          => 'admin',
            'status'        => 10,
            'created_at'    => $time,
            'updated_at'    => $time
        ]);

        $authManager = $this->getAuthManager();
        $this->insert($authManager->itemTable, ['name' => 'admin', 'type' => 1, 'description' => 'Администратор', 'created_at' => $time, 'updated_at' => $time]);
        $this->insert($authManager->itemTable, ['name' => 'manager', 'type' => 1, 'description' => 'Менеджер', 'created_at' => $time, 'updated_at' => $time]);
        $this->insert($authManager->itemTable, ['name' => 'owner', 'type' => 1, 'description' => 'Владелец', 'created_at' => $time, 'updated_at' => $time]);
        $this->insert($authManager->itemTable, ['name' => 'user', 'type' => 1, 'description' => 'Пользователь', 'created_at' => $time, 'updated_at' => $time]);
        $this->insert($authManager->assignmentTable, ['item_name' => 'admin', 'user_id' => '1', 'created_at' => $time]);
    }

    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}
