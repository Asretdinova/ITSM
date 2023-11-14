<?php

use yii\helpers\Url;

?>
<div class="eventsList">
    <div class="container relative">
        <p class="boldTitle center"><?= Yii::t('main', 'Новости') ?></p>

        <div class="elementsList">
            <?php
            /* @var $model \common\models\Content[] */
            foreach ($model as $item) {
                echo "
                    <div class='col-md-4'>
                        <a href='". Url::to(['/events/view', 'id' => $item->id]) ."' class='item'>
                            <div class='image'>
                                <img src='" . Yii::getAlias("@web/uploads/{$item->image_id}.jpg") . "'>
                            </div>
                            
                            <div class='boxContent'>
                                <h1>{$item->title}</h1>
                                <p>" . \frontend\helpers\UtilHelper::get_words(strip_tags($item->content), 20) . "</p>
                                
                                <button  href='" . Url::to(['/press-releases/view', 'id' => $item->id]) . "'>" . Yii::t('main', 'Подробнее') . "</button>
                                
                                <span class='date'>". date('d.m.Y', strtotime($item->date)) ."</span>
                            </div>
                        </a>
                    </div>
            ";
            }
            ?>
            
        </div>
        <a class="actionButton align-center" style="margin-top: 40px!important; margin-bottom:20px!important;"
           href="<?= Url::to(['/events/view', 'id' => $item->id]) ?>"><?= Yii::t('main', 'Все новости') ?></a>
    </div>
</div>