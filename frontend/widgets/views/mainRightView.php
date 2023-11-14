<?php

use yii\widgets\Menu;

?>
<div class="header-rows desktop_view">
    <div class="header-row">
        <div class="column">
            <?= \frontend\widgets\SpecialView::widget([]) ?>

            <?= \frontend\widgets\LanguageBar::widget([]) ?>

            <div class="phoneBox">
                <div class="column">
                    <div class="circle">
                        <i class="fas fa-phone-alt"></i>
                    </div>

                    <div class="phoneNum">
                    <?= @$contacts['phone']?>
                    </div>
                </div>
            </div>

            <div class="shareList">
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

    <div class="header-row">
        <?= \frontend\widgets\MainMenu::widget([
            'className' => 'menu'
        ]) ?>
    </div>
</div>
<style>
    .phoneNum li{
        list-style-type:none!important;
    }
</style>