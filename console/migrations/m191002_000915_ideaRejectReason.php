<?php

use yii\db\Migration;

/**
 * Class m191002_000915_ideaRejectReason
 */
class m191002_000915_ideaRejectReason extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ideas', 'reason', $this->text()->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
