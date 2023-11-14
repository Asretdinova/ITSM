<?php

/* @var $title string */

use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->registerCssFile('@web/css/jquery.fancybox.min.css');
$this->registerJsFile('@web/js/jquery.fancybox.min.js', ['depends' => ['yii\web\JqueryAsset']]);

$this->registerJsFile(Yii::getAlias("@web/js/owl.carousel.min.js"), ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile(Yii::getAlias("@web/css/owl.carousel.min.css"));
$this->registerCssFile(Yii::getAlias("@web/css/owl.theme.default.css"));

$js = <<<JS
    $(".partnersList").owlCarousel({
        autoplay: false,
        nav: true,
        navText: ['<i class="arrow left"></i>', '<i class="arrow right"></i>'],
        dots: false,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2
            },
            800: {
                items: 4
            },
            1200: {
                items: 7
            }
        }
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="container">
    <?= ($title) ? \yii\helpers\Html::tag('p', Yii::t('main', 'Партнёры'), ['class' => 'boldTitle center', 'title' => Yii::t('main', 'Партнёры')]) : '' ?>

    <div class="partnersList owl-carousel owl-theme">
        <?php
        /* @var $model \common\models\Partners[] */
        foreach ($model as $item) {
            $title = (empty($item->title) ? $item->title : $item->url);
            echo "
            <div class='item'>
                <a href='{$item->url}' target='_blank' title='{$title}'>
                    <img src='/uploads/content/{$item->logo}'>
                </a>
            </div>
        ";
        }
        ?>
    </div>
</div>
