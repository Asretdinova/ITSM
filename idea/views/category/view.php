<?php

/**

 * Date: 8/24/19
 * Time: 1:16 AM
 */

use idea\widgets\IdeaBox;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $id integer */
/* @var $model \common\models\Categories */
/* @var $searchModel \backend\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;

echo Html::tag('p', $this->title, [
    'class' => 'title'
]);
echo $this->render('_search', [
    'id' => $id,
    'model' => $searchModel
]);

$list = $dataProvider->getModels();

echo '<div class="ideas_holder">';
foreach ($list as $item) {
    echo '<div class="item col-md-6">';

    echo IdeaBox::widget([
        'model' => $item
    ]);

    echo '</div>';
}
echo '</div>';

if (empty($list)) {
    echo '
        <div class="empty">
            <i class="icon fas fa-search"></i>
            <p>' . Yii::t('main', 'Ничего не найдено') . '</p>
        </div>
    ';
}

$js = <<<JS
    $('.ideas_holder').isotope({
      itemSelector: '.item',
      layoutMode: 'fitRows'
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);