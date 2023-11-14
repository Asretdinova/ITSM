<?php

/**

 * Date: 8/18/19
 * Time: 4:16 PM
 */

/* @var $this \yii\web\View */

/* @var $model \common\models\GalleryCategory[] */

use frontend\controllers\VideoGalleryController;
use yii\helpers\Html;
use yii\helpers\Url ;


$this->title = $title;
// $this->registerMetaTag(['property' => 'og:description', 'content' => strip_tags($model->content)], 'og:description');
$this->registerMetaTag(['property' => 'og:url ', 'content' =>'https://itsm.uz/uz/video-gallery/view?id='.$model->id], 'og:url');
$this->registerMetaTag(['property' => 'og:image ', 'content' => 'https://itsm.uz/uploads/videogallery/'.$model->thumb.'.jpg'], 'og: image');
$this->registerMetaTag(['name' => 'twitter:card', 'content' => 'summary_large_image']);
$this->registerMetaTag(['name' => 'twitter:title', 'content' =>$model->title ]);
$this->registerMetaTag(['name' => 'twitter:site', 'content' =>'https://itsm.uz/uz/video-gallery/view?id='.$model->id ]);
// $this->registerMetaTag(['name' => 'twitter:description', 'content' => strip_tags($model->content)]);
$this->registerMetaTag(['name' => 'twitter:image', 'content' => 'https://itsm.uz/uploads/videogallery/'.$model->thumb.'.jpg']);
$this->registerMetaTag(['name' => 'twitter:creator', 'content' => 'https://itsm.uz/uz']);

$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/jquery.fancybox.min.css');
$this->registerJsFile('@web/js/jquery.fancybox.min.js', ['depends' => ['yii\web\JqueryAsset']]);

$js = <<<JS
     $.fancybox.defaults.btnTpl.download2 = $.fancybox.defaults.btnTpl.download.replace('data-fancybox-download', '');
    $('[data-fancybox]').fancybox({
        buttons: [
            "download2",
            "share",
            "close"
        ],
        beforeShow : function(instance, slide) { 
            instance.\$refs.container.find('.fancybox-button--download').attr('href', slide.src);
        }
        function() {
        this.title = '<a href="' + this.href + '" class="addthis_button" addthis:url="' + this.href + '" addthis:title="' + this.title + '"></a>' + (this.title ? ' ' + this.title : '');}
        afterShow : function() {
        addthis.button(
            $(".addthis_button").get()
        );
    },
    helpers : {
        title : {
            type : 'inside'
        }   
    }
    });

JS;
$this->registerJs($js);

echo \yii\helpers\Html::tag('p', $this->title, ['class' => 'title']);

echo '<div class="images_list"  >' ;

foreach ($videogallery as $item) {
        echo "
     
     
        <a href='" . Yii::getAlias("@web/{$item->video}") . "' data-fancybox='eduKidsGroup' data-caption='{$item->title}'id='{$item->id}'>
        <i class='date'>" . date('d.m.Y', strtotime($item->date)) . "</i>
        <i class='fa fa-eye' style='padding-left:10px; line-height: 1.3;'></i> {$item->seen}           
        <div class='imageBox'>
                        <img src='" . Yii::getAlias("@web/{$item->thumb}") . "'>
                    </div>
                    <h1>{$item->title_en}</h1>
                </a>
            ";
}

echo "</div>";
echo "<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type='text/javascript' src='//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f36c20040682f06'></script>
";
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
$js = <<<JS
  $('[data-fancybox]').click(function() {
    var id = $(this).attr('id');
    $.ajax({
    type: "POST",
    data: {
      "id" : id
    },
    success: function(data){
      console.log(data)
    }
  });
});
$("[data-fancybox]").fancybox({
   
});
JS;
$this->registerJs($js);
if(isset($_POST['id'])) {
VideogalleryController::viewedCounter($_POST['id']);
    exit($_POST['id']);
  }
