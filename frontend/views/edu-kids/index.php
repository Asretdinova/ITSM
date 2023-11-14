<?php
// namespace app\frontend;
/**

 * Date: 8/18/19
 * Time: 4:16 PM
 */

/* @var $this \yii\web\View */

/* @var $model \common\models\Gallery[] */

use yii\helpers\Html;
use frontend\controllers\EduKidsController;
$this->title = 'Edu Kids';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/jquery.fancybox.min.css');
$this->registerJsFile('@web/js/jquery.fancybox.min.js', ['depends' => ['yii\web\JqueryAsset']]);


echo Html::beginTag('div', ['class' => 'container relative noPadding _withBan']);

echo Html::img(Yii::getAlias("@web/img/eduKids.jpg"), [
    'class' => 'inner_news_image'
]);

echo Html::tag('p', $this->title, ['class' => 'title left']);

echo Html::tag('p', Yii::t('main', 'Интерактивная, обучающая программа Edu Kids, создан с целью повышения уровня знаний, среди молодого населения. Данная программа соединяет в себе красочный видеоряд с элементами анимации, стоп-моушн, информационным содержанием и аргументированными фактами. Яркое составляющее, а именно анимация позволит привлечь к просмотру аудиторию всех возрастов, а обучающий контент позволит закрепить полученные знания. Эта программа помогает усвоению информацию путем зрительного и слухового контакта. Контент может быть невероятно разнообразным и коснется самых интересных вопросов. Программа Edu Kids выпускается 1 раз в неделю и каждый из месяцев будет посвящён определенной тематике.'));

echo Html::tag('div', null, ['class' => 'clearfix']);

echo Html::beginTag('div', ['class' => 'adBanners']);
echo Html::a(
    Html::img(Yii::getAlias('@web/img/kitob.uz_' . Yii::$app->language . '.png')),
    'https://kitob.uz/',
    ['target' => '_blank']
);

echo Html::a(
    Html::img(Yii::getAlias('@web/img/edu_market_' . Yii::$app->language . '.png')),
    Yii::getAlias('@web/uploads/EduMarket.apk')
);
echo Html::endTag('div');

echo Html::tag('div', null, ['class' => 'marger']);

echo '<div class="list_container_group">';

foreach ($model as $list) {
    echo Html::beginTag('div', ['class' => 'list_container']);
    echo Html::tag('p', $list->title);

    echo Html::beginTag('div', ['class' => 'images_list large']);
    foreach ($list->videos as $item) {
        echo "
                <a href='" . Yii::getAlias("@web/{$item->video}") . "' data-fancybox='eduKidsGroup' data-caption='{$item->title}' class='gItem'id='{$item->id}' >
                    <div class='imageBox'>
                        <img src='" . Yii::getAlias("@web/{$item->thumb}") . "'>
                    </div>
                    
                    <h1>{$item->title}</h1>
                    <p style=\"font-weight:normal!important;height: 75px; text-align:center;\"><i class=\"fa fa-eye\" style=\" line-height: 1.3;\"></i>{$item->viewed}</p>
                </a>
            ";
    }

    echo Html::tag('div', null, ['class' => 'clearfix']);
    echo Html::endTag('div');
    echo Html::endTag('div');
}
echo "</div>";

echo Html::endTag('div');

echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
$js = <<<JS
  $('[data-fancybox]').click(function() {
    var id = $(this).attr('id');
    $.ajax({
    type: "POST",
    data: {
      "id" : id
    },
    success: function(data){
      console.log(data)
    }
  });
});
JS;
$this->registerJs($js);
if(isset($_POST['id'])) {
EduKidsController::viewedCounter($_POST['id']);
    exit($_POST['id']);
  }