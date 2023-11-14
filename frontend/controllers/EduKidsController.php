<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 12/10/19
 * Time: 11:52 AM
 */

namespace frontend\controllers;

use common\models\EduKidsCategory;
use common\models\EduKids;

class EduKidsController extends Controller
{

    public function actionIndex()
    {
     
        $model = EduKidsCategory::find()->with(['videos'])->where(['is_active' => true])->orderBy([
            'order' => SORT_ASC
        ])->all();

        return $this->render('index', [
            'model' => $model
        ]);
    }
    public static function viewedCounter($id)
    {
        $model2=EduKids::findOne($id);
        $model2->viewed+= 1;
        return $model2->save(false);
    }

  
}