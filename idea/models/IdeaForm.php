<?php

/**

 * Date: 8/23/19
 * Time: 2:52 AM
 */

namespace idea\models;

use Yii;
use common\models\Ideas;

class IdeaForm extends Ideas
{
    public $reCaptcha;
    public $presentation;

    public function rules()
    {
        return [
            [['title', 'text', 'category_id', 'mail', 'author_name', 'author_surname', 'presentation', 'implementation', 'expediency'], 'required'],
            [['mail'], 'email'],
            [['file', 'implementation', 'expediency', 'agreement', 'phone'], 'safe'],
            [['presentation'], 'file', 'extensions' => 'pptx, ppt, pdf', 'checkExtensionByMimeType' => false, 'maxSize' => 1024 * 1024 * 15],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                'uncheckedMessage' => Yii::t('main', 'Пожалуйста, подтвердите, что вы не бот'),
            ],
            [['accept_participating', 'accept_publishing'], 'integer'],
            ['agreement', 'required', 'requiredValue' => true, 'message' => Yii::t('main', 'Без соглашения невозможно отправить форму')],
            [['title', 'author_name', 'author_surname', 'mail', 'phone'], 'string', 'max' => 100],
            [['text', 'implementation', 'expediency'], 'string', 'max' => 700],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $name = Yii::$app->security->generateRandomString(16);
            $ext = $this->presentation->getExtension();
            $path = Yii::getAlias("@idea/web/uploads/files/{$name}.{$ext}");
            if ($this->presentation->saveAs($path, false)) {
                $this->file = "{$name}.{$ext}";
                return true;
            }

            return false;
        } else {
            return false;
        }
    }
}