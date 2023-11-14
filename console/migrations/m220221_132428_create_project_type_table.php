<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_type}}`.
 */
class m220221_132428_create_project_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project_type', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255),
            'title_uz' => $this->string(255),
            'title_en' => $this->string(255),
            'description_ru' => $this->text(),
            'description_uz' => $this->text(),
            'description_en' => $this->text(),
            'image_id' => $this->string(255),
            'main_image_id' => $this->string(255),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('project_type');
    }
}
