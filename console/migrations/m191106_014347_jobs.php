<?php

use yii\db\Migration;

/**
 * Class m191106_014347_jobs
 */
class m191106_014347_jobs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('jobs', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255),
            'title_uz' => $this->string(255),
            'title_en' => $this->string(255),
            'description_ru' => $this->text(),
            'description_uz' => $this->text(),
            'description_en' => $this->text(),
            'apps' => $this->text(),
            'date' => $this->date(),
            'is_active' => $this->boolean()->defaultValue(true),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('jobs');
    }
}
