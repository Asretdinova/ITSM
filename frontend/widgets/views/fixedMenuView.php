<div class="fixedMenu">
    <div class="container">
        <div class="headerElements">
            <div class="logo">
                <a href="<?= \yii\helpers\Url::to(['/']) ?>">
                    <img src="<?= Yii::getAlias("@web/img/logo_centered.png") ?>">
                </a>
            </div>

            <div class="header-rows">
                <div class="header-row">
                    <?= \frontend\widgets\MainMenu::widget([
                        'className' => 'menu'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
/* @var $this \yii\web\View */

$js = <<<JS
    $('document').ready(function() {
        $(window).scroll(function() {
            showMenu();
        });
        
        var menu = $('.fixedMenu'); 
        function showMenu() {
            var top = $(document).scrollTop();
            if (top > 115)
                $(menu).css({top: 0});
            else 
                $(menu).css({top: "-100px"});
        }
    });    
JS;

$this->registerJs($js);
