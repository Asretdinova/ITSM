<?php

use yii\db\Migration;

/**
 * Class m190929_215527_ideaStatusColumn
 */
class m190929_215527_ideaStatusColumn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ideas', 'status', $this->string(64)->defaultValue('new')->after('views'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
