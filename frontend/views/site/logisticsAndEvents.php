<?php

/**

 * Date: 3/2/20
 * Time: 2:44 AM
 */


/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'Organizing Educational Institutions and Events');

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Услуги'), 'url' => ['#']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/logistics_and_events.css');
?>

<div class="bannerBox">
    <div class="bannerContent">
        <div class="header">
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

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="breadcrumbsRow noMargin">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </div>

                    <div class="bannerTitle">
                        <h1><?= Yii::t('main', 'Organizing Educational Institutions and Events') ?></h1>
                        <h2><?= Yii::t('main', 'Planning, management, optimization and control of educational activities, organization of educational events') ?></h2>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="fedForm">
                        <h1><?= Yii::t('main', 'Отправляйте свой запрос!') ?></h1>
                        <?= \frontend\widgets\FeedbackForm::widget([
                            'simpleForm' => true
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="imageContentBox">
        <div class="item">
            <img src="<?= Yii::getAlias('@web/img/logisticsGuys.png') ?>">
        </div>
        <div class="item">
            <h1><?= Yii::t('main', 'Запуск образовательных учреждений') ?></h1>
            <p><?= Yii::t('main', 'В нашу специфику входит разработка концепции и запуск образовательных учреждений. Организуем вступительные экзамены, гарантируем качественный и честный отбор учащихся в образовательные учреждения.') ?></p>
            <p><?= Yii::t('main', 'Мы также специализируемся в отборе профессиональный кадров.') ?></p>
        </div>
    </div>
</div>

<div class="infoContent">
    <div class="container">
        <div class="infoBoxContent">
            <h1 class="boldTitle white"><?= Yii::t('main', 'Организация') ?></h1>
            <h2><?= Yii::t('main', 'Содействие в организации участия на международных мероприятиях') ?></h2>
            <p><?= Yii::t('main', 'Если Вы хотите участвовать в международных образовательных мероприятиях (выставки, форумы конференции, семинары), то наш центр поможет Вам в этом!') ?></p>
            <p><?= Yii::t('main', 'Отправляйте свой запрос в специальной контактной форме, наши специалисты свяжутся с вами') ?></p>

            <button type="submit" class="actionButton blueBtn wide"><?= Yii::t('main', 'Отправить') ?></button>
        </div>
    </div>
</div>


<div class="section">
    <div class="categoriesSection">
        <div class="container">
            <h1 class="boldTitle"><?= Yii::t('main', 'Этапы организации') ?></h1>

            <div class="categoriesList">
                <div class="item">
                    <img src="<?= Yii::getAlias('@web/img/logistics_cat_icon1.png') ?>">
                    <p><?= Yii::t('main', 'Submitting request') ?></p>
                </div>

                <div class="item">
                    <img src="<?= Yii::getAlias('@web/img/logistics_cat_icon2.png') ?>">
                    <p><?= Yii::t('main', 'Сommercial quotation is available upon request') ?></p>
                </div>

                <div class="item">
                    <img src="<?= Yii::getAlias('@web/img/logistics_cat_icon3.png') ?>">
                    <p><?= Yii::t('main', 'Project concept will be developed') ?></p>
                </div>

                <div class="item">
                    <img src="<?= Yii::getAlias('@web/img/logistics_cat_icon4.png') ?>">
                    <p><?= Yii::t('main', 'Successful project implementation') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$this->registerCssFile('@web/css/jquery.fancybox.min.css');
$this->registerJsFile('@web/js/jquery.fancybox.min.js', ['depends' => ['yii\web\JqueryAsset']]);
?>

<div class="section">
    <div class="categoriesSection">
        <div class="container">
            <h1 class="boldTitle"><?= Yii::t('main', 'Портфолио') ?></h1>
            <div class="portfolioList">
                <div href='<?= Yii::getAlias("@web/img/tmp/1.jpg") ?>' data-fancybox='portfolio'>
                    <img src="<?= Yii::getAlias('@web/img/tmp/1.jpg') ?>">
                    <!--                    <span>Contrary to popular belief, Lorem Ipsum is not simply</span>-->
                </div>
                <div href='<?= Yii::getAlias("@web/img/tmp/2.jpg") ?>' data-fancybox='portfolio'>
                    <img src="<?= Yii::getAlias('@web/img/tmp/2.jpg') ?>">
                    <!--                    <span>Contrary to popular belief, Lorem Ipsum is not simply</span>-->
                </div>
                <div href='<?= Yii::getAlias("@web/uploads/qjbpM78na80gRkoGTilfOjvCRhabYp996.mp4") ?>' data-fancybox='portfolio'>
                    <img src="<?= Yii::getAlias('@web/uploads/xiva_school.png') ?>">
                    <!--                    <span>Contrary to popular belief, Lorem Ipsum is not simply</span>-->
                </div>
                <div href='<?= Yii::getAlias("@web/uploads/qjbpM78na80gRkoGTilfOjvCRhabYp9.mp4") ?>' data-fancybox='portfolio'>
                    <img src="<?= Yii::getAlias('@web/uploads/new_school.png') ?>">
                    <!--                    <span>Contrary to popular belief, Lorem Ipsum is not simply</span>-->
                </div>
                <div href='<?= Yii::getAlias("@web/img/tmp/6.jpg") ?>' data-fancybox='portfolio'>
                    <img src="<?= Yii::getAlias('@web/img/tmp/6.jpg') ?>">
                    <!--                    <span>Contrary to popular belief, Lorem Ipsum is not simply</span>-->
                </div>
                <div href='<?= Yii::getAlias("@web/uploads/qjbpM78na80gRkoGTilfOjvCRhabYp932.mp4") ?>' data-fancybox='portfolio'>
                    <img src="<?= Yii::getAlias('@web/uploads/prezident_school.png') ?>">
                    <!--                    <span>Contrary to popular belief, Lorem Ipsum is not simply</span>-->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="categoriesSection">
        <div class="container">
            <?= \frontend\widgets\Partners::widget() ?>
        </div>
    </div>
</div>


<div class="logisticFeedback">
    <?= \frontend\widgets\FeedbackForm::widget([]) ?>
</div>

<?= \frontend\widgets\Footer::widget([]) ?>