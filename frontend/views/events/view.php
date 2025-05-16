<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 7/28/19
 * Time: 11:33 PM
 */

use yii\bootstrap\Html;

/* @var $model \common\models\Content */

$this->title = $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'События'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<p class="mini_title"><?=$this->title?></p>
<div class="clearfix minimarger"></div>
<p class="date"><?=date('d.m.Y', strtotime($model->date)) ?></p>

<img class="inner_news_image" src="<?=Yii::getAlias("@web/uploads/{$model->image_id}.jpg")?>">

<div class="text-justify">
    <?= Html::tag('p', $model->content)?>
</div>

<?= \frontend\widgets\ListGallery::widget([
    'list' => json_decode($model->images_list)
]) ?>

