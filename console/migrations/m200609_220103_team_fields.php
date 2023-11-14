<?php

use yii\db\Migration;

/**
 * Class m200609_220103_team_fields
 */
class m200609_220103_team_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('team', 'projects_list', $this->text());
        $this->addColumn('team', 'department_id', $this->integer(11));
    }
}
