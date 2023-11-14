<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel \app\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фидбэк';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <a class="btn btn-primary pull-right" role="button" data-toggle="collapse" href="#search" aria-expanded="false"
       aria-controls="collapseExample">Поиск</a>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="collapse" id="search">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'full_name',
            'mail',
            'phone',
            'date',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>


</div>
