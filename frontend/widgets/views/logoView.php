
<div class="logo">
    <a href="<?= \yii\helpers\Url::to(['/']) ?>">
        <img src="<?=
        ($whiteLogo)
            ? Yii::getAlias("@web/img/logo_white.png")
            : Yii::getAlias("@web/img/logo.png")
        ?>">
        <p><?= Yii::t('main', 'Центр инновации, технологии <br>и стратегии') ?></p>
    </a>
</div>