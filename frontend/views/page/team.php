<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 11/6/19
 * Time: 5:01 AM
 */

/* @var $model \common\models\Team[] */

use common\models\Team;

$this->title = Yii::t('main', 'Наша команда');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'О нас'), 'url' => ['/page/about']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['bannerType'] = 'team';

?>
    <h1 class="boldTitle center"><?= $this->title ?></h1>

    <p class="section_title">
        <span><i class="fas fa-user"></i></span>
        <?= Yii::t('main', 'Руководство') ?>
    </p>
    <div class="cardsList">
        <?php
        foreach ($model as $item) {
            if ($item->category == Team::CATEGORY_HEAD) {
                echo "
            <div class='card'>
                <img src='" . Yii::getAlias("@web/uploads/content/{$item->photo}.jpg") . "'>
                <div class='details'>
                    <h1>{$item->name}</h1>
                    <h6>{$item->position}</h6>
                    <p><i class='fas fa-phone-alt'></i> {$item->phone}</p>
                    <p><i class='fas fa-at'></i> <a href='mailto:{$item->mail}'>{$item->mail}</a></p>
                    <p><i class='fas fa-clock'></i> {$item->reception_days}</p>
                </div>  
            </div>
        ";
            }
        }
        ?>
    </div>

    <p class="section_title">
        <span><i class="fas fa-user-friends"></i></span>
        <?= Yii::t('main', 'Менеджеры') ?>
    </p>
    <div class="cardsList">
        <?php
        foreach ($model as $item) {
            if ($item->category == Team::CATEGORY_MANAGER) {
                echo "
            <div class='card'>
                <img src='" . Yii::getAlias("@web/uploads/content/{$item->photo}.jpg") . "'>
                <div class='details'>
                    <h1>{$item->name}</h1>
                    <h6>{$item->position}</h6>
                    <p><i class='fas fa-phone-alt'></i> {$item->phone}</p>
                    <p><i class='fas fa-clock'></i> <a href='mailto:{$item->mail}'>{$item->mail}</a></p>
                </div>  
            </div>
        ";
            }
        }
        ?>
    </div>

<?= \frontend\widgets\OurTeam::widget([]) ?>