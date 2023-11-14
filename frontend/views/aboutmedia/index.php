<?php


use frontend\helpers\UtilHelper;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider */

$this->title = Yii::t('main', 'Mass Media About Us');
$this->params['breadcrumbs'][] = $this->title;

echo \yii\helpers\Html::tag('h1', $this->title, ['class' => 'title']);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'showHeader' => false,
    'tableOptions' => [
        'class' => 'table news_grid'
    ],
    'layout' => "{items}\n{pager}",
    'columns' => [
        [
            'attribute' => 'id',
            'value' => function ($item) {
                return "
                    <a href='" . Url::to(['/aboutmedia/view', 'id' => $item->id]) . "' class='listItem'>
                        <div class='news_image'>
                            <img src='/uploads/{$item->image_id}.jpg'>
                        </div>
                        
                        <div class='info_path'>
                            <h1>{$item->title}</h1>
                            <span class='date'>" . date('d.m.Y', strtotime($item->date)) . "</span>
                            <i class=\"fa fa-eye\" style=\"padding-left: 10px; line-height: 1.3;margin-right: 5px;\"></i> $item->viewed
                            <p>" . UtilHelper::get_words(strip_tags($item->content), 100) . "</p>
                            
                            <button class='actionButton right'>". Yii::t('main', 'Подробнее') ."</button>
                        </div>
                    </a>
                ";
            },
            'format' => 'raw',
        ],
    ],
]);
