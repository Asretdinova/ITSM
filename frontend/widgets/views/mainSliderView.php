<?php
/* @var $this \yii\web\View */

use yii\web\JqueryAsset;

$this->registerJsFile(Yii::getAlias("@web/js/owl.carousel.min.js"), ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile(Yii::getAlias("@web/css/owl.carousel.min.css"));
$this->registerCssFile(Yii::getAlias("@web/css/owl.theme.default.css"));

$js = <<<JS
    $('.banners').owlCarousel({
        items: 1,
        margin: 50,
        nav: false,
        autoplay: true,
        loop: true,
        autoplayHoverPause: true,
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="banners owl-carousel owl-theme">
    <div class="item">
        <h1><?= Yii::t('main', 'Инновация') ?></h1>
        <p><?= Yii::t('main', 'Инновации в сфере народного образования, внедрение инновационных идей в школьное образование, разработка и реализация критериев оценки современных школ') ?></p>

        <a href="<?= \yii\helpers\Url::to(['/page/about'])?>"><?= Yii::t('main', 'Больше о центре') ?></a>
    </div>

    <div class="item">
        <h1><?= Yii::t('main', 'Технология') ?></h1>
        <p><?= Yii::t('main', 'Разработка и реализация инновационных платформ, программных продуктов, информационных и мультимедийных систем, технической и проектной документации, а также научно-исследовательских и аналитических работ') ?></p>

        <a href="<?= \yii\helpers\Url::to(['/page/about'])?>"><?= Yii::t('main', 'Больше о центре') ?></a>
    </div>

    <div class="item">
        <h1><?= Yii::t('main', 'Стратегия') ?></h1>
        <p><?= Yii::t('main', 'Осуществление стратегического анализа, планирования, прогнозирования и выработку стратегических направлений дальнейшего развития и совершенствования системы народного образования') ?></p>

        <a href="<?= \yii\helpers\Url::to(['/page/about'])?>"><?= Yii::t('main', 'Больше о центре') ?></a>
    </div>
</div>
