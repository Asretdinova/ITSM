<?php

/**

 * Date: 8/24/19
 * Time: 2:14 AM
 */

/* @var $this \yii\web\View */

$this->registerCssFile("@web/css/onepage-scroll.css");
$this->registerJsFile("@web/js/jquery.onepage-scroll.min.js");

$this->title = Yii::t('main', 'Как это работает?');

$js = <<<JS
    $(".fullPager").onepage_scroll({
        sectionContainer: "section",
        easing: "ease",
        animationTime: 500,
        pagination: true,
        updateURL: false,
        beforeMove: function(index) {},
        afterMove: function(index) {},
        loop: false,
        keyboard: true,
        responsiveFallback: false,      
        direction: "vertical"              
    });

    $('.scroll_down').click(function(e) {
        e.preventDefault();
        
        $('.fullPager').moveDown()
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

use yii\helpers\Url; ?>


<div class="fullPager">
    <section>
        <div class="absolute">
            <?= $this->render('/layouts/_header') ?>
        </div>

        <div class="container">
            <?= \yii\helpers\Html::tag('h1', $this->title, ['class' => 'title flaying-title text-center']) ?>

            <div class="row innerPadding">
                <div class="col-md-5">
                    <p class="title"><?= Yii::t('main', 'Открытие идеи со всего мира') ?></p>
                    <p><?= Yii::t('main', 'У вас уже есть своя идея? Вы хотите улучшить образование в стране? Напишите нам, наши сотрудники рассмотрят идею и ответят Вам!') ?></p>
                </div>

                <div class="col-md-7 imageDescription">
                    <img src="<?= Yii::getAlias("@web/img/boy_has_idea.png") ?>">
                </div>

                <button class="scroll_down">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <p class="title"><?= Yii::t('main', 'Заполните форму и добавьте свою идею') ?></p>
                    <p><?= Yii::t('main', 'После заполнения простой формы на сайте, вы сможете отправить нам свою идею на рассмотрение') ?></p>
                </div>

                <div class="col-md-7 imageDescription">
                    <img src="<?= Yii::getAlias("@web/img/boy_with_window.png") ?>">
                </div>

                <button class="scroll_down">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <p class="title"><?= Yii::t('main', 'Наши сотрудники рассмотрят Вашу идею') ?></p>
                    <p><?= Yii::t('main', 'Опишите суть вашей идеи, приложите изображение/статистику, наши сотрудники рассмотрят идею и ответят вам') ?></p>
                </div>

                <div class="col-md-7 imageDescription">
                    <img src="<?= Yii::getAlias("@web/img/nice_idea.png") ?>">
                </div>

                <button class="scroll_down">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <p class="title"><?= Yii::t('main', 'Пригласим на встречу, если понравилась идея') ?></p>
                    <p><?= Yii::t('main', 'Если ваша идея окажется перспективной, мы пригласим Вас в центр на встречу') ?></p>
                </div>

                <div class="col-md-7 imageDescription">
                    <img src="<?= Yii::getAlias("@web/img/production.png") ?>">
                </div>

                <div class="buttonsList">
                    <a href="<?= Url::to(['idea/submit']) ?>"
                       class="squareBtn lightVersion ideBtn"><?= Yii::t('main', 'Подать идею!') ?></a>
                    <div style="height: 30px;"></div>
                </div>
            </div>
        </div>
    </section>
</div>
