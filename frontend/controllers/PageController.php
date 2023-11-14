<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 7/28/19
 * Time: 2:09 PM
 */

namespace frontend\controllers;


use common\models\Content;
use common\models\Jobs;
use common\models\Pages;
use common\models\Partners;
use common\models\Team;
use Yii;
use yii\web\HttpException;
use shirase\vote\actions\VoteAction;

class PageController extends Controller
{
    public function actionView($name)
    {
        if (in_array($name, ['partners'])) {
            $this->layout = 'titleBanner';

            $this->view->params['bannerType'] = $name;
        }

        $model = Pages::findOne([
            'code_name' => $name,
            'is_active' => true,
        ]);

        if (!empty($model))
            return $this->render('view', [
                'model' => $model
            ]);
        else
            throw new HttpException('404', Yii::t('main', 'Страница не найдено'));
    }

    public function actionAbout()
    {
        $this->layout = 'titleBanner';

        $projects = Content::find()
            ->where([
                'type' => 'projects',
                'is_active' => true
            ])
            ->limit(4)
            ->orderBy([
                'id' => SORT_DESC,
                'date' => SORT_DESC
            ])
            ->all();

        return $this->render('about', [
            'projects' => $projects,
        ]);
    }

    public function actionTeam()
    {
        $this->layout = 'titleBanner';
        $this->view->params['bannerType'] = 'team';

        $model = Team::find()
            ->where(['is_active' => true, 'category' => [Team::CATEGORY_MANAGER, Team::CATEGORY_HEAD]])
            ->orderBy(['category' => SORT_ASC])
            ->all();

        return $this->render('team', [
            'model' => $model,
        ]);
    }

    public function actionContacts()
    {
        
        return $this->render('contacts');
    }

    public function actionStructure()
    {
        return $this->render('structure');
    }

    public function actionPartners()
    {
        $this->layout = 'empty';

        $model = Partners::find()->where(['is_active' => true])->orderBy(['order' => SORT_ASC])->all();

        return $this->render('partners', [
            'model' => $model
        ]);
    }
}
