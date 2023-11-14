<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Videocategory */

$this->title = 'Create Videocategory';
$this->params['breadcrumbs'][] = ['label' => 'Videocategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videocategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
