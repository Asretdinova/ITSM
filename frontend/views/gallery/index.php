<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 8/18/19
 * Time: 4:16 PM
 */

/* @var $this \yii\web\View */

/* @var $model \common\models\GalleryCategory[] */

use yii\helpers\Html;

$this->title = Yii::t('main', 'Фото Галерея');
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/jquery.fancybox.min.css');
$this->registerJsFile('@web/js/jquery.fancybox.min.js', ['depends' => ['yii\web\JqueryAsset']]);
$js = '
    $("document").ready(function() {
        $("[data-fancybox]").fancybox({
            baseClass: "awesome-gally",
            protect: true,
            thumbs : {
                autoStart : true,
                axis: "x"
            },
            zoomOpacity: false,
            animationEffect: false,
            buttons: [
                "close"
            ],         
        });
    });
';

$this->registerJs($js);

echo \yii\helpers\Html::tag('p', $this->title, ['class' => 'title']);

echo '<div class="images_list">';
foreach ($model as $list) {
    $i = 0;
    foreach ($list->gallery as $item) {
        $class = ($i == 0) ?: 'hidden';
        echo "
            <a href='" . Yii::getAlias("@web/uploads/gallery/{$item->image}.jpg") . "' data-fancybox='gallery_group_{$list->id}' data-caption='{$item->title}' class='gItem {$class}'>
                <div class='imageBox'>
                    <img src='" . Yii::getAlias("@web/uploads/gallery/thumbs/{$item->image}.jpg") . "'>
                </div>
                
                <h1>{$list->title}</h1>
            </a>
        ";

        $i++;
    }
}
echo "</div>";

$js = <<<JS
    $(document).ready(function() {
        $('.images_list').isotope({
          itemSelector: '.gItem',
        })
    })
JS;
$this->registerJs($js);
$this->registerJsFile(Yii::getAlias("@web/js/isotope.pkgd.min.js"), ['depends' => ['yii\web\JqueryAsset']]);
