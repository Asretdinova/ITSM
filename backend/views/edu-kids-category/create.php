<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EduKidsCategory */

$this->title = 'Добавить категорию Edu Kids';
$this->params['breadcrumbs'][] = ['label' => 'Edu Kids', 'url' => ['edu-kids/index']];
$this->params['breadcrumbs'][] = ['label' => 'Категории Edu Kids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-kids-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
