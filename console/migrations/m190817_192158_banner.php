<?php

use yii\db\Migration;

/**
 * Class m190817_192158_banner
 */
class m190817_192158_banner extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('banners', [
            'id' => $this->primaryKey(),
            'image' => $this->string(255),
            'title_ru' => $this->string(255),
            'title_uz' => $this->string(255),
            'title_en' => $this->string(255),
            'description_ru' => $this->string(255),
            'description_uz' => $this->string(255),
            'description_en' => $this->string(255),
            'order' => $this->integer(11)->defaultValue(0),
            'is_active' => $this->boolean()->defaultValue(true),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('banners');
    }
}
