<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GalleryCategory */

$this->title = 'Редактировать категорию: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Галерея', 'url' => ['gallery/index']];
$this->params['breadcrumbs'][] = ['label' => 'Категории галереи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="gallery-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
