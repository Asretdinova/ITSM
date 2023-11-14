<?php

use yii\db\Migration;

/**
 * Class m191016_224101_references
 */
class m191016_224101_references extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('references', [
            'id' => $this->primaryKey(),
            'photo' => $this->string(255),
            'name_ru' => $this->string(255),
            'name_uz' => $this->string(255),
            'name_en' => $this->string(255),
            'position_ru' => $this->string(255),
            'position_uz' => $this->string(255),
            'position_en' => $this->string(255),
            'review_ru' => $this->text(),
            'review_uz' => $this->text(),
            'review_en' => $this->text(),
            'order' => $this->integer(11)->defaultValue(0),
            'is_active' => $this->boolean()->defaultValue(true),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('references');
    }
}
