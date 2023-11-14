<?php

use yii\db\Migration;

/**
 * Class m200312_054935_app_details
 */
class m200312_054935_app_details extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('app_details', [
            'id' => $this->primaryKey(),
            'goal_ru' => $this->text(),
            'goal_uz' => $this->text(),
            'goal_en' => $this->text(),
            'result_ru' => $this->text(),
            'result_uz' => $this->text(),
            'result_en' => $this->text(),
            'screen' => $this->string(255),
            'order' => $this->integer(),
            'category_id' => $this->integer(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('app_details');
    }
}
