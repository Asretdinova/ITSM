<?php

/**

 * Date: 1/2/20
 * Time: 3:32 PM
 */

namespace frontend\widgets;

use common\models\Content;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class Footer extends Widget
{
    public $whiteLogo = false;

    public function run()
    {
        $projects = $this->getProjects();

        return $this->render('footerView', [
            'projects' => $projects,
            'whiteLogo' => $this->whiteLogo
        ]);
    }

    private function getProjects()
    {
        $model = Content::find()
            ->where(['type' => 'projects', 'is_active' => true])
            ->orderBy(['date' => SORT_DESC])
            ->limit(5)
            ->all();

        $item = [];
        foreach ($model as $element) {
            $item[] = [
                'label' => $element->title,
                'url' => Url::to(['/projects/view', 'id' => $element->id])
            ];
        }

        return $item;
    }
}