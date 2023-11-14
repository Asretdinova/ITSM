<?php

use yii\db\Migration;

/**
 * Class m190807_204300_ideas
 */
class m190807_204300_ideas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ideas', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'author_name' => $this->string(255),
            'author_surname' => $this->string(255),
            'mail' => $this->string(255),
            'date' => $this->dateTime(),
            'likes' => $this->integer(11)->defaultValue(0),
            'views' => $this->integer(11)->defaultValue(0),
            'category_id' => $this->integer(11)->notNull(),
            'is_active' => $this->boolean()->defaultValue(false),
            'user_details' => $this->text(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ideas');
    }
}
