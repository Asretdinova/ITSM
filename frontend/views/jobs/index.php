<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 11/8/19
 * Time: 5:47 AM
 */

use frontend\helpers\UtilHelper;


/* @var $model \common\models\Jobs[] */

$this->title = Yii::t('main', 'Вакансии');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'О нас'), 'url' => ['/page/about']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['bannerType'] = 'job';

$js = <<<JS
    $(document).ready(function() {
        $('.cardItemsList').isotope({
          itemSelector: '.cardItemContent',
        })
    })
JS;
$this->registerJs($js);
$this->registerJsFile(Yii::getAlias("@web/js/isotope.pkgd.min.js"), ['depends' => ['yii\web\JqueryAsset']]);

echo \yii\helpers\Html::tag('h1', $this->title, ['class' => 'title']);

if ($model && count($model) > 0) {
    echo '<div class="row cardItemsList">';
    foreach ($model as $item) {
        echo "
            <a href='" . \yii\helpers\Url::to(['jobs/view', 'id' => $item->id]) . "' class='col-md-4 cardItemContent' title='{$item->title}'>
                <div class='cardItem'>
                    <h1>{$item->title}</h1>
                    <hr>
                    <h3>{$item->apps}</h3>
                    <p>" . UtilHelper::get_words(strip_tags($item->description), 50, true) . "</p>
                    
                    <button class='actionButton right'>". Yii::t('main', 'Подробнее') ."</button>
                    
                    <div class='clearfix'></div>
                </div>
            </a>
        ";
    }

    echo "<div class='clearfix'></div></div>";
} else {
    echo '
        <div class="placeholderText">
            <i class="icon fas fa-bullhorn"></i>
            <h2>'. Yii::t('main', 'Свободных вакансий нет') .'</h2>
        </div>
        ';
}