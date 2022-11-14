<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m221114_112714_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255),
            'password_hash' => $this->string(512),
            'access_token' => $this->string(1024),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
