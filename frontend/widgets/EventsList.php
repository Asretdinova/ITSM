<?php

/**

 * Date: 12/30/19
 * Time: 1:46 AM
 */

namespace frontend\widgets;

use common\models\Content;
use yii\base\Widget;

class EventsList extends Widget
{
    public function run()
    {
        $model = Content::find()
            ->where([
                'is_active' => true,
                'type' => 'events'
            ])
            ->limit(3)
            ->orderBy(['date' => SORT_DESC, 'id' => SORT_DESC])
            ->all();

        return $this->render('eventsListView', [
            'model' => $model
        ]);
    }
}