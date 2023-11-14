<?php

/**

 * Date: 10/17/19
 * Time: 4:28 AM
 */

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Content;

class OurHistory extends Widget
{
    public function run()
    {
        $model = Content::find()->where(['is_active' => true, 'type' => 'history'])->orderBy(['date' => SORT_ASC])->all();

        if (!$model)
            return false;

        return $this->render('ourHistoryView', [
            'model' => $model,
        ]);
    }
}