<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Menu;
use common\models\Ideas;
use common\models\Comments;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        $menuItems = [];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>

            <?php if (Yii::$app->user->isGuest) : ?>

                <?= $content ?>

            <?php else : ?>
                <div class="row">
                    <div class="col-md-2">
                        <?php
                        if (Yii::$app->user->identity->getUserLevel() >= 1) {
                            echo '<code>Контент</code>';
                            echo Menu::widget([
                                'options' => [
                                    'class' => 'nav nav-pills nav-stacked'
                                ],
                                'items' => [
                                    ['label' => 'Категории', 'url' => ['/categories/index']],
                                    ['label' => 'События', 'url' => ['/events/index']],
                                    ['label' => 'СМИ о нас', 'url' => ['/aboutmedia/index']],
                                    ['label' => 'Проекты', 'url' => ['/projects/index']],
                                    ['label' => 'Заказчик', 'url' => ['/customer/index']],
                                    ['label' => 'Тип проекта', 'url' => ['/type/index']],
                                    ['label' => 'Страницы', 'url' => ['/pages/index']],
                                    ['label' => 'Галерея', 'url' => ['/gallery/index']],
                                    ['label' => 'Edu kids', 'url' => ['/edu-kids/index']],
                                    ['label' => 'Детализация проектов', 'url' => ['/app-details/index']],
                                    ['label' => 'Фидбэк', 'url' => ['/feedback/index']],
                                    ['label' => 'Контакты', 'url' => ['/contacts/index']],
                                    ['label' => 'Руководство', 'url' => ['/heads/index']],
                                    ['label' => 'Команда', 'url' => ['/team/index']],
                                    ['label' => 'Достижении', 'url' => ['/achievements/index']],
                                    ['label' => 'Партнёры', 'url' => ['/partners/index']],
                                    ['label' => 'История', 'url' => ['/our-history/index']],
                                    ['label' => 'Отзывы', 'url' => ['/references/index']],
                                    ['label' => 'Вакансии', 'url' => ['/jobs/index']],
                                    ['label' => 'Vote Results', 'url' => ['/vote-result/index']],
                                    ['label' => 'Тендеры', 'url' => ['/tenders/index']],
                                    ['label' => 'Видеогалерея', 'url' => ['/videogallery/index']],
                                    ['label' => 'Видео-категория', 'url' => ['/videocategory/index']],
                                ],
                            ]);
                        } ?>

                        <?php

                        if (Yii::$app->user->identity->getUserLevel() >= 2) {
                            echo '<code>Управления</code>';
                            echo Menu::widget([
                                'options' => [
                                    'class' => 'nav nav-pills nav-stacked'
                                ],
                                'encodeLabels' => false,
                                'items' => [
                                    (Yii::$app->user->identity->getUserLevel() >= 3)
                                        ? ['label' => 'Пользователи', 'url' => ['/users/index']]
                                        : null,
                                    ['label' => "Идеи <span class='badge'>" . Ideas::countUnreadables() . "</span>", 'url' => ['/ideas/index']],
                                    ['label' => "Коментарии <span class='badge'>" . Comments::countUnreadables() . "</span>", 'url' => ['/comments/index']],
                                ],
                            ]);
                        }
                        ?>
                    </div>

                    <div class="col-md-10">
                        <?= $content ?>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>