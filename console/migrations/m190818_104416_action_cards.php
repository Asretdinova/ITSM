<?php

use yii\db\Migration;

/**
 * Class m190818_104416_action_cards
 */
class m190818_104416_action_cards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('action_cards', [
            'id' => $this->primaryKey(),
            'page_code' => $this->string(255),
            'card_id' => $this->integer(11)->defaultValue(0),
            'image' => $this->string(255),
            'about_ru' => $this->text(),
            'about_uz' => $this->text(),
            'about_en' => $this->text(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('action_cards');
    }
}
