<?php

/* @var \yii\web\View $this */

/* @var \common\models\Departments[] $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('main', $model->title);
$this->params['breadcrumbs'][] = $this->title;


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
echo Html::beginTag('div', ['class' => 'departmentsItem']);

echo Html::beginTag('div', ['class' => 'departmentsHeader']);

echo Html::img(Yii::getAlias("@web/uploads/content/{$model->icon}"));
echo Html::tag('span', $model->title);
echo Html::endTag('div');
echo Html::beginTag('div');

echo Html::beginTag('div', ['class' => 'departmentMembers','style'=>'padding-bottom:0px;']);

$isFirst = true;
$membersHtml = '';
foreach ($model->members as $item) {
    $image = Html::img(Yii::getAlias("@web/uploads/content/{$item->photo}.jpg"));
    if (empty($item->photo)) {
        $image = Html::tag('div', Yii::t('main', 'Вакант'), [
            'class' => 'vacancy_box'
        ]);
    }
    if ($isFirst) {
        echo "
                <div class='headItem' style='text-align:center'>
                    {$image}
                    <span>" . Yii::t('main', 'Начальник отдела') . "</span>
                    <h1>{$item->name}</h1>
                ";
                if(!empty($item->phone)&&!empty($item->mail))
                {
                    echo " <div class='details'>
                    <div class='info' style='padding-top:1rem;'>
                    <p><i style='color:orange;' class='fas fa-phone-alt'></i> {$item->phone}</p>
                    <p><i style='color:orange;' class='fas fa-at'></i> <a href='mailto:{$item->mail}'>{$item->mail}</a></p>
                    </div>
                    </div>";
                }
            echo"
                </div>
            ";
    }
    $isFirst = false;
}
echo "
        <div class='departmentinfo'>
            <p>{$model->description}</p>
        </div>
            ";
echo Html::endTag('div');
echo "<div style='padding-left: 32%; padding-bottom: 40px; margin-top: -30px;'> {$projectsHtml} </div>";

echo Html::endTag('div');

echo Html::endTag('div');
?>
<style>


</style>