<?php

/**

 * Date: 8/11/19
 * Time: 5:12 PM
 */

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;
use yii\widgets\Menu;

class InlineLanguageBar extends Widget
{
    public function run()
    {
        $currentLang = Yii::$app->language;

        $items = [];
        foreach (Yii::$app->params['languages'] as $key => $value) {
            $items[] = [
                'label' => $key,
                'url' => Url::current(['language' => $key]),
                'active' => ($key == $currentLang) ? true : false
            ];
        }

        return Menu::widget([
            'items' => $items,
            'options' => [
                'class' => 'inline_langs',
            ],
        ]);
    }
}