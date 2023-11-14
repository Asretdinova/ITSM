<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $file
 */
class Documents extends \yii\db\ActiveRecord
{
    public $title;
    public $files;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 255],
            [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, doc, docx'],
        ];
    }
     // add ext and get extension method 
    public function afterFind()
    {
        $this->title = $this->{'name_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name Uz',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'files' => 'File',
        ];
    }
    public function upload()
    {
        if ($this->validate()) {
            $this->files->saveAs('@frontend/web/uploads/files/' . $this->files->baseName . '.' . $this->files->extension);
            return true;
        } else {
            return false;
        }
    }
 
}
