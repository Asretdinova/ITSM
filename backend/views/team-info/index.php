<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $member_id integer */
/* @var $searchModel backend\models\TeamInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информация';
$this->params['breadcrumbs'][] = ['label' => 'Руководство', 'url' => ['heads/view', 'id' => $member_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create', 'member_id' => $member_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_ru',
            'title_uz',
            'title_en',
//            'description_ru:ntext',
            //'description_uz:ntext',
            //'description_en:ntext',
            //'order',
            //'date',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) use ($member_id) {
                    return \yii\helpers\Url::to([$action, 'id' => $key, 'member_id' => $member_id]);
                },
            ],
        ],
    ]); ?>


</div>
