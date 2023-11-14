<?php

namespace backend\controllers;

use Yii;
use common\models\Contents;
use app\models\ContentSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
{
    public $type = 'news';

    public $imageSize = [
        'w' => 400,
        'h' => 400
    ];

    public $thumb = null;

    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andwhere(['type' => $this->type]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Content model.
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

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contents();
        $model->type = $this->type;

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->image_id = Yii::$app->security->generateRandomString(32);
            if ($model->upload($this->imageSize['w'], $this->imageSize['h']) && $model->save()) {
                if (!empty($this->thumb))
                    $model->upload($this->thumb['w'], $this->thumb['h'], Yii::getAlias("@frontend/web/uploads/mini"));

                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
                return $this->render('create', [
                    'model' => $model,
                ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario(Contents::SCENARIO_UPDATE);
        $model->type = $this->type;

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $model->image_id = Yii::$app->security->generateRandomString(32);
                $model->upload($this->imageSize['w'], $this->imageSize['h']);

                if (!empty($this->thumb))
                    $model->upload($this->thumb['w'], $this->thumb['h'], Yii::getAlias("@frontend/web/uploads/mini"));

                $model->file = $model->image_id;
            }

            if ($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
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
     * Deletes an existing Content model.
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
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
