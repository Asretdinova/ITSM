<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%project_type}}`.
 */
class m220324_042023_add_main_image_id_column_to_project_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('project_type', 'main_image_id', $this->string(255));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('project_type', 'main_image_id');
    }
}
