<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 3/2/20
 * Time: 2:44 AM
 */


/* @var $this \yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'Loyihalar');

$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/projects.css');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Raleway:wght@400;600&family=Roboto+Slab:wght@500&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

<div class="bannerBox" style="height:700px;">
    <div class="bannerContent">
        <div class="header">
            <div class="container">
                <div class="headerElements white">
                    <?= \frontend\widgets\Logo::widget([
                        'whiteLogo' => true
                    ]) ?>

                    <?= \frontend\widgets\MainRight::widget([]) ?>
                </div>
            </div>

            <?= \frontend\widgets\ResponsiveBar::widget([]) ?>
        </div>

        <div class="container">
            <div class="row" style="margin:0;">
                <div class="col-1 "></div>
                <div class="col-2 "></div>
                <div class="col-8 " style="float: right;">
                    <div class="bannerTitle">
                        <h1><?= Yii::t('main', 'Наша цель') ?></h1>
                        <h1><?= Yii::t('main', 'Развиваться и расти') ?></h1>
                    </div>
                </div>
                <div class="col-1 "></div>
            </div>
            <div class="row" style="margin:0;">
                <div class="col-2 banner_project ">
                    <div class="bannerTitle" style="align-self: flex-end;">
                        <h1><?= Yii::t('main', 'Проекты') ?></h1>
                    </div>
                </div>
                <div class="col-8 " style="float: right;">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="imageContentBox">
        <div class="item">
            <p><?= Yii::t('main', 'Основной целью Центра инноваций, технологий и стратегии является создание координационного органа по технической реализации и апробации инновационных пилотных проектов системы народного образования Республики Узбекистан.') ?></p>
            <p><?= Yii::t('main', 'Целью центра является разработка, внедрение и внедрение инновационных технологий, платформ, программных продуктов для дальнейшего развития системы народного образования') ?></p>
            <p><?= Yii::t('main', 'Навыки: ') ?></p>
            <ul style="padding-left: 5%; color: #004388">
                <li><?= Yii::t('main', 'Лидерство;') ?></li>
                <li><?= Yii::t('main', 'Профессионализм;') ?></li>
                <li><?= Yii::t('main', 'Стратегический aнализ;') ?></li>
            </ul>
            <br>
            <br>
        </div>
        <div class="item">
            <p><?= Yii::t('main', 'Миссией центра является инновационное развитие системы народного образования, внедрение современных инновационных технологий с использованием цифровых технологий, веб-платформ, программных продуктов и информационных систем, осуществление стратегического анализа и планирования дальнейшего развития сферы. Следующие аспекты составляют основные подходы к разработке:') ?></p>
            <ul style="padding-left: 5%; color: #004388;">
                <li><?= Yii::t('main', 'Стратегическое планирование;') ?></li>
                <li><?= Yii::t('main', 'Новаторские идеи;') ?></li>
                <li><?= Yii::t('main', 'Инновационные платформы;') ?></li>
                <li><?= Yii::t('main', 'Умное управление;') ?></li>
                <li><?= Yii::t('main', 'Программные решения; ') ?></li>
                <li><?= Yii::t('main', 'Аналитические исследования.') ?></li>
            </ul>
        </div>
    </div>
</div>


<div style="background-color: #f5f9ff; ">
    <div class="container contentSection noBottom">
        <p class="container darkTitle" style="color: #004388; font-size:44px; text-transform: uppercase;"><?= Yii::t('main', 'Наши проекты') ?></p>

        <div class="  adItems" style="margin-left: 5%; margin-right: 5%;">

            <?php
            foreach ($model as $item) { ?>
                <div class="elItem digital">
                    <a href="<?= Url::to(['/projects/inner', 'id' => $item->id]) ?>">
                        <h2><?= $item->title ?></h2>
                        <img src="<?= Yii::getAlias("@web/uploads/content/{$item->image_id}") ?>" alt="">
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<div class="container">
    <div class="contentSection ">
        <p class="darkTitle"><?= Yii::t('main', 'Цель центра') ?></p>

        <div class="imageContent">
            <div class="cItem">
                <img src="<?= Yii::getAlias('@web/img/digital11.png') ?>">

                <div class="info">
                    <h1><?= Yii::t('main', 'Разработка электронных платформ') ?></h1>

                    <p><?= Yii::t('main', 'Разработка и реализация инновационных платформ, программных продуктов, информационных и мультимедийных систем, технической и проектной документации, а также научно-исследовательских и аналитических работ') ?></p>
                </div>
            </div>

            <div class="cItem reversed">
                <div class="info">
                    <h1><?= Yii::t('main', 'Веб и мобильная разработка') ?></h1>

                    <p><?= Yii::t('main', 'Разработка, реализация и внедрение инновационных и цифровых технологий в системе народного образования Республики Узбекистан') ?></p>
                </div>

                <img src="<?= Yii::getAlias('@web/img/digital12.png') ?>">
            </div>

            <div class="cItem">
                <img src="<?= Yii::getAlias('@web/img/digital13.png') ?>">

                <div class="info">
                    <h1><?= Yii::t('main', 'Производство медиа материалов') ?></h1>

                    <p><?= Yii::t('main', 'Подготовка и внесении предложений по оптимизации и реинжинирингу процессов, а также внедрению новых форм услуг в системе народного образования') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="logistics">
    <?= \frontend\widgets\Partners::widget([]) ?>

</div>

<?= \frontend\widgets\FeedbackForm::widget([]) ?>

<?= \frontend\widgets\Footer::widget([]) ?>


<style>
    .phoneNum li {
        list-style-type: none !important;
        color: #fff !important;
    }
</style>