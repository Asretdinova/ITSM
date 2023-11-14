<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\VoteResult */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vote Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vote-result-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'first',
                'label' => 1
            ],
            [
                'attribute' => 'first_comment',
                'label' => '1 comment',
                'format' => 'text'
            ],
            [
                'attribute' => 'second',
                'label' => 2
            ],
            [
                'attribute' => 'second_comment',
                'label' => '2 comment',
                'format' => 'text'
            ],
            [
                'attribute' => 'third_comment',
                'label' => 3,
                'format' => 'text'
            ],
            'date',
        ],
    ]) ?>

</div>
