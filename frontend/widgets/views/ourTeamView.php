<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Team[] */

$this->registerCssFile('@web/css/swiper.min.css');

$this->registerJsFile('@web/js/swiper.min.js', [
    'depends' => ['yii\web\JqueryAsset']
]);

$js = <<<JS
    new Swiper ('.teamScroll', {
        spaceBetween: 10,
        slidesPerView: 'auto',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 10000,
            disableOnInteraction: false,
        }
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>

<div class="row section">
    <p class="section_title">
        <span><i class="fas fa-id-card-alt"></i></span>
        <?= Yii::t('main', 'Сотрудники') ?>
    </p>

    <div class="swiper-container teamScroll">
        <div class="swiper-wrapper">
            <?php
            foreach ($model as $item) {
                echo "
                   <div class='swiper-slide'>
                        <img src='" . Yii::getAlias('@web/uploads/content/' . $item->photo . '.jpg') . "'>
                        <h1>{$item->name}</h1>
                        <p>{$item->position}</p>
                    </div>
                ";
            }
            ?>
        </div>

        <div class="buttons swiper-button-next"></div>
        <div class="buttons swiper-button-prev"></div>
    </div>
</div>