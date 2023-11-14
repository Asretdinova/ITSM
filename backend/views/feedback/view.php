<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Фидбэк', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="feedback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'options' => [
            'class' => 'table table-striped table-bordered detail-view break-words'
        ],
        'model' => $model,
        'attributes' => [
            'id',
            'full_name',
            'mail',
            'phone',
            'text:html',
            'date',
        ],
    ]) ?>

</div>
