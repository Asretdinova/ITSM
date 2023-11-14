<?php

use common\models\Ideas;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ideas */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Отклонения идеи: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Идеи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Отклонить';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="ideas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отклонить', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
