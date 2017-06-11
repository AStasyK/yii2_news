<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170513_112300_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->string(255)->notNull(),
            'password' => $this->string(32)->notNull(),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
