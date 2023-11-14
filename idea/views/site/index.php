<?php

/* @var $this yii\web\View */
/* @var $categories \common\models\Categories[] */
/* @var $recentIdeas \common\models\Ideas[] */
/* @var $popularIdeas \common\models\Ideas[] */

/* @var $idea \idea\models\IdeaForm */

/* @var $model \common\models\Ideas */

use idea\widgets\LinksList;
use yii\helpers\Html;
use yii\helpers\Url;

?>

    <div class="tree_bar">
        <div class="container relative full_height">
            <div class="row section full_height">
                <div class="text_box_holder">
                    <div class="text_box">
                        <h1 class="big_title"><?= Yii::t('main', 'Подай идею прямо сейчас!') ?></h1>

                        <p><?= Yii::t('main', 'Отправляйте свои идеи и предложения для развития сферы народного образования. После проверки модератором они будут размещены на Портале. Каждая идея и предложение будет рассмотрено специальной комиссией') ?></p>
                    </div>
                </div>

                <div class="big_tree <?= Yii::$app->language ?>"></div>

                <div class="buttonsList ">
                    <a href="<?= Url::to(['idea/submit']) ?>"
                       class="squareBtn lightVersion ideBtn "><?= Yii::t('main', 'Подать идею!') ?></a>

                   <?php
                    if (Yii::$app->language=='ru')
                    {
                        echo "  <a href='https://forms.gle/GK6QbUYJXW5Nn7S59' 
                       class='squareBtn darkVersion pullBtn text-center'>" . Yii::t('main', 'Опрос о внедрении новых интерактивных государственных услуг в сфере народного образования!') . "</a>";
                    }
                    else {
                        echo "  <a href='https://forms.gle/ZbayihrxjY33bXA5A' 
                       class='squareBtn darkVersion pullBtn text-center' >" . Yii::t('main', 'Опрос о внедрении новых интерактивных государственных услуг в сфере народного образования!') . "</a>";

                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="container">
        <div class="row section">
            <?php

            $js = <<<JS
                $(document).ready(function() {
                    $('.owl-carousel').owlCarousel({
                        items: 1,
                        loop: true,
                        margin: 10,
                        autoplay: true,
                        autoplayTimeout:5000,
                        autoplayHoverPause: true
                    })
                });
JS;

            $this->registerCssFile('@web/css/owl.carousel.min.css');
            $this->registerJsFile('@web/js/owl.carousel.min.js');
            $this->registerJs($js);
            ?>

            <div class="owl-carousel owl-theme">
                <div class="item">
                    <a target='_blank' href='http://kitob.uz/'><img src='<?= Yii::getAlias('@web/img/kitob_banner_'.Yii::$app->language.'.png') ?>' class='bannerImage'></a>
                </div>

                <div class="item">
                    <a target='_blank' href='http://edumarket.uz/'><img src='<?= Yii::getAlias('@web/img/edu_banner_'.Yii::$app->language.'.png') ?>' class='bannerImage'></a>
                </div>
            </div>
        </div>
    </div>

    <div class="no-scroll">
        <div class="container">
            <div class="row section">
                <div class="categories_bar zetter">
                    <?php
                    foreach ($categories as $item) {
                        echo "
                        <div class='category_item_holder'>
                            <a class='category_item' href='" . Url::to(['/category/view', 'id' => $item->id]) . "'>
                                <div class='category_item_image'>
                                    <span class='amount'>{$item->countIdeas}</span>
                                    
                                    <img src='" . Yii::getAlias('@web/uploads/categories/' . @$item->icon . '.png') . "'>
                                </div>
                                
                                <div class='tabular'>
                                    <h2>{$item->title}</h2>
                                </div>
                            </a>
                        </div>
                    ";
                    }
                    ?>

                    <div class="clearfix marger"></div>
                    <a href="<?= Url::to(['/site/how-it-works']) ?>"
                       class="squareBtn pull-center"><?= Yii::t('main', 'Как оно работает?') ?></a>
                </div>
            </div>

            <div class="row section">
                <?= LinksList::widget([]) ?>
            </div>

            <div class="row section">
                <div id="last_added" class="col-md-6 ideasList">
                    <p class="middle_title"><?= Yii::t('main', 'Последнее добавленное') ?></p>

                    <?php
                    if (count($recentIdeas) > 0) {
                        foreach ($recentIdeas as $item) {
                            echo \idea\widgets\IdeaBox::widget([
                                'model' => $item
                            ]);
                        }
                    } else {
                        echo "
                        <div class='emptyList'>
                            <i class='fas fa-list-ul'></i>
                            <p>" . Yii::t('main', 'Список пуст') . "</p>
                        </div>
                    ";
                    }
                    ?>
                </div>

                <div id="most_popular" class="col-md-6 ideasList">
                    <p class="middle_title"><?= Yii::t('main', 'Самые обсуждаемые') ?></p>

                    <?php
                    if (count($popularIdeas) > 0) {
                        foreach ($popularIdeas as $item) {
                            echo \idea\widgets\IdeaBox::widget([
                                'model' => $item
                            ]);
                        }
                    } else {
                        echo "
                        <div class='emptyList'>
                            <i class='fas fa-list-ul'></i>
                            <p>" . Yii::t('main', 'Список пуст') . "</p>
                        </div>
                    ";
                    }
                    ?>
                </div>
            </div>

            <div id="statistics" class="statBox">
                <p class="middle_title text-center"><?= Yii::t('main', 'Статистика') ?></p>

                <div class="stat row">
                    <div class="statItem col-md-3 col-xs-6">
                        <img src="/img/download_icon.png">

                        <div>
                            <p><?= $model->getAllIdeasCount() ?></p>
                            <span><?= Yii::t('main', 'Поступило') ?></span>
                        </div>
                    </div>

                    <div class="statItem col-md-3 col-xs-6">
                        <img src="/img/time_icon.png">

                        <div>
                            <p><?= $model->getProcessIdeasCount() ?></p>
                            <span><?= Yii::t('main', 'На рассмотрении') ?></span>
                        </div>
                    </div>

                    <div class="statItem col-md-3 col-xs-6">
                        <img src="/img/done_icon.png">

                        <div>
                            <p><?= $model->getPublishedIdeasCount() ?></p>
                            <span><?= Yii::t('main', 'Принято') ?></span>
                        </div>
                    </div>

                    <div class="statItem col-md-3 col-xs-6">
                        <img src="/img/comment_icon.png">

                        <div>
                            <p><?= $model->getAllCommentsCount() ?></p>
                            <span><?= Yii::t('main', 'Комментариев') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= \idea\widgets\VotePool::widget([]) ?>