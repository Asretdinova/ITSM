<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Aboutmedia */

$this->title = 'Create Aboutmedia';
$this->params['breadcrumbs'][] = ['label' => 'Aboutmedia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutmedia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
