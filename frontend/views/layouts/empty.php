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

<?= \frontend\widgets\FixedMenu::widget() ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
