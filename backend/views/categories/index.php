<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <a class="btn btn-primary pull-right" role="button" data-toggle="collapse" href="#search" aria-expanded="false"
       aria-controls="collapseExample">Поиск</a>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="collapse" id="search">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'icon',
                'filter' => false,
                'value' => function ($mode) {
                    return Html::img(
                        "{$mode->base_idea_url}/uploads/categories/{$mode->icon}.png",
                        ['width' => 100]
                    );
                },
                'format' => 'raw',
            ],
            'id',
            'title_ru',
//            'title_uz',
//            'title_en',
            //'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
