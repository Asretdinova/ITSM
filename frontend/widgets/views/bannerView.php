<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Banners[] */

$this->registerCssFile('@web/css/swiper.min.css');

$this->registerJsFile('@web/js/swiper.min.js', [
    'depends' => ['yii\web\JqueryAsset']
]);

$js = <<<JS
const swiper = new Swiper ('.banner .swiper-container', {
    init: false,
    direction: 'vertical',
    spaceBetween: 10,
    parallax: true,
    pagination: {
        el: '.banner .swiper-pagination',
        clickable: true
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    }
})

swiper.on('init', function () { calculateSlideIds() });
swiper.on('slideChange', function () { calculateSlideIds() });

function calculateSlideIds() {
    $('#slider_active').text(pad(swiper.slides.length, 2));
    $('#slider_count').text(pad(swiper.activeIndex + 1, 2));
}

function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
    
    return str;
}

swiper.init();

JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>

<div class="banner">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            foreach ($model as $item) {
                echo "
               <div class='swiper-slide'>
                    <div class='banner_box'>
                        <img src='" . Yii::getAlias('@web/uploads/banners/' . $item->image . '.jpg') . "'>

                        <div class='banner_info'>
                            <h1 data-swiper-parallax='-70' data-swiper-parallax-duration='500'>{$item->title}</h1>
                            <p data-swiper-parallax='-100' data-swiper-parallax-duration='500'>{$item->description}</p>
                        </div>
                    </div>
                </div>
            ";
            }
            ?>
        </div>

        <div class="banner_navigation">
            <div class="slide_numbers">
                <div class="slider_counter">
                    <span id="slider_count">01</span>
                    <span>/</span>
                    <span id="slider_active">01</span>
                </div>
            </div>
            <div class="vline"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>