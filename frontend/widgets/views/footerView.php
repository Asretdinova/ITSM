<?php

/* @var $this \yii\web\View */
/* @var $projects array */

/* @var $whiteLogo int */

use yii\widgets\Menu;

?>
<div class="footer">
    <div class="container">
        <div class="rowBoxes">
            <div class="footerLogoBox">
                <?= \frontend\widgets\Logo::widget([
                    'whiteLogo' => $whiteLogo
                ]) ?>
            </div>

            <div class="footerMenu">
                <h1><?= Yii::t('main', 'Карта сайта') ?></h1>

                <div class="menuList">
                    <div class="col">
                        <h2><?= Yii::t('main', 'О нас') ?></h2>
                        <?= Menu::widget([
                            'items' => [
                                [
                                    'label' => Yii::t('main', 'Наша команда'),
                                    'url' => ['/team/departments'],
                                ],
                                [
                                    'label' => Yii::t('main', 'Вакансии'),
                                    'url' => ['/jobs/index'],
                                ],
//                                [
//                                    'label' => Yii::t('main', 'Тендеры'),
//                                    'url' => '#',
//                                ],
//                                [
//                                    'label' => Yii::t('main', 'Конкурсы'),
//                                    'url' => '#',
//                                ],
//                                [
//                                    'label' => Yii::t('main', 'Структура центра'),
//                                    'url' => '#',
//                                ],
                                [
                                    'label' => Yii::t('main', 'Галерея'),
                                    'url' => ['/gallery'],
                                ],
                                [
                                    'label' => Yii::t('main', 'События'),
                                    'url' => ['/events/index'],
                                ],
                                [
                                    'label' => Yii::t('main', 'Партнерам'),
                                    'url' => ['/page/partners'],
                                ],
                                [
                                    'label' => Yii::t('main', 'Контакты'),
                                    'url' => ['/page/contacts'],
                                ],
                            ]
                        ]) ?>
                    </div>

                    <div class="col">
                        <h2><?= Yii::t('main', 'Услуги') ?></h2>
                        <?= Menu::widget([
                            'items' => [
                                [
                                    'label' => Yii::t('main', 'Concept Development'),
                                    'url' => '#',
                                ],
                                [
                                    'label' => Yii::t('main', 'Digital Services'),
                                    'url' => ['/digital-services'],
                                ],
                                [
                                    'label' => Yii::t('main', 'Logistics and events'),
                                    'url' => '#',
                                ],
                            ]
                        ]) ?>

                       
                    </div>

                    <div class="col">
                        <h2><?= Yii::t('main', 'Наши проекты') ?></h2>
                        <?= Menu::widget([
                            'items' => $projects
                        ]) ?>
                    </div>
                </div>
            </div>

            <?= \frontend\widgets\FooterContacts::widget() ?>
        </div>
    </div>

    <div class="footerRight d-inline-flex">
        <div class="container">
            <p>Copyright 2019 - <?= date('Y') ?></p>
        </div>
        <!-- Yandex.Metrika informer -->
        <a  href="https://metrika.yandex.ru/stat/?id=73508533&amp;from=informer"
           target="_blank" rel="nofollow"><img  src="https://informer.yandex.ru/informer/73508533/3_0_FFFFFFFF_FFFFFFFF_0_pageviews"
                                               style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="73508533" data-lang="ru" /></a>
        <!-- /Yandex.Metrika informer -->
    </div>

</div>