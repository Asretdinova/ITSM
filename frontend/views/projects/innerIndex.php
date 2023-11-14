<?php

/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 3/2/20
 * Time: 2:44 AM
 */


/* @var $this \yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'Loyihalar');

$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/projects_inner.css');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Raleway:wght@400;600&family=Roboto+Slab:wght@500&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

<div class="bannerBox" style='background: url("<?= "/uploads/content/{$model->main_image_id}"; ?>") center center no-repeat; background-size: cover; height:700px; '>
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
                <div class="col-md-6">
                    <div class="bannerTitle">
                        <h1><?=$model->title?></h1>
                        <br>
                        <br>
                        <br>
                        <h1 style="color:#a4fdff;"><?= Yii::t('main', 'Loyihalar')?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    
    <div class="imageContentBox">
        <div class="item">
            <p><?= Yii::t('main', 'Innovatsiya, texnologiya va strategiya markazining asosiy maqsadi Oʻzbekiston Respublikasi Xalq taʼlimi tizimining innovatsion pilot loyihalarini texnik amalga oshirish va sinovdan oʻtkazish bo\'yicha muvofiqlashtiruvchi organni yaratish.') ?></p>
            <p><?= Yii::t('main', 'Markazning maqsadi - xalq taʼlimi tizimini yanada rivojlantirish uchun innovatsion texnologiyalar, platformalar, dasturiy mahsulotlarni ishlab chiqish, joriy etish va amalga oshirish.') ?></p>
            <p><?= Yii::t('main', 'Ko‘nikmalar: ') ?></p>
            <ul style="padding-left: 5%; color: #004388">
               <li><?= Yii::t('main', 'Yetakchilik;') ?></li>
               <li><?= Yii::t('main', 'Professionalizm;') ?></li>
               <li><?= Yii::t('main', 'Strategik tahlil;') ?></li>
           </ul> 
           <br>
           <br>
        </div>
        <div class="item">
            <p><?= Yii::t('main', 'Markazning missiyasi xalq taʼlimi tizimini innovatsion rivojlantirish, raqamli texnologiyalar, veb-platformalar, dasturiy mahsulotlar hamda axborot tizimlarini qoʻllagan holda zamonaviy innovatsion texnologiyalarni tadbiq etish, sohani davomiy rivojlantirish uchun strategik tahlil va rejalashtirishni amalga oshirish hisoblanadi. Quyidagi jihatlar rivjolanishning asosiy yondashuvlarini tashkil qiladi:') ?></p>
           <ul style="padding-left: 5%; color: #004388;">
               <li><?= Yii::t('main', 'Strategik rejalashtirish;') ?></li>
               <li><?= Yii::t('main', 'Novatorlik g‘oyalari;') ?></li>
               <li><?= Yii::t('main', 'Innovatsion platformalar;') ?></li>
               <li><?= Yii::t('main', 'SMART menejment;') ?></li>
               <li><?= Yii::t('main', 'Dasturiy yechimlar; ') ?></li>
               <li><?= Yii::t('main', 'Tahliliy izlanmalar.') ?></li>
           </ul> 
        </div>
    </div>
</div>


<div>
    <div class="container contentSection ">
        <p class="container darkTitle" style="color: #004388;"><?=$model->title?></p>
        <div class="adItems" style="margin-left: 5%; margin-right:5%;" >
            <?php
         
            foreach ($projects as $item) {
                ?>
            <a href="<?=Url::to(['/projects/innerview', 'id' => $item->id])?>">
                <div class="elItem digital" style='background: url("<?= "/uploads/{$item->image_id}.jpg"; ?>") center center no-repeat; background-size: cover; '>
                    <h2  style="font-weight: bold;"><?= $item->title?></h2>
                    <h2><?= $item->sub_title?></h2>
                </div>
            </a>
            <?php
            }
            ?>
            
        </div>    
    </div>
</div>



<?= \frontend\widgets\FeedbackForm::widget([]) ?>

<?= \frontend\widgets\Footer::widget([]) ?>

<style>
    .phoneNum li a{
        color: #fff!important;
    }
</style>