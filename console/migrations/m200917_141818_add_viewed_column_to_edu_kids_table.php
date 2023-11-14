<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%edu_kids}}`.
 */
class m200917_141818_add_viewed_column_to_edu_kids_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%edu_kids}}', 'viewed', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%edu_kids}}', 'viewed');
    }
}
