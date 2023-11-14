<?php

/**

 * Date: 12/25/19
 * Time: 3:46 AM
 */

namespace frontend\widgets;

use yii\base\Widget;
use yii\widgets\Menu;

class MainRight extends Widget
{
    public function run()
    {
        $contacts = [];
        $model = \common\models\Contacts::find()->where(['in', 'code', ['phone', 'address', 'mail']])->all();
        foreach ($model as $item) {
            switch ($item->code) {
                case 'phone':
                case 'mail':
                {
                    $list = [];
                    $array = explode(';', $item->value);
                    $prefix = ($item->code == 'phone') ? 'tel' : 'mailto';
                    foreach ($array as $element) {
                        $list[] = [
                            'label' => $element,
                            'url' => "$prefix:$element"
                        ];
                    }

                    $contacts[$item->code] = Menu::widget([
                        'items' => $list
                    ]);

                    break;
                }
                default:
                    $contacts[$item->code] = $item->value;
            }
        }

        return $this->render('mainRightView', [
            'contacts' => $contacts
        ]);
    }
}