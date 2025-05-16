<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 7/28/19
 * Time: 1:56 PM
 */

/* @var $this \yii\web\View */
/* @var $model \common\models\Pages */

use yii\bootstrap\Html;

$this->title = $model->title;

$this->params['breadcrumbs'][] = $this->title;
?>

<?= Html::tag('p', $this->title, ['class' => 'title']) ?>

    <div class="text-justify">
        <?= Html::tag('p', $model->content) ?>
    </div>

<?= \frontend\widgets\ListGallery::widget([
    'list' => json_decode($model->images_list)
]) ?>
