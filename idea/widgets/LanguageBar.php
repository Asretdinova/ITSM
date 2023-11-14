<?php

/**

 * Date: 8/11/19
 * Time: 5:12 PM
 */

namespace idea\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;
use yii\widgets\Menu;

class LanguageBar extends Widget
{
    public function run()
    {
        $currentLang = Yii::$app->language;

        $items = [];
        foreach (Yii::$app->params['languages'] as $key => $value) {
            $items[] = [
                'label' => $value,
                'url' => Url::current(['language' => $key]),
            ];
        }

        return $this->render('languageBarView', [
            'currentLang' => $currentLang,
            'items' => $items,
        ]);
    }
}