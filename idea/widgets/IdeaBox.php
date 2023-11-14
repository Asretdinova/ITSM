<?php

/**

 * Date: 8/21/19
 * Time: 1:02 AM
 */

/* @var $model \common\models\Ideas */

namespace idea\widgets;

use common\models\Ideas;
use yii\base\Widget;

class IdeaBox extends Widget
{
    public $model = null;

    public function run()
    {
        return $this->render('ideaBox', [
            'model' => $this->model
        ]);
    }
}