<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <a class="btn btn-primary pull-right" role="button" data-toggle="collapse" href="#search" aria-expanded="false"
       aria-controls="collapseExample">Поиск</a>

    <p><?=Yii::$app->getUrlManager()->createAbsoluteUrl(['/site/sign-up'])?></p>

    <div class="collapse" id="search">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'name',
            'role',
            [
                'attribute' => 'is_active',
                'value' => function($model) {
                    return ($model->is_active) ? 'Активен': 'Неактивен';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
