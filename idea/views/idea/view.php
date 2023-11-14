<?php

/**

 * Date: 8/24/19
 * Time: 1:26 AM
 */

use common\models\Ideas;
use idea\helpers\GeneralHelper;
use idea\widgets\IdeaBox;
use sjaakp\loadmore\LoadMorePager;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $model \common\models\Ideas */
/* @var $form \common\models\Comments */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => @$model->category->title, 'url' => ['/category/view', 'id' => $model->category_id]];
$this->params['breadcrumbs'][] = $this->title;

$js = <<<JS
    $('#sticky').stickySidebar({
        topSpacing: 20,
        bottomSpacing: 20
  });
JS;

$this->registerJsFile('@web/js/jquery.sticky-sidebar.js');
$this->registerJs($js, \yii\web\View::POS_READY);
?>

    <div class="idea_view">
        <div class="idea_content">
            <?= Html::tag('p', $this->title, ['class' => 'title']) ?>

            <h1 class="mini"><?= Yii::t('main', 'Описание предложения') ?></h1>
            <?= Html::tag('p', $model->text) ?>

            <h1 class="mini"><?= Yii::t('main', 'Целесообразность идеи / предложения') ?></h1>
            <?= Html::tag('p', $model->implementation) ?>

            <h1 class="mini"><?= Yii::t('main', 'Возможные пути реализации идеи / предложения') ?></h1>
            <?= Html::tag('p', $model->expediency) ?>

            <div class="commentsSection">
                <h1><?= Yii::t('main', 'Комментарии') ?> (<?= $dataProvider->totalCount ?>)</h1>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'tableOptions' => [],
                    'showHeader' => false,
                    'layout' => "{items}\n{pager}",
                    'emptyText' => Yii::t('main', 'Нет комментариев'),
                    'pager' => [
                        'class' => LoadMorePager::className(),
                        'label' => Yii::t('main', 'Показать еще'),
                        'options' => [
                            'class' => 'paginationBtn'
                        ],
                    ],
                    'columns' => [
                        [
                            'value' => function ($item) {
                                return "
                                    <div class='comment_box'>
                                        <div class='author_box bold'>
                                            " . GeneralHelper::makeIconFromText($item->author_name) . "
                                            
                                            <div class='listable'>
                                                <span>{$item->author_name} {$item->author_surname}</span>
                                                <span class='date'>" . date('d.m.Y H:i', strtotime($item->date)) . "</span>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class='text_content'>
                                            <p>{$item->comment}</p>
                                        </div>
                                    </div>
                                ";
                            },
                            'format' => 'raw'
                        ]
                    ],
                ]) ?>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <?= $this->render('_form', [
                        'model' => $form
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="idea_details">
            <div id="sticky">
                <div class="status_box">
                    <ul>
                        <li>
                            <h1><?= Yii::t('main', 'Категория') ?>:</h1>

                            <?= Html::a(@$model->category->title, ['category/view', 'id' => $model->category_id]) ?>
                        </li>

                        <li>
                            <h1><?= Yii::t('main', 'Статус') ?>:</h1>

                            <?= $model->getStatusBadge('inlist') ?>

                            <?php
                                if ($model->status == Ideas::STATUS_REJECTED) {
                                    echo '<a href="#" class="linkBtn" data-toggle="modal" data-target="#reasonModal">'. Yii::t('main', 'Причина отказа') .'</a>';
                                }
                            ?>
                        </li>

                        <li>
                            <h1><?= Yii::t('main', 'Автор') ?>:</h1>

                            <div class="author_box">
                                <?= GeneralHelper::makeIconFromText($model->author_name) ?>
                                <span><?= "{$model->author_name}<br>{$model->author_surname}" ?></span>
                            </div>
                        </li>

                        <li>
                            <h1><?= Yii::t('main', 'Дата и время подачи идеи') ?>:</h1>

                            <?= date('d.m.Y H:i', strtotime($model->date)) ?>
                        </li>

                        <li>
                            <h1><?= Yii::t('main', 'Презентация') ?>:</h1>

                            <div>
                                <?= Html::img("@web/img/presentation.png", ['style' => 'margin-right: 10px']) ?>
                                <?= Html::a(Yii::t('main', 'Скачать файл'), "{$model->base_idea_url}/uploads/files/{$model->file}") ?>
                            </div>
                        </li>

                        <li>
                            <h1><?= Yii::t('main', 'Поделиться идеей') ?>:</h1>

                            <div class="shareButtons">
                                <?= \ymaker\social\share\widgets\SocialShare::widget([
                                    'configurator' => 'socialShare',
                                    'url' => \yii\helpers\Url::to(['idea/view', 'id' => $model->id], true),
                                    'title' => $this->title,
                                ]); ?>
                            </div>
                        </li>

                        <li>
                            <div class="support_counter">
                                <span class="_counter"><?= $model->likes ?></span>
                                <span><?= Yii::t('main', 'Поддержало') ?></span>
                            </div>

                            <button href="<?= Url::to(['idea/like', 'id' => $model->id]) ?>" class="bigLikeBtn"
                                    data-id="<?= $model->id ?>">
                                <span class="icon"></span><?= Yii::t('main', 'Поддержать') ?>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php
$js = <<<JS
    function loadLike() {
        var likes = ($.cookie("likes"));
        try {
            likes = JSON.parse(likes);
        } catch (e) {
            likes = [];
        }
        
        var elem = $('.bigLikeBtn');
        if ($.inArray(parseInt($(elem).attr('data-id')), likes) > -1) {
            $(elem).addClass('active');
        }
    }

    $(document).ready(function () {
        loadLike();

        $('.bigLikeBtn').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            if (!$(this).hasClass("active")) {
                var id = parseInt($(this).attr('data-id'));
                var likes = ($.cookie("likes"));

                try {
                    likes = JSON.parse(likes);
                } catch (e) {
                    likes = [];
                }

                if ($.inArray(id, likes) < 0) {
                    var obj = $(this);
                    $.ajax({
                        type : "POST",
                        cache : false,
                        url : $(this).attr("href"),
                        success : function(data) {
                            data = JSON.parse(data);
                            $('.support_counter ._counter').text(data['count']);
                            $('.bigLikeBtn').addClass('active');
                            
                            likes.push(id);
                            $.cookie("likes", JSON.stringify(likes), {path: '/'});
                        }
                    });
                }
            }
        });
    });
JS;

$this->registerJs($js, \yii\web\View::POS_READY);


if ($model->status == Ideas::STATUS_REJECTED) {
    Modal::begin([
        'header' => Yii::t('main', 'Причина отказа'),
        'id' => 'reasonModal'
    ]);

    echo $model->reason;

    Modal::end();
}
