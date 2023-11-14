<?php

/**

 * Date: 12/10/19
 * Time: 11:26 AM
 */

namespace frontend\widgets;


use yii\base\Widget;

class EduKids extends Widget
{
    public function run()
    {
        $model = \common\models\EduKids::find()
            ->where(['is_active' => true])
            ->orderBy(['date' => SORT_DESC])
            ->all();

        if (!$model)
            return false;

        return $this->render('eduKidsView', [
            'model' => $model
        ]);
    }
}