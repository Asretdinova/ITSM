<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string|null $title_ru
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $description_ru
 * @property string|null $description_uz
 * @property string|null $description_en
 * @property string|null $image_id
 * @property string|null $link
 * @property string|null $images_list
 * @property string|null $logo_id
 * @property string|null $video_id
 * @property int|null $department_id
 * @property int|null $category_id
 * @property int|null $project_type_id
 * @property int|null $project_customer_id
 * @property int|null $project_partner_id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $status
 *
 * @property ProjectsCategory $category
 * @property Departments $department
 * @property ProjectCustomer $projectCustomer
 * @property ProjectPartner $projectPartner
 * @property ProjectType $projectType
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_ru', 'description_uz', 'description_en', 'images_list', 'status'], 'string'],
            [['department_id', 'category_id', 'project_type_id', 'project_customer_id', 'project_partner_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['title_ru', 'title_uz', 'title_en', 'image_id', 'link', 'logo_id', 'video_id'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectsCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['project_customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectCustomer::className(), 'targetAttribute' => ['project_customer_id' => 'id']],
            [['project_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectType::className(), 'targetAttribute' => ['project_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Title Ru',
            'title_uz' => 'Title Uz',
            'title_en' => 'Title En',
            'description_ru' => 'Description Ru',
            'description_uz' => 'Description Uz',
            'description_en' => 'Description En',
            'image_id' => 'Image ID',
            'link' => 'Link',
            'images_list' => 'Images List',
            'logo_id' => 'Logo ID',
            'video_id' => 'Video ID',
            'department_id' => 'Department ID',
            'category_id' => 'Category ID',
            'project_type_id' => 'Project Type ID',
            'project_customer_id' => 'Project Customer ID',
            'project_partner_id' => 'Project Partner ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProjectsCategory::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'department_id']);
    }

    /**
     * Gets query for [[ProjectCustomer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectCustomer()
    {
        return $this->hasOne(ProjectCustomer::className(), ['id' => 'project_customer_id']);
    }

    /**
     * Gets query for [[ProjectType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectType()
    {
        return $this->hasOne(ProjectType::className(), ['id' => 'project_type_id']);
    }
}
