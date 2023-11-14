<?php if (!$simpleForm): ?>
    <div id="feedback" class="feedbackImage">
        <div class="container">
            <p class="boldTitle center white"
               title="<?= Yii::t('main', 'Свяжитесь с нами') ?>"><?= Yii::t('main', 'Свяжитесь с нами') ?></p>
            <h2><?= Yii::t('main', 'Вы можете отправить свои предложения, жалобы или мнение в данной форме') ?></h2>

            <?= $this->render('/site/_feedback', [
                'model' => $feedback
            ]) ?>
        </div>
    </div>
<?php else: ?>
    <div id="feedback">
        <?= $this->render('/site/_feedback_simple', [
            'model' => $feedback
        ]) ?>
    </div>
<?php endif; ?>