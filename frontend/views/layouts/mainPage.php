<?php

/* @var $this \yii\web\View */

/* @var $content string */

/* @var $events string */

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= Yii::getAlias("@web/favicon.png") ?>">
    <?php $this->registerCsrfMetaTags() ?>

    <title><?= ($this->title) ? Html::encode($this->title) : Yii::t('main', 'Центр инновации, технологии и стратегии') ?></title>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(73508533, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/73508533" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <?= \frontend\widgets\FixedMenu::widget() ?>

    <div class="header main">
        <div class="container">
            <div class="headerElements">
                <div class="logo">
                    <a href="<?= \yii\helpers\Url::to(['/']) ?>">
                        <img src="<?= Yii::getAlias("@web/img/xtv_logo.png") ?>" style="width:100px; margin-right:10px;">
                    </a>
                </div>
                <?= \frontend\widgets\Logo::widget([]) ?>

                <?= \frontend\widgets\MainRight::widget([]) ?>
            </div>

            <?= \frontend\widgets\MainSlider::widget([]) ?>
        </div>

        <?= \frontend\widgets\ResponsiveBar::widget([]) ?>
    </div>
    <div class="container">
        <div class="roundBoxContent">
            <div class="textBox">
                <h1 class="boldTitle" style="font-size: 30px;"><?= Yii::t('main', 'ОТЧЕТ И КОРПОРАТИВНЫЙ ПРОФИЛЬ ЦЕНТРА ИННОВАЦИЙ, ТЕХНОЛОГИЙ И СТРАТЕГИЙ В 2018-2021 ГГ.') ?></h1>

                <p><?= Yii::t('main', 'Проекты, реализуемые ITSM в 2018-2021 годах, направлены на цифровизацию и автоматизацию процессов управления системой народного образования Узбекистана и внедрение инновационных подходов, платформ и систем для расширения возможностей преподавателей и учащихся.') ?></p>
                <?php if (Yii::$app->language == "uz") { ?>
                    <a href="<?= Yii::getAlias("@web/uz.pdf") ?>" target="_blank" class="actionButton orange">
                        <?= Yii::t('main', 'Скачать PDF') ?>
                    </a>
                <?php } elseif (Yii::$app->language == "ru") { ?>
                    <a href="<?= Yii::getAlias("@web/ru.pdf") ?>" target="_blank" class="actionButton orange">
                        <?= Yii::t('main', 'Скачать PDF') ?>
                    </a>
                <?php } else { ?>
                    <a href="<?= Yii::getAlias("@web/en.pdf") ?>" target="_blank" class="actionButton orange">
                        <?= Yii::t('main', 'Скачать PDF') ?>
                    </a>
                <?php }; ?>

            </div>

            <div class="roundContent dark">
                <?php if (Yii::$app->language == "uz") { ?>
                    <img class="fullImg" src="<?= Yii::getAlias("@web/img/pdf_uz.jpg") ?>">

                <?php } elseif (Yii::$app->language == "ru") { ?>
                    <img class="fullImg" src="<?= Yii::getAlias("@web/img/pdf_ru.jpg") ?>">

                <?php } else { ?>
                    <img class="fullImg" src="<?= Yii::getAlias("@web/img/pdf_en.jpg") ?>">

                <?php }; ?>
            </div>
        </div>

    </div>
    <div class="contentBox">
        <div class="container">
            <div class="roundBoxContent mainRound">
                <div class="roundContent">
                    <div class="textContent">
                        <div class="row">
                            <div class="col-xs-6">
                                <img class="round_logo" src="<?= Yii::getAlias("@web/img/vertical_logo.png") ?>">
                            </div>
                            <div class="col-xs-6">
                                <img src="<?= Yii::getAlias("@web/img/like.png") ?>">
                                <h1><?= Yii::t('main', 'Миссия') ?></h1>
                                <p><?= Yii::t('main', 'Развитие системы народного образования') ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <img src="<?= Yii::getAlias("@web/img/target.png") ?>">
                                <h1><?= Yii::t('main', 'Цель') ?></h1>
                                <p><?= Yii::t('main', 'Разработка и реализация инновационных технологий') ?></p>
                            </div>
                            <div class="col-xs-6">
                                <img src="<?= Yii::getAlias("@web/img/education.png") ?>">
                                <h1><?= Yii::t('main', 'Навыки') ?></h1>
                                <p><?= Yii::t('main', 'Лидерство, профессионализм, новаторство') ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="aboutBox text-right">
                    <h1 class="boldTitle right"><?= Yii::t('main', 'О нас') ?></h1>

                    <p><?= Yii::t('main', 'Основной целью деятельности Центра инновации, технологии и стратегии является создание координирующего органа для технической реализации и пилотирования проектов инновационного развития системы народного образования в Республике Узбекистан. Внедрение цифровых инновационных технологий, веб-платформ, программных продуктов и информационных систем, проведение стратегического анализа и планирования дальнейшего развития отрасли') ?></p>
                    
                </div>

            </div>

            <?= \frontend\widgets\ProjectsList::widget([]) ?>

            <?= \frontend\widgets\EduKids::widget([]) ?>
        </div>
    </div>

    <div class="container">
        <div class="roundBoxContent">
            <div class="textBox">
                <h1 class="boldTitle"><?= Yii::t('main', 'Наши дети достойны лучшего будущего!') ?></h1>

                <h2><?= Yii::t('main', 'Подай идею прямо сейчас!') ?></h2>
                <p><?= Yii::t('main', 'Отправляйте свои идеи и предложения для развития сферы народного образования. После проверки модератором они будут размещены на Портале. Каждая идея и предложение будет рассмотрено специальной комиссией') ?></p>

                <a href="https://idea.itsm.uz/<?= Yii::$app->language ?>" target="_blank" class="actionButton orange">
                    <?= Yii::t('main', 'Подать идею') ?>
                </a>
            </div>

            <div class="roundContent dark">
                <img class="fullImg" src="<?= Yii::getAlias("@web/img/girls.jpg") ?>">
            </div>
        </div>

    </div>

    <?= \frontend\widgets\Services::widget([]) ?>

    <?= \frontend\widgets\EventsList::widget([]) ?>

    <?= \frontend\widgets\Partners::widget([]) ?>

    <?= \frontend\widgets\FeedbackForm::widget([]) ?>

    <?= \frontend\widgets\Footer::widget([]) ?>
    <style>
        .phoneNum li a {
            color: #fff !important;
        }
    </style>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>