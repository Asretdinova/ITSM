<?php

/**

 * Date: 8/24/19
 * Time: 1:25 AM
 */

namespace idea\controllers;

use backend\models\CommentsSearch;
use idea\models\CommentForm;
use idea\models\IdeaForm;
use Yii;
use common\models\Ideas;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class IdeaController extends Controller
{
    public function actionSubmit()
    {
        $idea = new IdeaForm();
        if ($idea->load(Yii::$app->request->post())) {
            $idea->presentation = UploadedFile::getInstance($idea, 'presentation');

            if ($idea->upload() && $idea->save()) {
                Yii::$app->session->setFlash('success', Yii::t('main', 'Спасибо! Ваша идея успешно отправлена. Она будет опубликована после проверки модератором!'));
                $idea = new IdeaForm();
            } else {
                $idea->addError('file', Yii::t('main', 'Ошибка загрузки файла'));
            }
        }

        return $this->render('submit', [
            'idea' => $idea,
        ]);
    }

    public function actionView($id)
    {
        $model = Ideas::find()->where(['id' => $id])->one();

        if (!$model)
            throw new NotFoundHttpException(Yii::t('main', 'Страница не найдена'));

        $model->views = ++$model->views;
        $model->save();

        $comments = new CommentsSearch();
        $dataProvider = $comments->getByCategory($model->id);

        $form = new CommentForm();
        $form->idea_id = $model->id;
        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            Yii::$app->session->setFlash('success', Yii::t('main', 'Спасибо! Ваш комментарий успешно отправлен. Мы опубликуем его после проверки модератором'));
            $form = new CommentForm();
        }

        return $this->render('view', [
            'model' => $model,
            'form' => $form,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLike($id)
    {
        if (Yii::$app->request->isAjax) {
            $model = Ideas::find()->where(['id' => $id])->one();

            if ($model) {
                $model->likes = ++$model->likes;
                $model->save();

                return json_encode(['count' => $model->likes]);
            } else
                throw new NotFoundHttpException('Not found');
        }

        throw new NotFoundHttpException('Not found');
    }
}