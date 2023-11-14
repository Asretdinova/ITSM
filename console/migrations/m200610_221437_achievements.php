<?php

use yii\db\Migration;

/**
 * Class m200610_221437_achievements
 */
class m200610_221437_achievements extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('achievements', [
            'id' => $this->primaryKey(),
            'image' => $this->string(255),
            'description_ru' => $this->text(),
            'description_uz' => $this->text(),
            'description_en' => $this->text(),
            'has_content' => $this->boolean(),
            'content_ru' => $this->text(),
            'content_uz' => $this->text(),
            'content_en' => $this->text(),
            'url' => $this->text(),
            'date' => $this->date(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('achievements');
    }
}
