<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 7/28/19
 * Time: 4:15 PM
 */

namespace frontend\controllers;

use common\models\Content;
use common\models\Departments;
use common\models\Partners;
use common\models\ProjectCustomer;
use common\models\Projects;
use common\models\ProjectsCategory;
use common\models\ProjectType;
use Yii;
use yii\base\Model;
use yii\web\NotFoundHttpException;

class ProjectsController extends Controller
{
    public $type = 'projects';

    public function actionIndex()
    {
        $this->layout = 'empty';

        // $model = \common\models\AppDetails::find()->orderBy(['category_id' => SORT_ASC, 'order' => SORT_ASC])->all();

        // $categories = [
        //     1 => [
        //         'title' => Yii::t('main', 'Web-sites'),
        //         'icon' => Yii::getAlias('@web/img/tabicon1_orange.png'),
        //         'code' => 'sites',
        //         'items' => []
        //     ],
        //     2 => [
        //         'title' => Yii::t('main', 'Apps'),
        //         'icon' => Yii::getAlias('@web/img/tabicon2_orange.png'),
        //         'code' => 'apps',
        //         'items' => [],
        //     ],
        //     3 => [
        //         'title' => Yii::t('main', 'Corporate identity'),
        //         'icon' => Yii::getAlias('@web/img/tabicon3_orange.png'),
        //         'code' => 'style',
        //         'items' => [],
        //     ],
        //     4 => [
        //         'title' => Yii::t('main', 'Presentations'),
        //         'icon' => Yii::getAlias('@web/img/tabicon4_orange.png'),
        //         'code' => 'prezintation',
        //         'items' => [],
        //     ],
        //     5 => [
        //         'title' => Yii::t('main', 'Promotion'),
        //         'icon' => Yii::getAlias('@web/img/tabicon5_orange.png'),
        //         'code' => 'seo',
        //         'items' => [],
        //     ],
        // ];

        // foreach ($model as $item) {
        //     if (isset($categories[$item->category_id])) {
        //         $categories[$item->category_id]['items'][] = $item;
        //     }
        // }
        $model = ProjectType::find()->all();

        return $this->render('newIndex', [
            'model' => $model,
        ]);
    }

    public function actionInner($id)
    {
        $this->layout = 'empty';
        $model = ProjectType::find()->where(['id' => $id])->one();
        $projects=Content::find()->where(['project_type_id' => $id, 'is_active' => true, 'type' => $this->type])->all();
        return $this->render('innerIndex', [
            'model' => $model,
            'projects' => $projects
        ]);

        // return $this->render('innerIndex');
    }
    public function actionViewold($id)
    {
        $model = Content::find()->where(['id' => $id, 'is_active' => true, 'type' => $this->type])->one();

        if ($model)
            return $this->render('viewold', [
                'model' => $model,
            ]);
        else
            throw new NotFoundHttpException();
    }
    public function actionInnerview($id)
    {
        $this->layout = 'empty';
        $model = Content::find()->where(['id' => $id, 'is_active' => true, 'type' => $this->type])->one();
        $type = ProjectType::find()->where(['id' => $model->project_type_id])->one();
        $customer = ProjectCustomer::find()->where(['id' => $model->project_customer_id])->one();
        $department = Departments::find()->where(['id' => $model->department_id])->one();
        // $partner = Partners::find()->where(['id' => $model->department_id])->one();
        $list = json_decode($model->images_list);

        return $this->render('view', [
            'model' => $model,
            'type' => $type,
            'customer' => $customer,
            'department' => $department,
            'list' => $list
        ]);
        // return $this->render('view');
    }
    public function actionView($id)
    {
        $model = Content::find()->where(['id' => $id, 'is_active' => true, 'type' => $this->type])->one();

        if ($model)
            return $this->render('view', [
                'model' => $model,
            ]);
        else
            throw new NotFoundHttpException();
    }
}
