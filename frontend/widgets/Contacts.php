<?php

/**

 * Date: 9/5/19
 * Time: 12:44 AM
 */

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use yii\widgets\Menu;

class Contacts extends Widget
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

        return $this->render('contactsView', [
            'contacts' => $contacts
        ]);
    }
}