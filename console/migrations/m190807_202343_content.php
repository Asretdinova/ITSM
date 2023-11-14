<?php

use yii\db\Migration;

/**
 * Class m190807_202343_content
 */
class m190807_202343_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('content', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255)->notNull(),
            'title_uz' => $this->string(255)->notNull(),
            'title_en' => $this->string(255)->notNull(),
            'content_ru' => $this->text(),
            'content_uz' => $this->text(),
            'content_en' => $this->text(),
            'date' => $this->dateTime(),
            'image_id' => $this->string(255)->notNull(),
            'category_id' => $this->string(100),
            'type' => 'ENUM("news", "events", "projects", "history")',
            'is_active' => $this->boolean()->defaultValue(false),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('content');
    }
}
