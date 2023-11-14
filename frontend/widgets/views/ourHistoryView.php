<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Content[] */

$this->registerCssFile('@web/css/swiper.min.css');

$this->registerJsFile('@web/js/swiper.min.js', [
    'depends' => ['yii\web\JqueryAsset']
]);

$js = <<<JS
    new Swiper ('.historyScroll', {
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
    <p class="section_title white"><?= Yii::t('main', 'История') ?></p>

    <div class="swiper-container historyScroll">
        <div class="swiper-wrapper">
            <?php
            foreach ($model as $item) {
                echo "
                   <div class='swiper-slide'>
                        <img src='" . Yii::getAlias('@web/uploads/' . $item->image_id . '.jpg') . "'>
                        <span>{$item->title}</span>
                        <p>{$item->content}</p>
                    </div>
                ";
            }
            ?>
        </div>

        <div class="buttons swiper-button-next"></div>
        <div class="buttons swiper-button-prev"></div>
    </div>
</div>