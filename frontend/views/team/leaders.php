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

$headsHtml = '';
$managersHtml = '';

foreach ($model as $item) {
    $projectsHtml = '';
    $iconsHtml = '';

    if (!empty($item->projects_list)) {
        foreach ($item->projects_list as $id) {
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

    $image = Html::img(Yii::getAlias("@web/uploads/content/{$item->photo}.jpg"));
    if (empty($item->photo)) {
        $image = Html::tag('div', Yii::t('main', 'Вакант'), [
            'class' => 'vacancy_box'
        ]);
    }

    $button = '';
    if (!empty($item->info)) {
        $button = Html::tag('button', Yii::t('main', 'Подробнее'), [
            'type' => 'button',
            'class' => 'actionButton left',
            'data-toggle' => 'modal',
            'data-target' => '#' . md5($item->id),
        ]);

        Modal::begin([
            'id' => md5($item->id),
            'header' => $item->name,
        ]);

        $tabs = [];
        $contentOptions = ['class' => 'in'];
        foreach ($item->info as $info) {
            $tabs[] = [
                'label' => $info->title,
                'content' => $info->description,
                'contentOptions' => $contentOptions,
            ];

            $contentOptions = [];
        }

        echo Collapse::widget([
            'options' => [
                'class' => 'collapseTabs'
            ],
            'items' => $tabs
        ]);

        Modal::end();
    }

    $html = "
        <div class='team_card_item'>
            <div class='item'>
                <div class='member_image'>
                <a href='" . Url::to(['/team/view', 'id' => $item->id]) . "' >{$image}</a>
                </div>
                
                <div class='details'>
                    <h1>     <a href='" . Url::to(['/team/view', 'id' => $item->id]) . "' >{$item->name}</a></h1>
                    <h6>{$item->position}</h6>
                    
                    <div class='info'>
                        <p><i class='fas fa-phone-alt'></i> {$item->phone}</p>
                        <p><i class='fas fa-at'></i> <a href='mailto:{$item->mail}'>{$item->mail}</a></p>
                        <p><i class='fas fa-clock'></i> {$item->reception_days}</p>
                    </div>
                    {$projectsHtml}
                </div>
            </div>
        </div>
    ";
    $htmlhead = "
    <div class='team_card_item'>
        <div class='item'>
            <div class='member_image'>
            <a href='" . Url::to(['/team/view', 'id' => $item->id]) . "' >{$image}</a>
            </div>
            
            <div class='details'>
                <h1>     <a href='" . Url::to(['/team/view', 'id' => $item->id]) . "' >{$item->name}</a></h1>
                <h6>{$item->position}</h6>
                
                <div class='info'>
                    <p><i class='fas fa-phone-alt'></i> {$item->phone}</p>
                    <p><i class='fas fa-at'></i> <a href='mailto:{$item->mail}'>{$item->mail}</a></p>
                    <p><i class='fas fa-clock'></i> {$item->reception_days}</p>
                </div>
              
            </div>
            
        </div>
        {$projectsHtml}
    </div>
";

    if ($item->category == Team::CATEGORY_HEAD)
        $headsHtml .= $htmlhead;
    else
        $managersHtml .= $html;
}

echo Html::tag('div', $headsHtml, [
    'class' => 'team_heads_list'
]);

echo Html::tag('div', $managersHtml, [
    'class' => 'team_managers_list'
]);
