<?php

/* @var $model \common\models\EduKids[] */

use yii\helpers\Url;
use frontend\controllers\EduKidsController;

$this->registerCssFile('@web/css/jquery.fancybox.min.css');
$this->registerJsFile('@web/js/jquery.fancybox.min.js', ['depends' => ['yii\web\JqueryAsset']]);

$js = <<<JS
    $("._eduKids").owlCarousel({
        autoplay: false,
        nav: true,
        navText: ['<i class="arrow left"></i>', '<i class="arrow right"></i>'],
        dots: false,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            650: {
                items: 3
            }
        }
    });

    $.fancybox.defaults.btnTpl.download2 = $.fancybox.defaults.btnTpl.download.replace('data-fancybox-download', '');
    $('[data-fancybox]').fancybox({
        buttons: [
            "download2",
            "close"
        ],
        beforeShow : function(instance, slide) { 
            instance.\$refs.container.find('.fancybox-button--download').attr('href', slide.src);
        }
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="eduKids">
    <div class="row section">
        <p class="boldTitle center">Edu Kids</p>

        <div class="owl-carousel owl-theme _eduKids scrollNavs">
            <?php
            foreach ($model as $item) {
                echo "
                    <a href='" . Yii::getAlias("@web/{$item->video}") . "' class='item' data-fancybox='eduKidsGroup' data-caption='{$item->title}' id='{$item->id}'>
                        <div class='photoBox'>
                            <img src='" . Yii::getAlias("@web/{$item->thumb}") . "'>
                        </div>
                        <div class='textArea'>
                            <p>{$item->title}</p>
                        </div>
                    </a>      
                ";
            }
            ?>
        </div>

        <a class="actionButton"
           href="<?= Url::to(['/edu-kids']) ?>"><?= Yii::t('main', 'Посмотреть все') ?></a>
    </div>
</div>
<?php
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
JS;
$this->registerJs($js);
if(isset($_POST['id'])) {
EduKidsController::viewedCounter($_POST['id']);
    exit($_POST['id']);
  }