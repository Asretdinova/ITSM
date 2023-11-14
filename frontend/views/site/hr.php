<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'HR');

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Услуги'), 'url' => ['#']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/hr.css');
?>

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

<div class="breadcrumbsRow noMargin colored">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
</div>

<div class="accentBanner">
    <div class="container">
        <div class="dataBox">
            <h1><?= Yii::t('main', 'Услуги <span>HR</span>') ?></h1>

            <ul>
                <li><?= Yii::t('main', 'Corporate culture development')?></li>
                <li><?= Yii::t('main', 'HRM policy development')?></li>
                <li><?= Yii::t('main', 'Recruitment services')?></li>
            </ul>

            <a id="scrollToFeedback" href="#" class="actionButton wide darkRed"><?= Yii::t('main', 'Заказать услуги') ?></a>
        </div>
    </div>
</div>

<div class="contentSection">
    <div class="container">
        <h1 class="simpleTitle"><?= Yii::t('main', 'Подбор персонала') ?></h1>
        <h2 class="simpleTitle"><?= Yii::t('main', 'Мы достигаем цели!') ?></h2>

        <div class="targetList">
            <?php
            $list = [
                [
                    ['label' => Yii::t('main', 'Поиск и подбор персонала в Ташкенте и в регионах республики')],
                    ['label' => Yii::t('main', 'Оптимизация организационной структуры')],
                    ['label' => Yii::t('main', 'Диагностика и построение систем в области управления персоналом')],
                    ['label' => Yii::t('main', 'Создание заинтересованной профессиональной команды')],
                ],
                [
                    ['label' => Yii::t('main', 'Разработка Кадровой Политики и документации')],
                    ['label' => Yii::t('main', 'Управленческий консалтинг')],
                    ['label' => Yii::t('main', 'Обзор рынка заработных плат')],
                    ['label' => Yii::t('main', 'Оценка и тестирование персонал')],
                ]
            ];

            $i = 1;
            foreach ($list as $items) {
                echo Html::beginTag('div', ['class' => 'group']);
                foreach ($items as $item) {
                    echo Html::beginTag('div', ['class' => 'item']);
                    echo Html::tag('h1', $i);
                    echo Html::tag('h2', $item['label']);
                    echo Html::endTag('div');

                    $i++;
                }
                echo Html::endTag('div');
            }
            ?>
        </div>

        <hr>

        <div class="commentText">
            <p><?= Yii::t('main', 'Правильный выбор кандидата может помочь в увеличении производительности, прибыли и повышении лояльности сотрудников.')?><br>

                <?= Yii::t('main', 'Неправильный выбор способствует увеличению текучести персонала, появлению конфликтов в команде, демотивации сотрудников, ухудшению эффективности работы отдела или компании, а также росту количества неквалифицированных специалистов, что имеет прямое воздействие на деловую репутацию компании на рынке, качество производимой продукции или оказываемых услуг.')?><br>

                <?= Yii::t('main', 'Все это может вызвать высокую нестабильность бизнеса, а при регулярных ошибках в подборе, даже закрытие направления бизнеса или даже всей компании.')?></p>
        </div>
    </div>
</div>


<div class="contentSection red">
    <div class="container">
        <h1 class="simpleTitle"><?= Yii::t('main', 'Развитие персонала') ?></h1>
        <h2 class="simpleTitle"><?= Yii::t('main', 'Успех вашей организации') ?></h2>

        <hr>

        <p class="text-center">
            <?= Yii::t('main', 'Развитие персонала является одним из важнейших условий успеха любой организации.')?>
            <?= Yii::t('main', 'Это особенно актуально в наши дни, когда с ускорением научно-технического прогресса быстрее, чем когда-либо устаревают профессиональные знания и навыки.')?>
            <?= Yii::t('main', 'Несоответствие квалификации персонала потребностям компании отрицательно сказывается на результатах её деятельности.')?>
        </p>


        <div class="spAdsList">
            <div class="item">
                <div class="hBlock">
                    <img src="<?= Yii::getAlias('@web/img/chartExt.png') ?>">
                    <h1><?= Yii::t('main', 'Диагностика системы')?></h1>
                </div>

                <div class="cBlock">
                    <p><?= Yii::t('main', 'Диагностика системы взаимосвязанных действий, включающих выработку стратегии, прогнозирование и планирование потребности в персонале, управление карьерой и профессиональным ростом.')?></p>
                </div>
            </div>

            <div class="item">
                <div class="hBlock">
                    <img src="<?= Yii::getAlias('@web/img/puzzleExt.png') ?>">
                    <h1><?= Yii::t('main', 'Построение системы')?></h1>
                </div>

                <div class="cBlock">
                    <p><?= Yii::t('main', 'Выявление и анализ слабых и сильных сторон сотрудников, и построение системы развития.')?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contentSection">
    <div class="container">
        <h1 class="simpleTitle"><?= Yii::t('main', 'Охрана труда и техники безопасности') ?></h1>
        <h2 class="simpleTitle"><?= Yii::t('main', 'Мы предлагаем следующий комплекс услуг по ОТ и ТБ:') ?></h2>

        <?php
        $list = [
            [
                'icon' => Yii::getAlias('@web/img/paste_red_icon.png'),
                'label' => Yii::t('main', 'Проведение оценки состояния охраны труда предприятия на соответствия требованиям законодательства РУз')
            ],
            [
                'icon' => Yii::getAlias('@web/img/paste_search_red_icon.png'),
                'label' => Yii::t('main', 'Исследования, касающиеся методических и технологических аспектов оценки условий труда, профессиональных рисков и эффективности действия средств индивидуальной защиты')
            ],
            [
                'icon' => Yii::getAlias('@web/img/document_red_icon.png'),
                'label' => Yii::t('main', 'Разработка уникальных нормативных документов по охране труда на предприятии')
            ],
            [
                'icon' => Yii::getAlias('@web/img/broatcast_red_icon.png'),
                'label' => Yii::t('main', 'Разработка методических материалов, презентаций и видео инструкций по ОТ и ТБ')
            ],
            [
                'icon' => Yii::getAlias('@web/img/alert_red_icon.png'),
                'label' => Yii::t('main', 'Проведение обучения и проверка знаний лиц, отвечающих за функционирование системы охраны труда на предприятии')
            ],
            [
                'icon' => Yii::getAlias('@web/img/safe_red_icon.png'),
                'label' => Yii::t('main', 'Супервайзинг по охране труда и технике безопасности')
            ],
            [
                'icon' => Yii::getAlias('@web/img/fire_free_red_icon.png'),
                'label' => Yii::t('main', 'Разработка атрибутики по охране труда и пожарной безопасности')
            ],
            [
                'icon' => Yii::getAlias('@web/img/safe_human_red_icon.png'),
                'label' => Yii::t('main', 'Разработка системы управления охраной труда')
            ],
            [
                'icon' => Yii::getAlias('@web/img/chart_red_icon.png'),
                'label' => Yii::t('main', 'Аттестация персонала по охране труда')
            ],
        ];

        echo Html::beginTag('div', ['class' => 'chessBox']);
        foreach ($list as $item) {
            echo Html::beginTag('div', ['class' => 'item']);
                echo Html::beginTag('div', ['class' => 'cItem']);
                    echo Html::img($item['icon']);
                    echo Html::tag('span', $item['label']);
                echo Html::endTag('div');
            echo Html::endTag('div');
        }
        echo Html::endTag('div');
        ?>
    </div>
</div>

<div class="contentSection darkBusiness">
    <div class="container">
        <h1 class="simpleTitle"><?= Yii::t('main', 'HR консалтинг') ?></h1>

        <p>
            <?= Yii::t('main', 'HR консалтинг - деятельность, связанная с решением задач, стоящих перед руководителями высшего звена в области управления человеческим капиталом, с целью увеличения прибыльности бизнеса.')?>
            <?= Yii::t('main', 'Наша главная цель — внедрение индивидуальных систем управления персоналом, осуществление их внедрения и контроль успешного функционирования в организации.')?>
        </p>

        <hr>

        <?php

        $list = [
                ['icon' => Yii::getAlias('@web/img/search_red_icon.png'), 'title' => Yii::t('main', 'HR диагностика')],
                ['icon' => Yii::getAlias('@web/img/chart_up_red_icon.png'), 'title' => Yii::t('main', 'Аудит персонала')],
                ['icon' => Yii::getAlias('@web/img/goal_red_icon.png'), 'title' => Yii::t('main', 'Разработка моделей компетенций')],
                ['icon' => Yii::getAlias('@web/img/metting_red_icon.png'), 'title' => Yii::t('main', 'Корпоративная культура')],
                ['icon' => Yii::getAlias('@web/img/broatcast_red_icon.png'), 'title' => Yii::t('main', 'HR стратегия')],
                ['icon' => Yii::getAlias('@web/img/knowledge_red_icon.png'), 'title' => Yii::t('main', 'Мотивация персонала')],
                ['icon' => Yii::getAlias('@web/img/social_red_icon.png'), 'title' => Yii::t('main', 'Кадровый консалтинг')],
                ['icon' => Yii::getAlias('@web/img/exchange_red_icon.png'), 'title' => Yii::t('main', 'Создание HR отдела под «ключ»')],
        ];

        echo Html::beginTag('div', ['class' => 'someList']);
        foreach ($list as $item) {
            echo "
                <div class='item'>
                    <img src='{$item['icon']}'>
                    <span>{$item['title']}</span>
                </div>
            ";
        }
        echo Html::endTag('div');
        ?>

        <a href="#" class="btn actionButton wide darkRed pull-center"><?= Yii::t('main', 'Заказать услуги')?></a>
    </div>
</div>

<div class="section grey">
    <?= \frontend\widgets\Partners::widget([]) ?>
</div>

<div class="section feedback">
    <?= \frontend\widgets\FeedbackForm::widget([]) ?>
</div>

<?= \frontend\widgets\Footer::widget([]) ?>