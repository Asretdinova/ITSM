<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 7/28/19
 * Time: 4:17 PM
 */

use frontend\helpers\UtilHelper;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider  */

$this->title = Yii::t('main', 'Проекты');
$this->params['breadcrumbs'][] = $this->title;

echo \yii\helpers\Html::tag('p', $this->title, ['class' => 'title']);

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
            'value' => function($item) {
                return "
                     <a href='" . Url::to(['/projects/view', 'id' => $item->id]) . "' class='listItem'>
                        <div class='news_image'>
                            <img src='/uploads/{$item->image_id}.jpg'>
                        </div>
                        
                        <div class='info_path'>
                            <h1>{$item->title}</h1>
                            <span class='date'>" . date('d.m.Y', strtotime($item->date)) . "</span>
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
