<?php

use yii\db\Migration;

/**
 * Class m190727_164429_pages
 */
class m190727_164429_pages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'code_name' => $this->string(255)->unique()->notNull(),
            'title_ru' => $this->string(255)->notNull(),
            'title_uz' => $this->string(255)->notNull(),
            'title_en' => $this->string(255)->notNull(),
            'content_ru' => $this->text(),
            'content_uz' => $this->text(),
            'content_en' => $this->text(),
            'date' => $this->dateTime(),
            'is_active' => $this->boolean(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pages');
    }
}
