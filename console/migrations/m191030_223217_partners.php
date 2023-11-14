<?php

use yii\db\Migration;

/**
 * Class m191030_223217_org_links
 */
class m191030_223217_partners extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('partners', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255)->notNull(),
            'title_uz' => $this->string(255)->notNull(),
            'title_en' => $this->string(255)->notNull(),
            'logo' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull(),
            'order' => $this->integer(11),
            'is_active' => $this->boolean()->defaultValue(true),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('partners');
    }
}
