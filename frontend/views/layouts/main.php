<?php

/* @var $this \yii\web\View */

/* @var $content string */

/* @var $events string */

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= Yii::getAlias("@web/favicon.png") ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f36c20040682f06"></script>

    <title><?= ($this->title) ? Html::encode($this->title) : Yii::t('main', 'Центр инновации, технологии и стратегии') ?></title>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f36a0019f504a001297ceef&product=inline-share-buttons" async="async"></script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">
        stLight.options({
            publisher:'12345',
        });
    </script>


    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= \frontend\widgets\FixedMenu::widget() ?>

<?= $this->render('_header') ?>

<div class="breadcrumbsRow">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
</div>
<div class="container">
    <?= $content ?>
</div>

<?= \frontend\widgets\FeedbackForm::widget([])?>

<?= \frontend\widgets\Footer::widget([]) ?>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
