<?php

/* @var \yii\web\View $this */
/* @var array $projects */

/* @var \common\models\Team[] $model */

use common\models\Team;
use yii\bootstrap\Collapse;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('main', 'Руководство');
$this->params['breadcrumbs'][] = $this->title;


echo Html::tag('h1', $this->title, [
    'class' => 'title'
]);
$image = Html::img(Yii::getAlias("@web/uploads/content/{$model->photo}.jpg"));

if (empty($model->photo)) {
    $image = Html::tag('div', Yii::t('main', 'Вакант'), [
        'class' => 'vacancy_box'
    ]);
}
$projectsHtml = '';
$iconsHtml = '';

if (!empty($model->projects_list)) {
foreach ($model->projects_list as $id) {
    if (isset($projects[$id])) {
        $project = $projects[$id];
        $iconsHtml .= Html::a(Html::img($project['image']), Url::to(['/projects/view', 'id' => $project['id']]), [
            'data-toggle' => 'tooltip',
            'data-placement' => 'bottom',
            'title' => $project['title'],
        ]);
    }
}

$projectsHtml = "
            <div class='projectsList'>
                <h2>" . Yii::t('main', 'Проекты') . ":</h2>
                <div class='projectsMiniList'>
                    $iconsHtml
                </div>
            </div>
        ";
}
?>
<section style="padding-top:4rem;">
    <div style="display: flex;">
        <div style="width: 50%; margin-right:5rem;"><?= $image?></div>
        <div class='leaders_details'>
            <h1 style="font-weight: bold;"><?= $model->name ?></h1>
            <h3><?= $model->position ?></h3>
            <div class='info' style="font-size: 18px;">
                <p><i class='fas fa-phone-alt'></i><?= $model->phone ?></p>
                <p><i class='fas fa-at'></i><a href='mailto:{$model->mail}'><?= $model->mail ?></a></p>
                <p><i class='fas fa-clock'></i><?= $model->reception_days ?> </p>
            </div>
        </div>
    </div>
    <div class="about_leaders" style="padding:4rem; font-size:20px; line-height:3.5rem; ">
        <?php
        foreach ($model->info as $info) {
            echo "     
              <p>{$info->description}</p>
              ";
        }
      echo "{$projectsHtml}";
        ?>
    </div>

</section>
<style>
    .info i {
        color: #f28f16;
        margin-right: 1rem;
    }
</style>