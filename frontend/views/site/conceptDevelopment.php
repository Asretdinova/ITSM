<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'Развитие концепции');

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Услуги'), 'url' => ['#']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/concept_development.css');
?>

<div class="bannerBox">
    <div class="bannerContent">
        <div class="header conceptDevelopment">
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

        <div class="breadcrumbsRow noMargin conceptDevelopment">
            <div class="container">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
        </div>

        <div class="accentBanner">
            <div class="container">
                <h1><?= $this->title ?></h1>
                <h2><?= Yii::t('main', 'Инновационные технологии  в системе народного образования') ?></h2>

                <div class="statList">
                    <div class="statItem">
                        <h1>10</h1>
                        <h2><?= Yii::t('main', 'Завершенных проектов') ?></h2>
                    </div>

                    <div class="statItem">
                        <h1>35</h1>
                        <h2><?= Yii::t('main', 'Опытных специалистов') ?></h2>
                    </div>

                    <div class="statItem">
                        <h1>18</h1>
                        <h2><?= Yii::t('main', 'Проектов в перспективе') ?></h2>
                    </div>
                </div>

                <div class="horizontalFlex buttonsList center">
                    <a id="contactBtn" href="#" class="accentButton"><?= Yii::t('main', 'Связаться с нами') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="horizontalFlex center afterAccent">
        <p class="borderedText"><?= Yii::t('main', 'Гарантируем надёжный запуск новых проектов!') ?></p>

        <p class="darkText"><?= Yii::t('main', 'Еще до начала работ мы полностью проанализируем все показатели, влияющие на результат, чтобы максимально снизить все риски к моменту запуска') ?></p>
    </div>
</div>

<div class="section">
    <div class="container">
        <p class="boldTitle center"
           title="<?= Yii::t('main', 'Этапы работы') ?>"><?= Yii::t('main', 'Этапы работы') ?></p>

        <div class="stagesList">
            <div class="stageItem">
                <h1><span>1</span> <?= Yii::t('main', 'Анализ') ?></h1>

                <p><?= Yii::t('main', 'Каждый новый проект, перед началом работы над ним, проходит тщательный анализ. Ведутся работы для выявления актуальных тенденций на мировом рынке инновационных технологий') ?></p>
            </div>

            <div class="stageItem">
                <h1><span>2</span> <?= Yii::t('main', 'Решения') ?></h1>

                <p><?= Yii::t('main', 'В каждом, конкретном случае мы используем определенную стратегию. К любой задачи применяются индивидуальные решения') ?></p>
            </div>

            <div class="stageItem">
                <h1><span>3</span> <?= Yii::t('main', 'Потребности') ?></h1>

                <p><?= Yii::t('main', 'Немаловажным фактором в разботке проекта, является потребительский спрос. Каждый проект разрабатывается с учётом актуальности и необходимости на сегодняшний день') ?></p>
            </div>

            <div class="stageItem">
                <h1><span>4</span> <?= Yii::t('main', 'Учёт') ?></h1>

                <p><?= Yii::t('main', 'Все проекты проходят ряд тестов. Принимаются во внимание мнения и оценки участников тестовых испытаний. После единогласного одобрения проект запускается для массового использования') ?></p>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        <p class="boldTitle center"
           title="<?= $this->title ?>"><?= $this->title ?></p>

        <div class="adItems">
            <?php
            $list = [
                ['image' => Yii::getAlias('@web/img/concept1.png'), 'label' => Yii::t('main', 'Разработка ПО')],
                ['image' => Yii::getAlias('@web/img/concept2.png'), 'label' => Yii::t('main', 'Мобильные приложения (iOS/Android)')],
                ['image' => Yii::getAlias('@web/img/concept3.png'), 'label' => Yii::t('main', 'Тестирование')],
                ['image' => Yii::getAlias('@web/img/concept4.png'), 'label' => Yii::t('main', 'Разработка технических заданий')],
                ['image' => Yii::getAlias('@web/img/concept5.png'), 'label' => Yii::t('main', 'Разработка веб-сайтов, веб-порталов')],
                ['image' => Yii::getAlias('@web/img/concept6.png'), 'label' => Yii::t('main', 'Разработка графического дизайн')],
            ];

            foreach ($list as $item) {
                echo Html::beginTag('div', ['class' => 'elItem concept']);
                echo Html::img($item['image']);
                echo Html::tag('h2', $item['label']);
                echo Html::endTag('div');
            }
            ?>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <p class="boldTitle center"
           title="<?= Yii::t('main', 'Миссия центра') ?>"><?= Yii::t('main', 'Миссия центра') ?></p>

        <div class="textList">
            <div class="textItem">
                <div class="textPath">
                    <h1><?= Yii::t('main', 'Инновационные технологии') ?></h1>
                    <p><?= Yii::t('main', 'Разработка и внедрение инновационных технологий, стратегический анализ и планирование в системе народного образования') ?></p>
                </div>

                <div class="imagePath first"></div>
            </div>

            <div class="textItem">
                <div class="imagePath second"></div>

                <div class="textPath">
                    <h1><?= Yii::t('main', 'Маркетинговый анализ') ?></h1>
                    <p><?= Yii::t('main', 'Проведение маркетингового анализа, организация мероприятий, продвижение и продажа новых решений в сфере народного образования') ?></p>
                </div>
            </div>

            <div class="textItem">
                <div class="textPath">
                    <h1><?= Yii::t('main', 'Обработка статистических данных') ?></h1>
                    <p><?= Yii::t('main', 'Сбор, анализ и обработка статистических данных, мнений экспертов, макроэкономических факторов, влияющих на позитивное развитие отрасли народного образования') ?></p>
                </div>

                <div class="imagePath third"></div>
            </div>
        </div>
    </div>
</div>

<div class="conceptPartners">
    <?= \frontend\widgets\Partners::widget([]) ?>
</div>

<div class="conceptFeedback">
    <?= \frontend\widgets\FeedbackForm::widget([]) ?>
</div>

<div class="conceptFooter">
    <?= \frontend\widgets\Footer::widget([
        'whiteLogo' => true
    ]) ?>
</div>


<?php

$js = <<<JS
    $(document).ready(function() {
        $('#contactBtn').click(function() {
            goToByScroll('feedback');
        });
    });
JS;

$this->registerJs($js);
