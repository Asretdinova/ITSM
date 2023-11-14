<?php

use yii\db\Migration;

/**
 * Class m191210_055051_edu_kids
 */
class m191210_055051_edu_kids extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('edu_kids', [
            'id' => $this->primaryKey(),
            'thumb' => $this->string(255),
            'video' => $this->string(255),
            'title_ru' => $this->string(255),
            'title_uz' => $this->string(255),
            'title_en' => $this->string(255),
            'date' => $this->dateTime(),
            'is_active' => $this->boolean()->defaultValue(true),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('edu_kids');
    }
}
