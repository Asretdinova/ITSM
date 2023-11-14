<?php

/**

 * Date: 2/17/20
 * Time: 3:25 AM
 */

use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->registerJsFile(Yii::getAlias("@web/js/owl.carousel.min.js"), ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile(Yii::getAlias("@web/css/owl.carousel.min.css"));
$this->registerCssFile(Yii::getAlias("@web/css/owl.theme.default.css"));

$js = <<<JS
    $('.projectsList').owlCarousel({
        margin: 30,
        nav: false,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2
            },
            1200: {
                items: 4
            }
        }
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>

<div class="projectsList owl-carousel owl-theme">
    <?php
    foreach ($model as $item) {
        echo "
            <div class='item'>
                <div class='avaImage'>
                    <img src='/uploads/{$item->image_id}.jpg'>
                </div>
                <h1>{$item->title}</h1>
                <p>" . strip_tags($item->content) . "</p>
                <a class='actionButton' href='" . Url::to(['/projects/viewold', 'id' => $item->id]) . "'>" . Yii::t('main', 'Подробнее') . "</a>
            </div>
        ";
    }
    ?>
</div>
