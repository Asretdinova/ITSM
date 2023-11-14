<?php

use yii\db\Migration;

/**
 * Class m200609_220317_team_info_and_departments
 */
class m200609_220317_team_info_and_departments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('team_info', [
            'id' => $this->primaryKey(),
            'member_id' => $this->integer(11)->notNull(),
            'title_ru' => $this->string(255),
            'title_uz' => $this->string(255),
            'title_en' => $this->string(255),
            'description_ru' => $this->text(),
            'description_uz' => $this->text(),
            'description_en' => $this->text(),
            'order' => $this->integer(11),
            'date' => $this->dateTime(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createTable('departments', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255),
            'title_uz' => $this->string(255),
            'title_en' => $this->string(255),
            'icon' => $this->string(255),
            'order' => $this->integer(11),
            'date' => $this->dateTime(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('team_info');
        $this->dropTable('departments');
    }
}
