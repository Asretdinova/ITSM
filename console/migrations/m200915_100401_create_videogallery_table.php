<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%videogallery}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%videocategory}}`
 */
class m200915_100401_create_videogallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%videogallery}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'date' => $this->date(),
            'seen' => $this->integer(),
            'video' => $this->string(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-videogallery-category_id}}',
            '{{%videogallery}}',
            'category_id'
        );

        // add foreign key for table `{{%videocategory}}`
        $this->addForeignKey(
            '{{%fk-videogallery-category_id}}',
            '{{%videogallery}}',
            'category_id',
            '{{%videocategory}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%videocategory}}`
        $this->dropForeignKey(
            '{{%fk-videogallery-category_id}}',
            '{{%videogallery}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-videogallery-category_id}}',
            '{{%videogallery}}'
        );

        $this->dropTable('{{%videogallery}}');
    }
}
