<?php

use yii\db\Migration;

/**
 * Class m191106_002739_teamCategory
 */
class m191106_002739_teamCategory extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('team', 'category', $this->integer(11)->after('is_active'));
    }
}
