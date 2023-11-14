<?php

/**

 * Date: 1/2/20
 * Time: 11:13 PM
 */

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;
use yii\widgets\Menu;

class Services extends Widget
{
    public function run()
    {
        $serviceList = [
            [
                'title' => Yii::t('main', 'Развитие концепции'),
                'text' => Menu::widget([
                    'items' => [
                        ['label' => Yii::t('main', 'Разработка проектов')],
                        ['label' => Yii::t('main', 'Анализ и консалтинг')],
                        ['label' => Yii::t('main', 'Проектный менеджмент')],
                    ]
                ]),
                'image' => Yii::getAlias('@web/img/service1.png'),
                'url' => Url::to(['/concept-development']),
            ],
            [
                'title' => Yii::t('main', 'Цифровые услуги'),
                'text' => Menu::widget([
                    'items' => [
                        ['label' => Yii::t('main', 'Разработка электронных платформ')],
                        ['label' => Yii::t('main', 'Веб и мобильная разработка')],
                        ['label' => Yii::t('main', 'Производство медиа контента')],
                    ]
                ]),
                'image' => Yii::getAlias('@web/img/service2.png'),
                'url' => Url::to(['/digital-services']),
            ],
            [
                'title' => Yii::t('main', 'Logistics and events'),
                'text' => Menu::widget([
                    'items' => [
                        ['label' => Yii::t('main', 'Организация образовательных мероприятий')],
                        ['label' => Yii::t('main', 'Запуск образовательных учреждений')],
                        ['label' => Yii::t('main', 'Участие в глобальных событиях')],
                    ]
                ]),
                'image' => Yii::getAlias('@web/img/service3.png'),
                'url' => Url::to('/logistics-and-events'),
            ],
            [
                'title' => 'Media',
                'text' => Menu::widget([
                    'items' => [
                        ['label' => Yii::t('main', ' SMM, SEO and PR campaigns  ')],
                        ['label' => Yii::t('main', 'Web site and mobile apps')],
                        ['label' => Yii::t('main', 'Graphic design')],
                    ]
                ]),
                'image' => Yii::getAlias('@web/img/service4.png'),
                'url' => Url::to('/media'),
            ],
            [
                'title' => 'HR',
                'text' => Menu::widget([
                    'items' => [
                        ['label' => Yii::t('main', 'Corporate culture development')],
                        ['label' => Yii::t('main', 'HRM policy development')],
                        ['label' => Yii::t('main', 'Recruitment services ')],
                    ]
                ]),
                'image' => Yii::getAlias('@web/img/service5.png'),
                'url' => Url::to('/hr'),
            ],
        ];

        return $this->render('servicesView', [
            'serviceList' => $serviceList,
        ]);
    }
}