<?php

use yii\db\Migration;

/**
 * Class m190904_193149_contacts
 */
class m190904_193149_contacts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contacts', [
            'id' => $this->primaryKey(),
            'code' => $this->string(255),
            'no_language' => $this->boolean(),
            'value_ru' => $this->string(255),
            'value_uz' => $this->string(255),
            'value_en' => $this->string(255),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contacts');
    }
}
