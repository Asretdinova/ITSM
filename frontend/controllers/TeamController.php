<?php

namespace frontend\controllers;


use common\models\Content;
use common\models\Departments;
use common\models\Team;

class TeamController extends Controller
{
    public function actionLeaders()
    {
        $model = Team::find()
            ->where(['is_active' => true, 'category' => [Team::CATEGORY_HEAD, Team::CATEGORY_MANAGER]])
            ->with(['info'])
            ->orderBy([
                'category' => SORT_ASC,
                'order' => SORT_ASC
            ])
            ->all();

        return $this->render('leaders', [
            'model' => $model,
            'projects' => Content::getProjectsListArray()
        ]);
    }
    public function actionView($id)
    {
        $model = Team::find()->where(['id' => $id,'is_active' => true, 'category' => [Team::CATEGORY_HEAD, Team::CATEGORY_MANAGER]])
            ->with(['info'])
            ->one();

        return $this->render('view', [
            'model' => $model,
            'projects' => Content::getProjectsListArray()
        ]);
    }
    public function actionDepartment($id)
    {
        $model = Departments::find()->where(['id' => $id])->with(["members"])->one();

        return $this->render('department', [
            'model' => $model,
            'projects' => Content::getProjectsListArray()
        ]);
    }

    public function actionDepartments()
    {
        $model = Departments::find()->with(["members"])->orderBy(['order' => SORT_ASC])->all();


        return $this->render('departments', [
            'model' => $model
        ]);
    }
}
