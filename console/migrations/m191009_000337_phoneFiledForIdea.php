<?php

use yii\db\Migration;

/**
 * Class m191009_000337_phoneFiledForIdea
 */
class m191009_000337_phoneFiledForIdea extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ideas', 'phone', $this->string(255)->after('mail'));
        $this->addColumn('ideas', 'accept_participating', $this->boolean()->after('category_id'));
        $this->addColumn('ideas', 'accept_publishing', $this->boolean()->after('category_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
