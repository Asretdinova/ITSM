<?php

use yii\db\Migration;

/**
 * Class m191106_003524_teamDetails
 */
class m191106_003524_teamDetails extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('team', 'phone', $this->string(255)->after('category'));
        $this->addColumn('team', 'mail', $this->string(255)->after('category'));
        $this->addColumn('team', 'reception_days_ru', $this->string(255)->after('category'));
        $this->addColumn('team', 'reception_days_uz', $this->string(255)->after('category'));
        $this->addColumn('team', 'reception_days_en', $this->string(255)->after('category'));
    }
}
