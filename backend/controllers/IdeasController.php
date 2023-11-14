<?php

namespace backend\controllers;

use common\models\Users;
use Yii;
use common\models\Ideas;
use backend\models\IdeasSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IdeasController implements the CRUD actions for Ideas model.
 */
class IdeasController extends Controller
{
    public $minimumRole = Users::ROLE_CONTROLLER;

    /**
     * Lists all Ideas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IdeasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andwhere(['not in', 'status', [Ideas::STATUS_NEW, Ideas::STATUS_ANNULLED]]);

        $dataProviderForUnpublished = $searchModel->search(Yii::$app->request->queryParams);
        $dataProviderForUnpublished->query->andwhere(['status' => Ideas::STATUS_NEW]);

        $dataProviderForAnnulled = $searchModel->search(Yii::$app->request->queryParams);
        $dataProviderForAnnulled->query->andwhere(['status' => Ideas::STATUS_ANNULLED]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderForUnpublished' => $dataProviderForUnpublished,
            'dataProviderForAnnulled' => $dataProviderForAnnulled,
        ]);
    }

    /**
     * Displays a single Ideas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAccept($id)
    {
        $model = Ideas::findOne(['id' => $id]);

        if (!$model)
            throw new NotFoundHttpException('Not found');

        $model->is_active = (int) true;
        $model->status = Ideas::STATUS_PROCESS;

        $model->save();

        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionReject($id)
    {
        $model = Ideas::findOne(['id' => $id]);
        $model->setScenario(Ideas::SCENARIO_REJECT);

        if (!$model)
            throw new NotFoundHttpException('Not found');


        $model->is_active = (int) true;
        $model->status = Ideas::STATUS_REJECTED;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('reject', [
            'model' => $model,
        ]);
    }

    public function actionCancel($id)
    {
        $model = Ideas::findOne(['id' => $id]);

        if (!$model)
            throw new NotFoundHttpException('Not found');

        $model->is_active = (int) false;
        $model->status = Ideas::STATUS_ANNULLED;
        $model->save();

        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionPublish($id)
    {
        $model = Ideas::findOne(['id' => $id]);

        if (!$model)
            throw new NotFoundHttpException('Not found');

        $model->is_active = (int) true;
        $model->status = Ideas::STATUS_PUBLISHED;
        $model->save();

        return $this->redirect(['view', 'id' => $id]);
    }

    /**
     * Creates a new Ideas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Ideas();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Updates an existing Ideas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing Ideas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the Ideas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ideas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ideas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
