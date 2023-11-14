<?php

namespace common\models;

use frontend\models\Utils;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $icon
 * @property int $is_active
 *
 * @property Ideas $countIdeas
 * @property Ideas[] $ideas
 */
class Categories extends BaseModel
{
    const SCENARIO_UPDATE = 'update';

    public $file;
    public $title;

    public function afterFind()
    {
        $this->title = $this->{'title_' . Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en'], 'required'],
            [['is_active'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'icon'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png'],
            [['file'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['file'], 'safe', 'on' => self::SCENARIO_UPDATE],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID номер'),
            'title_ru' => Yii::t('main', 'Названия на русском'),
            'title_uz' => Yii::t('main', 'Названия на узбекском'),
            'title_en' => Yii::t('main', 'Названия на английском'),
            'icon' => Yii::t('main', 'Иконка'),
            'is_active' => Yii::t('main', 'Статус'),
            'title' => Yii::t('main', 'Названия'),
        ];
    }

    public function getCountIdeas()
    {
        return $this->hasMany(Ideas::className(), ['category_id' => 'id'])
            ->andWhere(['is_active' => true])->count();
    }

    public function getIdeas()
    {
        return $this->hasMany(Ideas::className(), ['category_id' => 'id'])->andWhere(['is_active' => true]);
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->icon = Yii::$app->security->generateRandomString(32);
            $path = Yii::getAlias("@idea/web/uploads/categories/{$this->icon}.png");
            if ($this->file->saveAs($path)) {
                $this->file = $this->icon;
                return true;
            }

            return false;
        } else {
            return false;
        }
    }

    public static function fetchData()
    {
        return ArrayHelper::map(
            self::find()->where(['is_active' => true])->all(),
            'id',
            'title'
        );
    }
}
