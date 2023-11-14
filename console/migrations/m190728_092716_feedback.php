<?php

use yii\db\Migration;

/**
 * Class m190728_092716_feedback
 */
class m190728_092716_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(255)->notNull(),
            'mail' => $this->string(255),
            'phone' => $this->string(255),
            'text' => $this->text()->notNull(),
            'date' => $this->dateTime(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('feedback');
    }
}
