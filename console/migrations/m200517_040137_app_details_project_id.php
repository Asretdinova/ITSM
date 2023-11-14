<?php

use yii\db\Migration;

/**
 * Class m200517_040137_app_details_priject_id
 */
class m200517_040137_app_details_project_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('app_details', 'project_id', $this->integer(11));
    }
}
