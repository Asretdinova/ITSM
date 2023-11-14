<?php

/**

 * Date: 8/24/19
 * Time: 1:15 AM
 */

namespace idea\controllers;

use backend\models\IdeasSearch;
use common\models\Ideas;
use Yii;
use common\models\Categories;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    public function actionView($id)
    {
        $model = Categories::find()->where(['id' => $id, 'is_active' => true])->one();

        if (!$model)
            throw new NotFoundHttpException(Yii::t('main', 'Страница не найдена'));

        $searchModel = new IdeasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere([
            'category_id' => $id
        ]);
        $dataProvider->query->andWhere([
            'not in', 'status', [Ideas::STATUS_NEW, Ideas::STATUS_ANNULLED]
        ]);

        return $this->render('view', [
            'id' => $id,
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}