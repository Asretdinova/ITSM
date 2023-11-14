<?php

use yii\helpers\Url;

?>
<div class="header">
    <div class="container relative">
        <a class="logo" href="<?= Url::to(['/site/index']) ?>">
            <img src="<?= Yii::getAlias('@web/img/xtv_logo.png') ?>">
            <img src="<?= Yii::getAlias('@web/img/logo.png') ?>">
        </a>

        <div class="header_rocket">
            <img src="<?= Yii::getAlias('@web/img/rocket.png') ?>">
            <span><?=Yii::t('main', 'Идеи в сфере <b>народного образования</b>')?></span>
            <span class="beta">Beta</span>
        </div>

        <div class="rightPanel">
            <ul class="list menuList">
                <li class="mini"><a target="_blank" href="https://facebook.com/itsc.uz"><i class="fab fa-facebook-f"></i></a></li>
                <li class="mini"><a target="_blank" href="https://t.me/itsmuzb"><i class="fab fa-telegram-plane"></i></a></li>
                <li class="mini"><a target="_blank" href="https://instagram.com/innovation_technology_center/"><i class="fab fa-instagram"></i></a></li>

                <li><?= \frontend\widgets\SpecialView::widget([]) ?></li>

                <li><?= \idea\widgets\LanguageBar::widget([]) ?></li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>