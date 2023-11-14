<?php

use yii\db\Migration;

/**
 * Class m191001_222659_ideaFileColumn
 */
class m191001_222659_ideaFileColumn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ideas', 'file', $this->string(255)->after('views'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
