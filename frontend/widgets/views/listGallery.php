<?php

/**

 * Date: 2/17/20
 * Time: 9:00 AM
 */

use yii\helpers\Html;
use yii\web\JqueryAsset;

$this->registerCssFile('@web/css/jquery.fancybox.min.css');
$this->registerJsFile("@web/js/owl.carousel.min.js", ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile("@web/css/owl.carousel.min.css");
$this->registerCssFile("@web/css/owl.theme.default.css");
$this->registerJsFile('@web/js/jquery.fancybox.min.js', ['depends' => ['yii\web\JqueryAsset']]);

$js = <<<JS
        $('document').ready(function() {
            $(".projectsList").owlCarousel({
                autoplay: false,
                nav: true,
                navText: ['<i class="arrow left"></i>', '<i class="arrow right"></i>'],
                dots: false,
                margin: 10,
                responsive: {
                    0: {
                        items: 1
                    },
                    650: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    },
                }
            });
        });
JS;
$this->registerJs($js);


echo Html::beginTag('div', ['class' => 'owl-carousel owl-theme miniGallery projectsList']);
foreach ($list as $item) {
    $file = pathinfo($item);
    echo "
                <a href='" . Yii::getAlias("@web/uploads/mini_gallery/{$item}") . "' data-fancybox='miniGallery' class='gItem'>
                    <div class='imageBox'>
                        <img src='" . Yii::getAlias("@web/uploads/mini_gallery/{$file['filename']}_mini.{$file['extension']}") . "'>
                    </div>
                </a>
            ";
}
echo Html::endTag('div');