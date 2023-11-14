<?php

use yii\db\Migration;

/**
 * Class m200615_202815_partners_details
 */
class m200615_202815_partners_details extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('partners', 'description_ru', $this->text());
        $this->addColumn('partners', 'description_uz', $this->text());
        $this->addColumn('partners', 'description_en', $this->text());
    }
}
