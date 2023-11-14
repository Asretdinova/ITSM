<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectCustomer */

$this->title = 'Create Project Customer';
$this->params['breadcrumbs'][] = ['label' => 'Project Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
