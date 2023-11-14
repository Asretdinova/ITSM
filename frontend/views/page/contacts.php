<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 2/3/20
 * Time: 12:31 AM
 */

/* @var $this \yii\web\View */

use yii\bootstrap\Html;
use yii\widgets\Menu;

$this->title = Yii::t('main', 'Контакты');

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-4">
        <?= Html::tag('p', $this->title, ['class' => 'title left']) ?>

        <div class="footerContentBig">
            <?= \frontend\widgets\FooterContacts::widget() ?>
        </div>
    </div>

    <div class="col-md-8">
        <iframe src="https://yandex.uz/map-widget/v1/-/CCQAEQfDCA" width="100%" height="500" frameborder="0" allowfullscreen="true"></iframe>
    </div>
</div>
