<?php

use yii\db\Migration;

/**
 * Class m200216_200016_edu_kids_category
 */
class m200216_200016_edu_kids_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('edu_kids_category', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255),
            'title_uz' => $this->string(255),
            'title_en' => $this->string(255),
            'order' => $this->integer(11),
            'is_active' => $this->boolean()->defaultValue(true),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addColumn('edu_kids', 'category_id', $this->integer(11)->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('edu_kids_category');
    }
}
