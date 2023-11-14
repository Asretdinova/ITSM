<?php

/* @var \common\models\AppDetails[] $items */

use yii\bootstrap\Carousel;

$_items = [];

if (empty($items))
    return false;

foreach ($items as $item) {
    $detailBtn = (!empty($item->project_id))
        ? \yii\helpers\Html::a(Yii::t('main', 'Подробно'), ['/projects/view', 'id' => $item->project_id], ['class' => 'actionButton orange'])
        : null;

    $_items[] = "
        <div class='row'>
            <div class='col-md-6'>
                <h1>". Yii::t('main', 'Goal') .":</h1>
                <p>{$item->goal}</p>

                <h1>". Yii::t('main', 'Result') .":</h1>
                <p>{$item->result}</p>
                
                <br>
                {$detailBtn}
            </div>

            <div class='col-md-6'>
                <img src='". Yii::getAlias('@web/uploads/content/'. $item->screen .'.jpg') ."'>
            </div>
        </div>
    ";
}

echo Carousel::widget([
    'showIndicators' => false,
    'items' => $_items,
    'controls' => ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
    'options' => [
        'class' => 'carousel slide',
    ],
]);
