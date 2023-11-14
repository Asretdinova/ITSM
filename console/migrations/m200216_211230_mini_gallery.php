<?php

use yii\db\Migration;

/**
 * Class m200216_211230_mini_gallery
 */
class m200216_211230_mini_gallery extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pages', 'images_list', $this->text()->after('date'));
    }
}
