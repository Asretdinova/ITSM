<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 7/28/19
 * Time: 11:33 PM
 */

use coderius\hitCounter\widgets\hitCounter\HitCounterWidget;
use imanilchaudhari\socialshare\ShareButton ;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\Menu;
use ymaker\social\share\drivers\Facebook;
use ymaker\social\share\drivers\Twitter;
use ymaker\social\share\widgets\SocialShare;
use ijackua\sharelinks\ShareLinks;

/* @var $model \common\models\Content */

$this->title = $model->title;

$this->registerLinkTag(['property' => 'og:title', 'content' => $model->title], 'og:title ');
$this->registerMetaTag(['property' => 'og:description', 'content' => strip_tags($model->content)], 'og:description');
$this->registerMetaTag(['property' => 'og:url ', 'content' =>'https://itsm.uz/uz/press-releases/view?id='.$model->id], 'og:url');
$this->registerMetaTag(['property' => 'og:image ', 'content' => 'https://itsm.uz/uploads/'.$model->image_id.'.jpg'], 'og: image');
$this->registerMetaTag(['name' => 'twitter:description', 'content' => strip_tags($model->content)]);
$this->registerMetaTag(['name' => 'twitter:image:src', 'content' => 'https://itsm.uz/uploads/'.$model->image_id.'.jpg']);

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Press releases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p class="mini_title"><?=$this->title?></p>

<div class="clearfix minimarger"></div>
<div style="display: flex">
<p class="date"><?=date('d.m.Y', strtotime($model->date)) ?></p>
<i class="fa fa-eye" style="padding-left: 10px; line-height: 1.3;margin-right: 5px;"></i><?= (int) $model->viewed?>
</div>
<img class="inner_news_image" src="<?=Yii::getAlias("@web/uploads/{$model->image_id}.jpg")?>">

<div class="text-justify">
    <?= Html::tag('p', $model->content)?>
</div>

<?= \frontend\widgets\ListGallery::widget([
    'list' => json_decode($model->images_list)
]) ?>

<div class="sharethis-inline-share-buttons" data-url="https://itsm.uz/uz/press-releases/view?id=64"> </div>
