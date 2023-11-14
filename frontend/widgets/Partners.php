<?php

/**

 * Date: 12/30/19
 * Time: 2:41 AM
 */

namespace frontend\widgets;

use yii\base\Widget;

class Partners extends Widget
{
    public $title = true;

    public function run()
    {
        $model = \common\models\Partners::find()
            ->where(['is_active' => true])
            ->orderBy(['order' => SORT_ASC])
            ->all();

        return $this->render('partnersView', [
            'model' => $model,
            'title' => $this->title
        ]);
    }
}