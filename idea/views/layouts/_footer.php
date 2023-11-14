<?php

use yii\helpers\Url;
use yii\widgets\Menu;

?>
<div class="container">
    <div class="footer">
        <a href="<?= Url::to(['/']) ?>" class="pull-center">
            <img class="footer_logo scrollup" src="<?= Yii::getAlias('@web/img/logo_lite.png') ?>">
        </a>

        <div class="clearfix"></div>

        <?= Menu::widget([
            'options' => [
                'class' => 'social_menu'
            ],
            'encodeLabels' => false,
            'items' => [
                ['label' => '<i class="fab fa-facebook-f"></i>', 'url' => 'https://facebook.com/itsc.uz'],
                ['label' => '<i class="fab fa-telegram-plane"></i>', 'url' => 'https://t.me/itsmuzb'],
                ['label' => '<i class="fab fa-instagram"></i>', 'url' => 'https://instagram.com/innovation_technology_center/'],
            ]
        ]) ?>
    </div>
</div>