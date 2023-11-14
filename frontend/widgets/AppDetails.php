<?php


namespace frontend\widgets;

use Yii;
use yii\base\Widget;

class AppDetails extends Widget
{
    public function run()
    {
        $model = \common\models\AppDetails::find()->orderBy(['category_id' => SORT_ASC, 'order' => SORT_ASC])->all();

        if (!$model)
            return false;

        $categories = [
            1 => [
                'title' => Yii::t('main', 'Веб-сайты'),
                'icon' => Yii::getAlias('@web/img/tabicon1.png'),
                'code' => 'sites',
                'items' => []
            ],
            2 => [
                'title' => Yii::t('main', 'Приложения'),
                'icon' => Yii::getAlias('@web/img/tabicon2.png'),
                'code' => 'apps',
                'items' => [],
            ],
            3 => [
                'title' => Yii::t('main', 'Фирменный стиль'),
                'icon' => Yii::getAlias('@web/img/tabicon3.png'),
                'code' => 'style',
                'items' => [],
            ],
            4 => [
                'title' => Yii::t('main', 'Презентации'),
                'icon' => Yii::getAlias('@web/img/tabicon4.png'),
                'code' => 'prezintation',
                'items' => [],
            ],
            5 => [
                'title' => Yii::t('main', 'Продвижение'),
                'icon' => Yii::getAlias('@web/img/tabicon5.png'),
                'code' => 'seo',
                'items' => [],
            ],
        ];

        foreach ($model as $item) {
            $categories[$item->category_id]['items'][] = $item;
        }


        return $this->render('appDetailsView', [
            'categories' => $categories
        ]);
    }
}