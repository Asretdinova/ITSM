<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Departments */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Команда', 'url' => ['/team/index']];
$this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
