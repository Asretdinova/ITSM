<?php
/* @var $this \yii\web\View */

/* @var $model \common\models\Partners[] */

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('main', 'Партнерам');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('/layouts/_header') ?>

<div class="breadcrumbsRow">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
</div>

<div class="bigBanner mini">
    <div class="headerTitle partners">
        <h2><?= Yii::t('main', 'Сотрудничество') ?></h2>

        <p><?= Yii::t('main', 'Самые лучшие инвестиции — это инвестиции <br>в образование!') ?></p>
    </div>
</div>

<div class="container">
    <h1 class="title"><?= Yii::t('main', 'Цели') ?></h1>
    <h1 class="subTitle"><?= Yii::t('main', 'Ведрение инновационных идей и обеспечение <br>качества образования') ?></h1>

    <div class="marger"></div>
    <div class="violet_icons">
        <div class="item">
            <div class="icon">
                <img alt="" src="<?= Yii::getAlias('@web/img/bgl_idea.png') ?>">
            </div>
            <span><?= Yii::t('main', 'Широкое внедрение цифровых услуг в государственную систему образования') ?></span>
        </div>

        <div class="item">
            <div class="icon">
                <img alt="" src="<?= Yii::getAlias('@web/img/bgl_monitor.png') ?>">
            </div>
            <span><?= Yii::t('main', 'Разработка платформ, технической и проектной документации, научно-исследовательских и аналитических разработок') ?></span>
        </div>

        <div class="item">
            <div class="icon">
                <img alt="" src="<?= Yii::getAlias('@web/img/bgl_user_doc.png') ?>">
            </div>
            <span><?= Yii::t('main', 'Внедрение инновационных идей и технологий в государственную систему образования на основе стратегического анализа и планирования') ?></span>
        </div>
    </div>

    <hr>

    <div class="marger"></div>
    <h1 class="title"><?= Yii::t('main', 'Наши партнеры') ?></h1>
    <h1 class="subTitle"><?= Yii::t('main', 'Сотрудничество') ?></h1>
    <div class="row  mt-5">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h2 class="text-center " style="color: #263773; font-weight:bold; text-decoration:underline;"><?= Yii::t('main', 'Местные партнеры') ?></h2>
            <div class="row partners mt-5">
                <?php
                foreach ($model as $item) {
                    echo "<div class='col-lg-3 logo'> <img src='" . Yii::getAlias("@web/uploads/content/{$item->logo}") . "' alt=''></div>";
                }
                ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h2 class="text-center " style="color: #263773; font-weight:bold; text-decoration:underline;"><?= Yii::t('main', 'Международные партнеры') ?></h2>

            <div class="row partners mt-5">
                <?php
                foreach ($model as $item) {
                    echo "<div class='col-lg-3 logo'> <img src='" . Yii::getAlias("@web/uploads/content/{$item->logo}") . "' alt=''></div>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- <?php
            $_items = [];
            $index = 0;
            for ($i = 0; $i < count($model); $i++) {
                $item = $model[$i];
                $html = "
            <div class='pItem'>
                <div class='icon'>
                    <img src='/uploads/content/{$item->logo}' alt=''>
                </div>
                
                <div class='tBox left'>
                    <h1>{$item->title}</h1>
                    <p>{$item->description}</p>
                </div>
            </div>
        ";

                $i++;
                if (isset($model[$i])) {
                    $item = $model[$i];
                    $html .= "
                <div class='pItem'>
                    <div class='tBox right'>
                        <h1>{$item->title}</h1>
                        <p>{$item->description}</p>
                    </div>
                    
                    <div class='icon'>
                        <img src='/uploads/content/{$item->logo}' alt=''>
                    </div>
                </div>
            ";
                }

                $_items[] = $html;
            }

            echo \yii\bootstrap\Carousel::widget([
                'showIndicators' => false,
                'items' => $_items,
                'controls' => ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
                'options' => [
                    'class' => 'carousel slide partnerSlider',
                ],
            ]);
            ?> -->
</div>

<div class="projectsListCards">
    <div class="container">
        <h1 class="boldTitle center white"><?= Yii::t('main', 'Наши проекты') ?></h1>
        <?= \frontend\widgets\ProjectsList::widget(['all' => true]) ?>
    </div>
</div>

<div class="container">
    <div class="servicesLogoList">
        <h1 class="title"><?= Yii::t('main', 'Услуги') ?></h1>

        <div class="itemsList">
            <?php
            $list = [
                [
                    'title' => Yii::t('main', 'Развитие концепции'),
                    'image' => Yii::getAlias('@web/img/service1.png'),
                    'url' => Url::to(['/concept-development']),
                ],
                [
                    'title' => Yii::t('main', 'Цифровые услуги'),
                    'image' => Yii::getAlias('@web/img/service2.png'),
                    'url' => Url::to(['/digital-services']),
                ],
                [
                    'title' => Yii::t('main', 'Logistics and events'),
                    'image' => Yii::getAlias('@web/img/service3.png'),
                    'url' => Url::to('/logistics-and-events'),
                ],
                [
                    'title' => 'Media',
                    'image' => Yii::getAlias('@web/img/service4.png'),
                    'url' => Url::to('/media'),
                ],
                [
                    'title' => 'HR',
                    'image' => Yii::getAlias('@web/img/service5.png'),
                    'url' => Url::to('/hr'),
                ],
            ];

            foreach ($list as $item) {
                echo "
                <a href='{$item['url']}' class='item'>
                    <div class='box'>
                        <img src='{$item['image']}' alt=''>
                    </div>
                    
                    <h1>{$item['title']}</h1>
                </a>
            ";
            }
            ?>
        </div>
    </div>
</div>

<div class="offersToPartners">
    <div class="container">
        <h1 class="title"><?= Yii::t('main', 'Предложения партнерам') ?></h1>

        <div class="offerCards">
            <div class="item">
                <div class="iBox">
                    <img src="<?= Yii::getAlias('@web/img/tmp/offer_childs.jpg') ?>" alt="">
                </div>

                <h1>Robototexnika kurslari</h1>
                <p>Loyihadan maqsad, maktab o’quvchilari dasturlash, mexatronika asoslari, algoritmlash kabi asosiy
                    bilim va konikmalarga ega bolishini ta’minlashdir. Toshkent shahri bo’ylab tajriba tariqasida 5 ta
                    pilot robototexnika kurslari Barkamol avlod markazlarida ochildi. Ushbu loyihani Buxoro va
                    Qashqadaryo viloyatlarida ham ochish boyicha ishlar olib borilmoqda. Robototexnoka sinflarini butun
                    respublikada tadbiq etish rejalashtirilgan;</p>
            </div>

            <div class="item">
                <div class="iBox">
                    <img src="<?= Yii::getAlias('@web/img/tmp/offer_kitob.jpg') ?>" alt="">
                </div>

                <h1>Kitob.uz</h1>
                <p>“Kitob.uz” - O'zbek tilidagi elektron kitoblar va audiokitoblarning virtual kutubxona platformasi.
                    Kitob.uz veb-sayt va mobil ilovalar orqali oqish imkoniyati. Loyihadan maqsad kitob o’qishga
                    zamonaviy yondashuv va o'zbek tilida o'qishni ommalashtirishga qaratilgan. Loyiha bugungi kunda
                    ishga tushirilgan va keyingi bosqichda platformani kontent bilan boyitish rejalashtirilgan.</p>
            </div>
        </div>

        <button id="scrollToFeedback" type="button" class="pull-center actionButton orange"><?= Yii::t('main', 'Связаться с нами') ?></button>
    </div>
</div>

<div class="section">
    <div class="container">
        <h1 class="title"><?= Yii::t('main', 'Фотогалерея') ?></h1>
        <div class="pageImageList">
            <div class="item"><img alt="" src="<?= Yii::getAlias('@web/img/partners1.jpg') ?>"></div>
            <div class="item"><img alt="" src="<?= Yii::getAlias('@web/img/partners2.jpg') ?>"></div>
            <div class="item"><img alt="" src="<?= Yii::getAlias('@web/img/partners3.jpg') ?>"></div>
        </div>
    </div>
</div>


<div class="soldBg gray">
    <?= \frontend\widgets\FeedbackForm::widget([]) ?>
</div>

<div class="partnersFooter">
    <?= \frontend\widgets\Footer::widget([]) ?>
</div>
<style>
    .partners .col-lg-4 {
        padding: 2rem;
    }

    .partners img {
        object-fit: cover;
    }
</style>