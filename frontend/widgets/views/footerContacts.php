<?php

use yii\widgets\Menu;

?>
<div class="footerContacts">
    <div class="fContact">
        <div class="fIcon">
            <i class="fas fa-phone-alt"></i>
        </div>
        <div class="fContent">
            <h1><?=Yii::t('main', 'Телефон')?></h1>
            <span> <?= @$contacts['phone']?></span>
        </div>
    </div>

    <div class="fContact">
        <div class="fIcon">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="fContent">
            <h1><?=Yii::t('main', 'Email')?></h1>
            <a href="mailto:info@itsm.uz"> <?= @$contacts['mail']?></a>
        </div>
    </div>

    <div class="fContact">
        <div class="fIcon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="fContent">
            <h1><?=Yii::t('main', 'Режим работы')?></h1>
            <span><?= Yii::t('main', 'Пн-Пт с 9:00 до 18:00')?></span>
        </div>
    </div>

    <div class="fContact">
        <div class="fIcon">
            <i class="fas fa-map-marker"></i>
        </div>
        <div class="fContent">
            <h1><?=Yii::t('main', 'Адрес')?></h1>
            <span><?= @$contacts['address']?></span>
        </div>
    </div>

    <div class="fContact">
        <div class="fIcon none"></div>
        <div class="fContent">
            <h1><?=Yii::t('main', 'Мы в соцсетях')?></h1>
            <?= Menu::widget([
                'options' => [
                    'class' => 'socialList'
                ],
                'encodeLabels' => false,
                'items' => [
                    ['label' => '<i class="fab fa-facebook-f"></i>', 'url' => 'https://facebook.com/itsc.uz'],
                    ['label' => '<i class="fab fa-instagram"></i>', 'url' => 'https://instagram.com/innovation_technology_center/'],
                    ['label' => '<i class="fab fa-telegram-plane"></i>', 'url' => 'https://t.me/itsmuzb'],
                    ['label' => '<i class="fab fa-twitter"></i>', 'url' => 'https://twitter.com/itsm_uz'],
                ]
            ]) ?>
        </div>
    </div>
</div>
