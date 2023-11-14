<?php

use yii\db\Migration;

/**
 * Class m190807_204207_categories
 */
class m190807_204207_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255)->notNull(),
            'title_uz' => $this->string(255)->notNull(),
            'title_en' => $this->string(255)->notNull(),
            'icon' => $this->string(255)->notNull(),
            'is_active' => $this->boolean()->defaultValue(true),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }
}
