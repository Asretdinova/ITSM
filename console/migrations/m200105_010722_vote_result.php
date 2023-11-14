<?php

use yii\db\Migration;

/**
 * Class m200105_010722_vote_result
 */
class m200105_010722_vote_result extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vote_result', [
            'id' => $this->primaryKey(),
            'first' => $this->string(255),
            'first_comment' => $this->text(),
            'second' => $this->string(255),
            'second_comment' => $this->text(),
            'third_comment' => $this->text(),
            'date' => $this->dateTime(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('vote_result');
    }
}
