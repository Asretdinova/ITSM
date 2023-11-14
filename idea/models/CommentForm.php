<?php

/**

 * Date: 8/23/19
 * Time: 2:52 AM
 */

namespace idea\models;

use Yii;
use common\models\Comments;

class CommentForm extends Comments
{
    public $reCaptcha;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                'uncheckedMessage' => Yii::t('main', 'Пожалуйста, подтвердите, что вы не бот'),
            ]
        ]);
    }
}