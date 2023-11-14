<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 3/4/20
 * Time: 7:37 AM
 */

/* @var $this \yii\web\View */

use frontend\widgets\AppDetails;
use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'Медиа');

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Услуги'), 'url' => ['#']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/mediaService.css');
?>

    <div class="bannerBox">
        <div class="bannerContent">
            <div class="header colored">
                <div class="container">
                    <div class="headerElements white">
                        <?= \frontend\widgets\Logo::widget([
                            'whiteLogo' => true
                        ]) ?>

                        <?= \frontend\widgets\MainRight::widget([]) ?>
                    </div>
                </div>

                <?= \frontend\widgets\ResponsiveBar::widget([]) ?>
            </div>

            <div class="breadcrumbsRow noMargin">
                <div class="container">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </div>
            </div>


            <div class="container">
                <div class="bannerTitle">
                    <h1><?= Yii::t('main', 'Медиа');?></h1>
                    <h2><?= Yii::t('main', 'Центр инновации, технологии и статегии Деятельность. ориентированная на результат') ?></h2>
                </div>

                <div class="iconAdsList">
                    <div class="item">
                        <img src="<?= Yii::getAlias('@web/img/art_icon.png') ?>">
                        <h1><?= Yii::t('main', 'Дизайн') ?></h1>
                    </div>
                    <div class="item">
                        <img src="<?= Yii::getAlias('@web/img/seo_icon.png') ?>">
                        <h1>SEO</h1>
                    </div>
                    <div class="item">
                        <img src="<?= Yii::getAlias('@web/img/smm_icon.png') ?>">
                        <h1>SMM</h1>
                    </div>
                </div>

                <div class="buttonsList">
                    <a id="scrollToFeedback" href="#" class="insta"><?= Yii::t('main', 'Заказать') ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h1 class="sectionTitle"><?= Yii::t('main', 'Медиа услуги') ?></h1>

            <div class="adsList">
                <div class="item">
                    <div class="iconBox">
                        <img src="<?= Yii::getAlias('@web/img/megafon_icon.png') ?>">
                    </div>

                    <h1><?= Yii::t('main', 'SMM, SEO и PR кампании') ?></h1>
                    <p><?= Yii::t('main', 'SMM, SEO и PR кампании Продвижение в социальных сетях, реклама в поисковых системах Google и Яндекс') ?></p>
                </div>

                <div class="item">
                    <div class="iconBox">
                        <img src="<?= Yii::getAlias('@web/img/phone_stat_icon.png') ?>">
                    </div>

                    <h1><?= Yii::t('main', 'Веб-сайты и мобильные приложения') ?></h1>
                    <p><?= Yii::t('main', 'Разработка сайтов и мобильных приложений. Поддержка завершения проекта') ?></p>
                </div>

                <div class="item">
                    <div class="iconBox">
                        <img src="<?= Yii::getAlias('@web/img/idea_icon.png') ?>">
                    </div>

                    <h1><?= Yii::t('main', 'Веб и графический дизайн') ?></h1>
                    <p><?= Yii::t('main', 'Дизайн сайта, создание фирменного стиля, создание презентаций на государственном уровне') ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="gradient section">
        <div class="container">
            <h1 class="sectionTitle"><?= Yii::t('main', 'Наши преимущества') ?></h1>

            <h2 class="lined"><?= Yii::t('main', 'Мы реализуем ваши идеи!') ?></h2>

            <div class="idesList">
                <div class="item">
                    <div class="imageBox">
                        <img src="<?= Yii::getAlias('@web/img/is1.png') ?>">
                    </div>
                    <h1><?= Yii::t('main', 'Полный объем проектирования и обслуживания проекта') ?></h1>
                </div>

                <div class="item">
                    <div class="imageBox">
                        <img src="<?= Yii::getAlias('@web/img/is4.png') ?>">
                    </div>
                    <h1><?= Yii::t('main', 'Все специалисты компании являются штатными сотрудниками') ?></h1>
                </div>

                <div class="item">
                    <div class="imageBox">
                        <img src="<?= Yii::getAlias('@web/img/is2.png') ?>">
                    </div>
                    <h1><?= Yii::t('main', 'Выполняем проекты любой сложности') ?></h1>
                </div>

                <div class="item">
                    <div class="imageBox">
                        <img src="<?= Yii::getAlias('@web/img/is5.png') ?>">
                    </div>
                    <h1><?= Yii::t('main', 'Задача считается выполненной только тогда, когда у вас не осталось комментариев') ?></h1>
                </div>

                <div class="item">
                    <div class="imageBox">
                        <img src="<?= Yii::getAlias('@web/img/is3.png') ?>">
                    </div>
                    <h1><?= Yii::t('main', 'Техническая поддержка после запуска проекта') ?></h1>
                </div>

                <div class="item">
                    <div class="imageBox">
                        <img src="<?= Yii::getAlias('@web/img/is6.png') ?>">
                    </div>
                    <h1><?= Yii::t('main', 'Контроль качества на каждом этапе работы Заказать') ?></h1>
                </div>
            </div>

            <a href="#" class="pull-center grBtn"><?= Yii::t('main', 'Заказать') ?></a>
        </div>
    </div>

    <div class="draft section">
        <div class="container">
            <h1 class="sectionTitle"><?= Yii::t('main', 'Технология нашей деятельности') ?></h1>

            <div class="adsGrid">
                <div class="item">
                    <img src="<?= Yii::getAlias('@web/img/plan_icon.png') ?>">
                    <h1><?= Yii::t('main', 'Стратегия') ?></h1>
                    <p><?= Yii::t('main', 'Требуется для точного понимания масштабов проекта, его задач и средств, с помощью которых эти задачи будут выполняться.') ?></p>
                </div>

                <div class="item">
                    <img src="<?= Yii::getAlias('@web/img/vizual_icon.png') ?>">
                    <h1><?= Yii::t('main', 'Визуализация') ?></h1>
                    <p><?= Yii::t('main', 'Дизайн и разработка дизайна интерфейса сайта, логотипов, баннеров, презентаций и других графических решений') ?></p>
                </div>

                <div class="item">
                    <img src="<?= Yii::getAlias('@web/img/stat_icon.png') ?>">
                    <h1><?= Yii::t('main', 'Аналитика') ?></h1>
                    <p><?= Yii::t('main', 'Важный этап в разработке сайта, на котором выявляются не только сильные, но и слабые стороны, которые необходимо устранить') ?></p>
                </div>

                <div class="item">
                    <img src="<?= Yii::getAlias('@web/img/nout_icon.png') ?>">
                    <h1><?= Yii::t('main', 'Поддержка') ?></h1>
                    <p><?= Yii::t('main', 'Продвижение в поисковых системах, социальных сетях и поддержка проекта после завершения') ?></p>
                </div>
            </div>
        </div>
    </div>

    <?= AppDetails::widget()?>

    <div class="section grey">
        <?= \frontend\widgets\Partners::widget([]) ?>
    </div>

    <div class="section feedback">
        <?= \frontend\widgets\FeedbackForm::widget([]) ?>
    </div>

<?= \frontend\widgets\Footer::widget([]) ?>