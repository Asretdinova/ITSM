<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 11/10/19
 * Time: 3:27 PM
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class ApplicationForm extends Model
{
    public $fullName;
    public $phone;
    public $email;
    public $cv;
    public $job_id;

    public function rules()
    {
        return [
            [['fullName', 'email', 'cv', 'job_id', 'phone'], 'required'],
            [['fullName'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['phone'], 'match', 'pattern' => '/^\+998 \d{2} \d{3}-\d{2}-\d{2}$/i', 'message' => Yii::t('main', 'Неправильный формат номера телефона')],
            [['job_id'], 'integer'],
            [['cv'], 'file', 'extensions' => 'doc, docx, pdf'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fullName' => Yii::t('main', 'Ф.И.О.'),
            'email' => Yii::t('main', 'Е-почта'),
            'phone' => Yii::t('main', 'Телефон'),
            'cv' => Yii::t('main', 'Резюме'),
        ];
    }

    public function send()
    {
        return Yii::$app->mailer->compose()
            ->setFrom('noreplay@itsm.uz')
            ->setTo(Yii::$app->params['hrMail'])
            ->setSubject('Резюме')
            ->setHtmlBody("
                <p><b>Ф.И.О.</b>: {$this->fullName}</p>
                <p><b>Е-почта</b>: {$this->email}</p>
                <p><b>Телефон</b>: {$this->phone}</p>
            ")
            ->attachContent(file_get_contents($this->cv->tempName), ['fileName' => $this->cv->name, 'contentType' => $this->cv->type])
            ->send();
    }
}