<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $code
 * @property int $no_language
 * @property string $value_ru
 * @property string $value_uz
 * @property string $value_en
 */
class Contacts extends \yii\db\ActiveRecord
{
    public $value;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    public function afterFind()
    {
        $this->value = ($this->no_language) ? $this->value_ru : $this->{'value_' .  Yii::$app->language};
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['no_language'], 'integer'],
            [['code', 'value_ru', 'value_uz', 'value_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Кодовая названия',
            'no_language' => 'Без перевода',
            'value_ru' => 'Значения на русском',
            'value_uz' => 'Значения на узбекском',
            'value_en' => 'Значения на английском',
        ];
    }
}
