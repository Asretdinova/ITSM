<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%content}}`.
 */
class m220302_022704_add_project_column_to_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content', 'main_image_id', $this->string(255)->after('type'));
        $this->addColumn('content', 'logo_id', $this->string(255)->after('type'));
        $this->addColumn('content', 'project_customer_id', $this->integer()->after('type'));
        $this->addColumn('content', 'department_id', $this->integer()->after('type'));
        $this->addColumn('content', 'project_type_id', $this->integer()->after('type'));
        $this->addColumn('content', 'content2_ru', $this->text()->after('type'));
        $this->addColumn('content', 'content2_uz', $this->text()->after('type'));
        $this->addColumn('content', 'content2_en', $this->text()->after('type'));
        $this->addColumn('content', 'content3_ru', $this->text()->after('type'));
        $this->addColumn('content', 'content3_uz', $this->text()->after('type'));
        $this->addColumn('content', 'content3_en', $this->text()->after('type'));
        $this->addColumn('content', 'video_id', $this->string(255)->after('type'));
        $this->addColumn('content', 'partner_id', $this->integer()->after('type'));
        $this->addColumn('content', 'web_link', $this->string(255)->after('type'));
        $this->addColumn('content', 'mobile_link', $this->string(255)->after('type'));
        $this->addColumn('content', 'ios_link', $this->string(255)->after('type'));
        $this->addColumn('content', 'sub_title_uz', $this->string(255)->after('type'));
        $this->addColumn('content', 'sub_title_en', $this->string(255)->after('type'));
        $this->addColumn('content', 'sub_title_ru', $this->string(255)->after('type'));

        // creates index for column `project_customer_id`
        $this->createIndex(
            'idx-content-project_customer_id',
            'content',
            'project_customer_id'
        );
        // add foreign key for table `project_customer`
        $this->addForeignKey(
            'fk-content-project_customer_id',
            'content',
            'project_customer_id',
            'project_customer',
            'id',
            'CASCADE'
        );

        // creates index for column `department_id`
        $this->createIndex(
            'idx-content-department_id',
            'content',
            'department_id'
        );
        // add foreign key for table `departments`
        $this->addForeignKey(
            'fk-content-department_id',
            'content',
            'department_id',
            'departments',
            'id',
            'CASCADE'
        );

        // creates index for column `project_type_id`
        $this->createIndex(
            'idx-content-project_type_id',
            'content',
            'project_type_id'
        );
        // add foreign key for table `project_type`
        $this->addForeignKey(
            'fk-content-project_type_id',
            'content',
            'project_type_id',
            'project_type',
            'id',
            'CASCADE'
        );
        // creates index for column `partner_id`
        $this->createIndex(
            'idx-content-partner_id',
            'content',
            'partner_id'
        );
        // add foreign key for table `partners`
        $this->addForeignKey(
            'fk-content-partner_id',
            'content',
            'partner_id',
            'partners',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         // drops foreign key for table `content`
         $this->dropForeignKey(
            'fk-content-project_customer_id',
            'content'
        );

        // drops index for column `project_customer_id`
        $this->dropIndex(
            'idx-content-project_customer_id',
            'content'
        );
         // drops foreign key for table `content`
         $this->dropForeignKey(
            'fk-content-department_id',
            'content'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            'idx-content-department_id',
            'content'
        );
         // drops foreign key for table `content`
         $this->dropForeignKey(
            'fk-content-project_type_id',
            'content'
        );

        // drops index for column `project_type_id`
        $this->dropIndex(
            'idx-content-project_type_id',
            'content'
        );
         // drops foreign key for table `content`
         $this->dropForeignKey(
            'fk-content-partner_id',
            'content'
        );

        // drops index for column `partner_id`
        $this->dropIndex(
            'idx-content-partner_id',
            'content'
        );

        $this->dropColumn('content', 'main_image_id');
        $this->dropColumn('content', 'logo_id');
        $this->dropColumn('content', 'project_customer_id');
        $this->dropColumn('content', 'department_id');
        $this->dropColumn('content', 'content2_ru');
        $this->dropColumn('content', 'content2_uz');
        $this->dropColumn('content', 'content2_en');
        $this->dropColumn('content', 'content3_ru');
        $this->dropColumn('content', 'content3_uz');
        $this->dropColumn('content', 'content3_en');
        $this->dropColumn('content', 'video_id');
        $this->dropColumn('content', 'partners_list');
        $this->dropColumn('content', 'web_link');
        $this->dropColumn('content', 'ios_link');
        $this->dropColumn('content', 'sub_title');
        $this->dropColumn('content', 'project_type_id');
        $this->dropColumn('content', 'partner_id');
    }
}
