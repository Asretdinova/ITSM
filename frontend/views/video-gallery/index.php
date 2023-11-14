<?php

/**

 * Date: 8/18/19
 * Time: 4:16 PM
 */

/* @var $this \yii\web\View */

/* @var $model \common\models\GalleryCategory[] */

use yii\helpers\Html;
use yii\helpers\Url ;


$this->title = Yii::t('main', 'Видеогалерея');
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

echo '<div class="images_list">' ;

foreach ($videocategory as $item) {
        echo "
                <a href='" . Url::toRoute(['video-gallery/view','id'=>$item->id]) . "'  class='gItem'  >
                    <div class='imageBox'>
                        <img src='" . Yii::getAlias("@web/{$item->image}") . "'>
                    </div>
                    
                    <h1>{$item->title_en}</h1>
                </a>
            ";
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
