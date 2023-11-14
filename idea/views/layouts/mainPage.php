<?php

/* @var $this \yii\web\View */
/* @var $content string */

/* @var $events string */

use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;
use idea\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);

ob_start();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= Yii::getAlias("@web/favicon.png") ?>">
    <?php $this->registerCsrfMetaTags() ?>

    <title><?= ($this->title) ? Html::encode($this->title) : Yii::t('main', 'Центр инновации, технологии и стратегии') ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="no-margin">
    <?= $this->render('_header') ?>
</div>

<div class="content_area">
    <?= $content ?>
</div>

<div class="container">
    <div class="future_banner">
        <img class="future_banner_image" src="<?= Yii::getAlias('@web/img/smart_girl_bg.jpg') ?>">

        <img class="future_banner_girl" src="<?= Yii::getAlias('@web/img/smart_girl.png') ?>">

        <div class="future_text">
            <p class="accented"><?= Yii::t('main', 'НАШИ ДЕТИ') ?></p>
            <p><?= Yii::t('main', 'ДОСТОЙНЫ ЛУЧШЕГО') ?></p>
            <p><?= Yii::t('main', 'БУДУЩЕГО!') ?></p>

            <a href="http://itsm.uz" class="squareBtn"><?= Yii::t('main', 'ПЕРЕЙТИ на itsm.uz') ?></a>
        </div>
    </div>
</div>

<div class="container">
    <?= \frontend\widgets\Contacts::widget([]) ?>
</div>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php

$this->endPage();

$out = ob_get_clean();
$out = preg_replace('/(?![^<]*<\/pre>)[\n\r\t]+/', "\n", $out);
$out = preg_replace('/ {2,}/', ' ', $out);
$out = preg_replace('/>[\n]+/', '>', $out);
echo $out;
?>
