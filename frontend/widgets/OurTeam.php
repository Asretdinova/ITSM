<?php

/**

 * Date: 10/17/19
 * Time: 4:28 AM
 */

namespace frontend\widgets;

use common\models\Team;
use yii\base\Widget;

class OurTeam extends Widget
{
    public function run()
    {
        $model = Team::find()->where(['is_active' => true, 'category' => null])->orderBy(['order' => SORT_ASC])->all();

        if (!$model)
            return false;

        return $this->render('ourTeamView', [
            'model' => $model,
        ]);
    }
}