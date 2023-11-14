<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'Цифровые услуги');

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Услуги'), 'url' => ['#']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/digital_services.css');
?>

<div class="header purple">
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

<div class="breadcrumbsRow noMargin purple">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
</div>

<div class="accentBanner digitalServices">
    <div class="container">
        <h1><?= Yii::t('main', 'Цифровые услуги') ?></h1>

        <p><?= Yii::t('main', 'Внедрению новых форм услуг в системе народного образования') ?></p>
    </div>
</div>

<div class="container">
    <div class="contentSection noBottom">
        <p class="darkTitle"><?= Yii::t('main', 'IT и цифровые услуги') ?></p>

        <div class="adItems">
            <?php
            $list = [
                ['image' => Yii::getAlias('@web/img/digital1.png'), 'label' => Yii::t('main', 'Разработка ПО')],
                ['image' => Yii::getAlias('@web/img/digital2.png'), 'label' => Yii::t('main', 'Разработка веб и цифровой платформы')],
                ['image' => Yii::getAlias('@web/img/digital3.png'), 'label' => Yii::t('main', 'Разработка мобильных приложений (iOS/Android)')],
                ['image' => Yii::getAlias('@web/img/digital4.png'), 'label' => Yii::t('main', 'Разработка игр')],
                ['image' => Yii::getAlias('@web/img/digital5.png'), 'label' => Yii::t('main', 'Разработка веб-сайтов')],
                ['image' => Yii::getAlias('@web/img/digital6.png'), 'label' => Yii::t('main', 'Разработка API, биллинговых и GPS систем')],
            ];

            foreach ($list as $item) {
                echo Html::beginTag('div', ['class' => 'elItem digital']);
                echo Html::img($item['image']);
                echo Html::tag('h2', $item['label']);
                echo Html::endTag('div');
            }
            ?>
        </div>
    </div>
</div>

<div class="stagesList">
    <div class="_maskTop _maskBottom"></div>
    <div class="container">
        <h1><?= Yii::t('main', 'Этапы разработки') ?></h1>

        <div class="circlesList">
            <?php
            $stagesList = [
                ['image' => Yii::getAlias('@web/img/digital7.png'), 'label' => Yii::t('main', 'Аналитика')],
                ['image' => Yii::getAlias('@web/img/digital8.png'), 'label' => Yii::t('main', 'Креатив')],
                ['image' => Yii::getAlias('@web/img/digital9.png'), 'label' => Yii::t('main', 'Реализация')],
                ['image' => Yii::getAlias('@web/img/digital10.png'), 'label' => Yii::t('main', 'Развитие')],
            ];

            foreach ($stagesList as $index => $item) {
                echo Html::beginTag('div', ['class' => "circlesElement"]);

                $image = Html::tag('div', Html::img($item['image']), ['class' => 'imageBox']);
                $circle = Html::tag('div', $index + 1, ['class' => 'circleNum']);
                $label = Html::tag('h2', $item['label']);

                echo ($index % 2 == 0)
                    ? "{$image} {$circle} {$label}"
                    : "{$circle} {$label} {$image}";

                echo Html::endTag('div');
            }
            ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="contentSection noTop">
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

<div class="digitalPartners">
    <div class="_maskTop _maskBottom"></div>

    <?= \frontend\widgets\Partners::widget([]) ?>
</div>

<div class="digitalFeedback">
    <?= \frontend\widgets\FeedbackForm::widget([]) ?>
</div>

<div class="digitalFooter">
    <div class="_maskTop"></div>
    <?= \frontend\widgets\Footer::widget([
            'whiteLogo' => true
    ]) ?>
</div>
