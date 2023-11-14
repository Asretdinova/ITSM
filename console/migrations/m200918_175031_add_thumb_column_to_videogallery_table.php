<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%videogallery}}`.
 */
class m200918_175031_add_thumb_column_to_videogallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%videogallery}}', 'thumb', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%videogallery}}', 'thumb');
    }
}
