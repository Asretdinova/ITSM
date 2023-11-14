<?php

namespace backend\controllers;

use Yii;
use common\models\ActionCards;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ActionCardsController implements the CRUD actions for ActionCards model.
 */
class ActionCardsController extends Controller
{
    /**
     * Lists all ActionCards models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ActionCards::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing ActionCards model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario(ActionCards::SCENARIO_UPDATE);

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file)
                $model->upload();

            if ($model->save())
                return $this->redirect(['index']);
            else
                return $this->render('update', [
                    'model' => $model,
                ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the ActionCards model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActionCards the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActionCards::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
