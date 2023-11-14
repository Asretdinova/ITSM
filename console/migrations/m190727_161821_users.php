<?php

use yii\db\Migration;

/**
 * Class m190727_161821_users
 */
class m190727_161821_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'password' => $this->string(255)->notNull(),
            'name' => $this->string(255)->notNull(),
            'role' => 'ENUM("user", "admin", "controller", "content_manager")',
            'is_active' => $this->boolean()->defaultValue(false),
            'registration_date' => $this->dateTime()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
