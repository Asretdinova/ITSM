<?php
/* @var $this yii\web\View */

$this->registerJsFile('@web/js/particles.min.js', [
    'depends' => [
        'yii\web\JqueryAsset'
    ]
]);

$this->registerJs("
        particlesJS.load('particles-js', '" . Yii::getAlias('@web/js/particles.json') . "')
    ", \yii\web\View::POS_READY)

?>

<div class="particle_number">
    <div id="particles-js"></div>
</div>

<p class="text-center"><?= Yii::t('main', 'Первый <br>IT центр в сфере <br>образования') ?></p>