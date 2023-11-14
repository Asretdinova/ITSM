<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretddinova
 * Date: 18/09/20
 * Time: 11:52 AM
 */

namespace frontend\controllers;

use Yii;
use common\models\Videocategory;
use common\models\Videogallery;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class VideoGalleryController extends Controller
{
    public function actionIndex()
    {
        $videocategory = Videocategory::find()->all();
        // $data=Videocategory::getAll();
        return $this->render('index', [
            'videocategory'=>$videocategory,
        ]);
    }
    public function actionView($id)
    {
        $videogallery = Videocategory::getVideoByCategory($id);
        $title=Videocategory::findOne($id)->title_en;

        if ($videogallery)
            return $this->render('view', [
                'videogallery' => $videogallery,
                'title'=>$title
            ]);
        else
            throw new NotFoundHttpException();
    }
    public static function viewedCounter($id)
    {
        $model2=Videogallery::findOne($id);
        $model2->seen+= 1;
        return $model2->save(false);
    }


}