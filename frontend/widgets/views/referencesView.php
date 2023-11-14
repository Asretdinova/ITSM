<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\References[] */

$this->registerCssFile('@web/css/swiper.min.css');

$this->registerJsFile('@web/js/swiper.min.js', [
    'depends' => ['yii\web\JqueryAsset']
]);

$js = <<<JS
    new Swiper ('.reviewScroll', {
        spaceBetween: 10,
        slidesPerView: 1,
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
    <p class="section_title white"><?= Yii::t('main', 'Отзывы о нас') ?></p>

    <div class="swiper-container reviewScroll">
        <div class="swiper-wrapper">
            <?php
            foreach ($model as $item) {
                echo "
                   <div class='swiper-slide'>
                        <img src='" . Yii::getAlias('@web/uploads/content/' . $item->photo . '.jpg') . "'>
                        <h3>{$item->review}</h3>
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