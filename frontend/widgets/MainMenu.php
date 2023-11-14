<?php

/**

 * Date: 8/16/19
 * Time: 7:04 AM
 */

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use yii\widgets\Menu;

class MainMenu extends Widget
{
    public $className;

    public function run()
    {
        return Menu::widget([
            'options' => [
                'class' => $this->className
            ],
            'items' => [
                [
                    'label' => Yii::t('main', 'О нас'),
                    'url' => ['/page/about'],
                    'items' => [
                        // ['label' => Yii::t('main', 'Нормативные документы'), 'url' => ['/documents/index']],
                        ['label' => Yii::t('main', 'Руководство'), 'url' => ['/team/leaders']],
                        ['label' => Yii::t('main', 'Наша команда'), 'url' => ['/team/departments']],
                        ['label' => Yii::t('main', 'Наша история и достижения'), 'url' => ['/achievements/index']],
                        ['label' => Yii::t('main', 'Вакансии'), 'url' => ['/jobs/index']],
                        ['label' => Yii::t('main', 'Структура центра'), 'url' => ['/page/structure']],
                        ['label' => Yii::t('main', 'Тендеры и конкурсы'), 'url' => ['/tenders/index']],
                        ['label' => Yii::t('main', 'Контакты'), 'url' => ['/page/contacts']],
                    ]
                ],
                ['label' => Yii::t('main', 'Партнерам'), 'url' => ['/page/partners']],
                ['label' => Yii::t('main', 'Проекты'), 'url' => ['/projects']],
               
                [
                    'label' => Yii::t('main', 'Услуги'),
                    'url' => '#',
                    'items' => [
                        ['label' => Yii::t('main', 'Развитие концепции'), 'url' => ['/concept-development']],
                        ['label' => Yii::t('main', 'Цифровые услуги'), 'url' => ['/digital-services']],
                        ['label' => Yii::t('main', 'Организация образовательных учреждений и мероприятий'), 'url' => ['/logistics-and-events']],
                        ['label' => Yii::t('main', 'Медиа'), 'url' => ['/media']],
                        ['label' => Yii::t('main', 'HR'), 'url' => ['/hr']],
                    ]
                ],
                [
                    'label' => Yii::t('main', 'Пресс-релизы'),
                    'url' => '#',
                    'items' => [
                        ['label' => Yii::t('main', 'Пресс-релизы'), 'url' => ['/press-releases/index']],
                        ['label' => Yii::t('main', 'СМИ о нас'), 'url' => ['/aboutmedia/index']],
                        ['label' => Yii::t('main', 'Фото Галерея'), 'url' => ['/gallery/index']],
                        ['label' => Yii::t('main', 'Видеогалерея'), 'url' => ['/video-gallery/index']],
                    ]
                ],
            ]
        ]);
    }
}
