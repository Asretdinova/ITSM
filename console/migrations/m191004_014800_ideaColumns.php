<?php

use yii\db\Migration;

/**
 * Class m191004_014800_ideaColumns
 */
class m191004_014800_ideaColumns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ideas', 'implementation', $this->text()->after('status'));
        $this->addColumn('ideas', 'expediency', $this->text()->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
