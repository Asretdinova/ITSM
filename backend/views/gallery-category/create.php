<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GalleryCategory */

$this->title = 'Добавить категорию';
$this->params['breadcrumbs'][] = ['label' => 'Галерея', 'url' => ['gallery/index']];
$this->params['breadcrumbs'][] = ['label' => 'Категории галереи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
