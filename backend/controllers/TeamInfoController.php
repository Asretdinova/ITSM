<?php

namespace backend\controllers;

use Yii;
use common\models\TeamInfo;
use backend\models\TeamInfoSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeamInfoController implements the CRUD actions for TeamInfo model.
 */
class TeamInfoController extends Controller
{
    public function actionIndex($member_id)
    {
        $searchModel = new TeamInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['member_id' => $member_id]);

        return $this->render('index', [
            'member_id' => $member_id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TeamInfo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $member_id)
    {
        return $this->render('view', [
            'member_id' => $member_id,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TeamInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($member_id)
    {
        $model = new TeamInfo();
        $model->member_id = $member_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'member_id' => $member_id]);
        }

        return $this->render('create', [
            'member_id' => $member_id,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TeamInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $member_id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'member_id' => $member_id,]);
        }

        return $this->render('update', [
            'member_id' => $member_id,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TeamInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TeamInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TeamInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TeamInfo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
