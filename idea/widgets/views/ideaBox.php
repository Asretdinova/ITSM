<?php

/**

 * Date: 8/21/19
 * Time: 1:03 AM
 */

/* @var $this \yii\web\View */

/* @var $model \idea\models\IdeaForm */

use yii\helpers\Url;
use yii\widgets\Pjax;

?>

    <div class="idea_box">
        <div class="idea_container">

            <div class="idea_title">
                <a class="_title" href="<?= Url::to(['/idea/view', 'id' => $model->id]) ?>">
                    <?= $model->title ?>
                </a>

                <?= $model->getStatusBadge() ?>
            </div>

            <div class="clearfix"></div>
            <p class="_text"><?= \frontend\helpers\UtilHelper::get_words(strip_tags($model->text), 100) ?></p>
        </div>

        <div class="idea_info_content">
            <p class="_author">
                <?= yii::t('main', 'Автор') ?>: <?= "{$model->author_name} {$model->author_surname}" ?>
            </p>

            <p class="_date"><?= date('d.m.Y', strtotime($model->date)) ?></p>

            <a class="squareBtn mini"
               href="<?= Url::to(['/idea/view', 'id' => $model->id]) ?>"><?= Yii::t('main', 'Подробно') ?></a>
        </div>

        <?php Pjax::begin(['id' => Yii::$app->security->generateRandomString(8)]); ?>

        <div class="actionBox">
            <ul class="_actions">
                <li data-toggle="tooltip" data-placement="bottom" title="<?= Yii::t('main', 'Нравится') ?>">
                    <a
                            href="<?= Url::to(['idea/like', 'id' => $model->id]) ?>"
                            data-id="<?= $model->id ?>"
                            class="iconBtn likeBtn"
                    >
                        <i class="icon"></i>
                    </a>
                    <span class="_likes_count"><?= $model->likes ?></span>
                </li>

                <li data-toggle="tooltip" data-placement="bottom" title="<?= Yii::t('main', 'Ответы') ?>">
                    <span class="iconBtn comments"><i class="icon"></i></span>
                    <span><?= $model->commentsCount ?></span>
                </li>

                <li data-toggle="tooltip" data-placement="bottom" title="<?= Yii::t('main', 'Просмотры') ?>">
                    <span class="iconBtn views"><i class="icon"></i></span>
                    <span><?= $model->views ?></span>
                </li>
            </ul>

            <a href="<?= Url::to(['category/view', 'id' => $model->category_id]) ?>"
               class="_category"><?= @$model->category->title ?></a>
        </div>
        <?php Pjax::end(); ?>

        <div class="clearfix"></div>
    </div>

<?php
$js = <<<JS
    function loadLikes() {
        var obj = $('.idea_box li');
        var likes = ($.cookie("likes"));
        
        if (typeof(likes) != 'undefined') {
            likes = JSON.parse(likes);

            $('.idea_box').each(function( index ) {
                var elem = $(this).find('.likeBtn');
                if ($.inArray(parseInt($(elem).attr('data-id')), likes) > -1) {
                    $(elem).addClass('active');
                }
            })
        }
    }

    $(document).ready(function () {
        loadLikes();

        $('.likeBtn').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            if (!$(this).hasClass("active")) {
                var id = parseInt($(this).attr('data-id'));
                var likes = ($.cookie("likes"));

                if (typeof(likes) == 'undefined') {
                    likes = [];
                } else
                    likes = JSON.parse(likes);

                if ($.inArray(id, likes) < 0) {
                    var obj = $(this);
                    $.ajax({
                        type : "POST",
                        cache : false,
                        url : $(this).attr("href"),
                        success : function(data) {
                            data = JSON.parse(data);
                            var count = data['count'];

                            $(obj).addClass('active');
                            $(obj).closest('._actions').find('li ._likes_count').text(count);

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

?>