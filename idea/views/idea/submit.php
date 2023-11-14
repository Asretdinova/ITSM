<?php

/**

 * Date: 10/7/19
 * Time: 3:10 AM
 */

/* @var $this \yii\web\View */
/* @var $idea \idea\models\IdeaForm */

$this->title = Yii::t('main', 'Подать идею');

echo \yii\helpers\Html::tag('p', $this->title, ['class' => 'title']);

echo $this->render('/site/_ideaForm', [
    'model' => $idea
]);