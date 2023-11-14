<?php

/* @var $this yii\web\View */

use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $model \common\models\Achievements[] */

$this->title = Yii::t('main', 'Наша история и достижения');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile("@web/js/isotope.pkgd.min.js", ['depends' => ['yii\web\JqueryAsset']]);
$this->registerJsFile("@web/js/modulo-columns.js", ['depends' => ['yii\web\JqueryAsset']]);
$this->registerJs("
    $('.achievementsTree').isotope({
        itemSelector: '.item',
        layoutMode: 'moduloColumns',
        moduloColumns: {
            columnWidth: 40,
            gutter: 20
        }
    })
");
?>

<div class="bannerTextBox">
    <div class="bigBanner mini">
        <div class="headerTitle buildings">
            <h2><?= Yii::t('main', 'История достижений нашего центра') ?></h2>

            <p><?= Yii::t('main', 'Предлагаем ознакомиться развитием центра инноваций! <br>Хронология событий и успех в поставленных целях') ?></p>
        </div>
    </div>

    <div class="bannerText">
        <div class="container">
            <h1 class="title">ITSM</h1>
            <p class="subText"><?= Yii::t('main', 'Центр инновации, технологии и стратегии') ?></p>

            <p class="subGrayText"><?= Yii::t('main', 'Целью центра является развитие системы народного образования, внедрение современных инновационных технологий с учетом применения цифровых технологий, веб-платформ, программных продуктов и информационных систем, проведения стратегического анализа и планирования для дальнейшего развития отрасли. Ключевыми подходами развития являются следующие аспекты') ?></p>
        </div>
    </div>
</div>

<div class="container">
    <div class="achievementsTree">
        <?php
        foreach ($model as $item) {
            echo strtr("
                    <div class='item'>
                        {{img}}
                        <h1>{{year}}</h1>
                        <h2>{{monthDay}}</h2>
                        <div class='description'>
                            <p>{{description}}</p>
                        </div>
                        
                        {{link}}
                    </div>
                ", [
                '{{img}}' => Html::img(Yii::getAlias("@web/uploads/{$item->image}.jpg")),
                '{{year}}' => date("Y", strtotime($item->date)),
                '{{monthDay}}' => date("d.m", strtotime($item->date)),
                '{{description}}' => $item->description,
                '{{link}}' => ($item->has_content)
                    ? Html::a(Yii::t('main', 'Подробнее'), '#', [
                        'data-target' => "#" . md5($item->id),
                        'data-toggle' => 'modal',
                        'class' => 'actionButton orange'
                    ])
                    : (
                    (substr($item->url, 0, 4) === "http"
                        ? Html::a(Yii::t('main', 'Подробнее'), $item->url, [
                            'class' => 'actionButton orange',
                            'target' => '_blank'
                        ])
                        : Html::a(Yii::t('main', 'Подробнее'), [$item->url], [
                            'class' => 'actionButton orange'
                        ])
                    )),
                '{{about_text}}' => Yii::t('main', 'Подробнее'),
            ]);
        }
        ?>
    </div>

    <?php
    foreach ($model as $item) {
        if ($item->has_content) {
            Modal::begin([
                'id' => md5($item->id),
                'size' => Modal::SIZE_LARGE
            ]);

            echo $item->content;

            Modal::end();
        }
    }
    ?>
</div>
