<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 10/16/19
 * Time: 5:36 AM
 */

/* @var $this yii\web\View */

/* @var $projects \common\models\Content */

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'О нас');
$this->params['breadcrumbs'][] = $this->title;
$this->params['bannerType'] = 'about';
?>

<h1 class="boldTitle center"><?= Yii::t('main', 'Кто мы?') ?></h1>
<p class="miniTitle"><?= Yii::t('main', 'О Центре') ?></p>
<p class="simpleText"><?= Yii::t('main', 'Инновационные технологии трансформируют учебный процесс для преподавателей и учащихся во всем мире. Согласно Концепции развития системы народного образования Республики Узбекистан до 2030 года, применяются активные действия в целях модернизации системы. Исходя из задач, упомянутых в Концепции: внедрение современных информационно-коммуникационных технологий и инновационных проектов в сферу народного образования, внедрение современных методов и направлений внешкольного образования, а также воспитание молодежи и обеспечение ее занятости, ГУП “Центр Инновации, технологии и стратегии” (ITSM) ставит амбициозные цели по реализации данных программ.') ?></p>
<p class="simpleText"><?= Yii::t('main', 'ITSM был учрежден 28 ноября 2018 года при Министерстве народного образования Республики Узбекистан. ITSM сфокусирован на развитии системы народного образования за счет внедрения современных инновационных технологий, веб-платформ, программных продуктов и информационных систем, а также проведения стратегического анализа для развития отрасли.') ?></p>
<p class="simpleText"><?= Yii::t('main', 'Проекты ITSM направлены на цифровизацию и автоматизацию процессов управления системой народного образования Узбекистана и внедрение инновационных подходов, платформ и систем для расширения возможностей учителей и учеников.') ?></p>

<br>
<br>
<p class="miniTitle"><?= Yii::t('main', 'Наша миссия') ?></p>

<p class="simpleText"><?= Yii::t('main', 'Инновационное развитие системы народного образования, внедрение современных технологий и планирование дальнейшего развития отрасли.') ?></p>

<div class="row roundsList">
    <div class="col-md-4">
        <div class="roundBox">
            <img src="<?= Yii::getAlias("@web/img/puzzle.png") ?>">
        </div>
        <p><?= Yii::t('main', 'Стратегическое планирование') ?></p>
    </div>

    <div class="col-md-4">
        <div class="roundBox">
            <img src="<?= Yii::getAlias("@web/img/lamp.png") ?>">
        </div>
        <p><?= Yii::t('main', 'Новаторские идеи') ?></p>
    </div>

    <div class="col-md-4">
        <div class="roundBox">
            <img src="<?= Yii::getAlias("@web/img/stat.png") ?>">
        </div>
        <p><?= Yii::t('main', 'Инновационные платформы') ?></p>
    </div>

    <div class="col-md-4">
        <div class="roundBox">
            <img src="<?= Yii::getAlias("@web/img/social.png") ?>">
        </div>
        <p><?= Yii::t('main', 'SMART менеджмент') ?></p>
    </div>

    <div class="col-md-4">
        <div class="roundBox">
            <img src="<?= Yii::getAlias("@web/img/jumla.png") ?>">
        </div>
        <p><?= Yii::t('main', 'Программные решения') ?></p>
    </div>

    <div class="col-md-4">
        <div class="roundBox">
            <img src="<?= Yii::getAlias("@web/img/science.png") ?>">
        </div>
        <p><?= Yii::t('main', 'Аналитические исследования') ?></p>
    </div>

    <div class="clearfix"></div>
    <div class="marger"></div>
    <a href="<?= Yii::getAlias('@web/uploads/presentation_en.pdf') ?>" class="actionButton center"><?= Yii::t('main', 'Скачать презентацию') ?></a>
</div>

<div class="marger clearfix"></div>
<div class="marger clearfix"></div>

<div class="roundBoxContent">
    <div class="textBox">
        <h1 class="boldTitle"><?= Yii::t('main', 'Наша цель: рост и развитие') ?></h1>

        <p><?= Yii::t('main', 'Разработка и внедрение инновационных технологий, платформ, программных продуктов для дальнейшего развития системы народного образования.') ?></p>
    </div>

    <div class="roundContent dark">
        <img class="fullImg" src="<?= Yii::getAlias("@web/img/planet.jpg") ?>">
    </div>
</div>

<div class="marger clearfix"></div>
<div class="marger clearfix"></div>

<div class="roundBoxContent right large">
    <div class="roundContent dark">
        <img class="fullImg" src="<?= Yii::getAlias("@web/img/lamp.jpg") ?>">
    </div>

    <div class="textBox">
        <h1 class="boldTitle"><?= Yii::t('main', 'Навыки') ?></h1>

        <ul class="numbersList">
            <li>
                <span class="largeNum">1</span>
                <span><?= Yii::t('main', 'Лидерство') ?></span>
                <i class="fas fa-check-circle"></i>
            </li>
            <li>
                <span class="largeNum">2</span>
                <span><?= Yii::t('main', 'Профессионализм') ?></span>
                <i class="fas fa-check-circle"></i>
            </li>
            <li>
                <span class="largeNum">3</span>
                <span><?= Yii::t('main', 'Стратегический анализ') ?></span>
                <i class="fas fa-check-circle"></i>
            </li>
            <li>
                <span class="largeNum">4</span>
                <span><?= Yii::t('main', 'Инициативность') ?></span>
                <i class="fas fa-check-circle"></i>
            </li>
            <li>
                <span class="largeNum">5</span>
                <span><?= Yii::t('main', 'Креативность') ?></span>
                <i class="fas fa-check-circle"></i>
            </li>
            <li>
                <span class="largeNum">6</span>
                <span><?= Yii::t('main', 'Новаторство') ?></span>
                <i class="fas fa-check-circle"></i>
            </li>
        </ul>
    </div>
</div>