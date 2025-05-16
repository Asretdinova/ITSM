<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 8/8/19
 * Time: 4:03 AM
 */

namespace common\models;


class BaseModel extends \yii\db\ActiveRecord
{
    public $base_url = 'https://itsm.uz';
//    public $base_url = 'http://localhost:20080';
    public $base_idea_url = 'https://idea.itsm.uz';

    public static function getBaseUrl()
    {
        $model = new BaseModel();
        return $model->base_url;
    }
}
