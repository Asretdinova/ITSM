<?php

/**

 * Date: 10/17/19
 * Time: 4:28 AM
 */

namespace frontend\widgets;

use yii\base\Widget;

class References extends Widget
{
    public function run()
    {
        $model = \common\models\References::find()->where(['is_active' => true])->orderBy(['order' => SORT_ASC])->all();

        if (!$model)
            return false;

        return $this->render('referencesView', [
            'model' => $model,
        ]);
    }
}