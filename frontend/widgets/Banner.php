<?php

/**

 * Date: 8/14/19
 * Time: 1:09 AM
 */

namespace frontend\widgets;

use common\models\Banners;
use yii\base\Widget;

class Banner extends Widget
{
    public function run()
    {
        $model = Banners::find()->where(['is_active' => true])->orderBy(['order' => SORT_ASC])->all();

        return $this->render('bannerView', [
            'model' => $model
        ]);
    }
}