<?php
/* @var $this \yii\web\View */

$js = <<<JS
    $('.menu-icon').click(function(e) {
        const body = $('body');
        if (body.hasClass('no-scroll'))
            body.removeClass('no-scroll');
        else 
            body.addClass('no-scroll')
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>

<div class="mobile_view">
    <div class="menu-icon">
        <span class="menu-icon__line menu-icon__line-left"></span>
        <span class="menu-icon__line"></span>
        <span class="menu-icon__line menu-icon__line-right"></span>
    </div>

    <div class="drop_menu displayable">
        <div class="drop_menu__content">
            <ul class="drop_menu__list">
                <li class="drop_menu__list-item">
                    <?= \frontend\widgets\Logo::widget([]) ?>
                </li>
                <li class="drop_menu__list-item">
                    <?= \frontend\widgets\InlineLanguageBar::widget([]) ?>
                </li>
            </ul>
            <div class="clearfix"></div>

            <?= \frontend\widgets\MainMenu::widget([
                'className' => 'drop_menu__list'
            ]) ?>
        </div>
    </div>
</div>