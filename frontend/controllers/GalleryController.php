<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 8/18/19
 * Time: 4:16 PM
 */

namespace frontend\controllers;

use common\models\GalleryCategory;

class GalleryController extends Controller
{
    public function actionIndex()
    {
        $model = GalleryCategory::find()->with(['gallery'])->where(['is_active' => true])->orderBy([
            'date' => SORT_DESC,
            'id' => SORT_DESC
        ])->all();

        return $this->render('index', [
            'model' => $model
        ]);
    }
}