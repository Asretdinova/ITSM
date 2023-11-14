<?php

use yii\db\Migration;

/**
 * Class m190807_204313_comments
 */
class m190807_204313_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'author_name' => $this->string(255),
            'author_surname' => $this->string(255),
            'mail' => $this->string(255),
            'comment' => $this->text()->notNull(),
            'date' => $this->dateTime(),
            'idea_id' => $this->integer(11),
            'is_active' => $this->boolean()->defaultValue(false),
            'user_details' => $this->text(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comments');
    }
}
