<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 3/2/20
 * Time: 2:44 AM
 */


/* @var $this \yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'Loyihalar');

$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/project_view.css');

$this->registerJsFile(Yii::getAlias("@web/js/owl.carousel.min.js"), ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile(Yii::getAlias("@web/css/owl.carousel.min.css"));
$this->registerCssFile(Yii::getAlias("@web/css/owl.theme.default.css"));

$js = <<<JS
    $(".projectList").owlCarousel({
        autoplay: false,
        nav: true,
        navText: ['<i class="arrow left"></i>', '<i class="arrow right"></i>'],
        dots: false,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2
            },
            800: {
                items: 4
            },
            1200: {
                items: 7
            }
        }
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Raleway:wght@400;600&family=Roboto+Slab:wght@500&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

<div class="bannerBox"  style='background: url("<?= "/uploads/{$model->main_image_id}.png"; ?>") center center no-repeat; background-size: cover; height:700px; '>
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

        <div class="container" >
            <div class="row" >

                <div class="col-md-4">
                    <div class="bannerTitle">
                        <h1 style="color:#287cc3;"><?=  $model->title?></h1>
                        <br>
                        <h1 style="text-transform: none; font-size:36px;"><?=  $model->sub_title?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    
    <div class="row imageContentBox " style="justify-content: center;">
        <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
            <br>
            <?=$model->content?>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6" style="background-color: #f5f9ff;">
           <div style="padding: 5%;">
               <img src="<?=Yii::getAlias("@web/uploads/{$model->logo_id}.png")?>" alt="">
               <ul style="list-style-type:none; font-size: 18px; line-height: 3rem; padding-top:20px;">
                   <li><?= Yii::t('main', '<b>Loyiha nomi: </b>'); echo $model->title?></li>
                   <li><?= Yii::t('main', '<b>Loyiha toifasi:</b> '); echo $type->title?></li>
                   <li><?= Yii::t('main', '<b>Loyiha buyurtmachisi:</b> '); echo $customer->title?></li>
                   <li><?= Yii::t('main', '<b>Loyihani ishlab chiqqan departament:</b> '); echo $department->title?></li>
                   <li><?= Yii::t('main', '<b>Loyihani ishlab chiqishdagi hamkorlar:</b> Xalq ta’limi vazirligi');?></li>
                   <li><?= Yii::t('main', '<b>Loyiha davomiyligi:</b> '); echo substr($model->date, 0, 4); echo Yii::t('main', '-yildan buyon davom etmoqda'); ?></li>
               </ul>
               <div class="row versions">
                   <a href="<?=$model->web_link?>" target="_blank"><div class="col-md-3"><p><?= Yii::t('main', 'Web Site');?></p></div></a>
                   <a href="<?=$model->mobile_link?>" target="_blank"><div class="col-md-3"><p><?= Yii::t('main', 'Android');?></p></div></a>
                   <a href="<?=$model->ios_link?>" target="_blank"><div class="col-md-3"><p><?= Yii::t('main', 'IOS');?></p></div></a>
               </div>
           </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="content2">
         <?=$model->content2?>
    </div>
    <div class="video">
        <iframe width="85%" height="500px" src="<?=Yii::getAlias("@web/uploads/video/{$model->video_id}.mp4")?>" title="YouTube video player" frameborder="0" allow=" clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="content3">
    <?=$model->content3?>
    </div>
</div>
<section>
    <div class="row" style="background-color: #f5f9ff; padding: 3% 0%"> 
    <div class="col-md-4" style="padding-left: 10%;">
        <h2 style="padding-top:10%; color: #004388;font-weight: 700; font-family: 'Montserrat'; text-transform: uppercase;"><?= Yii::t('main', $model->title . ' LOYIHASIGA DOIR  FOTOGALEREYA');?></h2>
    </div>
    <div class="col-md-8">
    <div class=" projectList owl-carousel owl-theme">
         <?php
        foreach ( $list as $item) {
            echo "
            <div class='item'>
                <a href='' target='_blank' title=''>
                    <img src=" . Yii::getAlias("@web/uploads/mini_gallery/{$item}") . ">
                </a>
            </div>
        ";
        }
        ?>
    </div>
    </div>

    </div>
</section>

<?= \frontend\widgets\Partners::widget([]) ?>

<?= \frontend\widgets\FeedbackForm::widget([]) ?>

<?= \frontend\widgets\Footer::widget([]) ?>

<style>
    .phoneNum li a{
        color: #fff!important;
    }
</style>