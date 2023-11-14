<?php

/**

 * Date: 12/29/19
 * Time: 5:31 AM
 */

namespace frontend\widgets;

use common\models\Content;
use common\models\ProjectsCategory;
use yii\base\Widget;

class ProjectsList extends Widget
{
    public $all = false;

    public function run()
    {
        if ($this->all) {
            $model = Content::find()
                ->where([
                    'is_active' => true,
                    'type' => 'projects',
                ])
                ->orderBy(['date' => SORT_DESC, 'id' => SORT_DESC])
                ->all();

            return $this->render('allProjectsListView', [
                'model' => $model,
            ]);

        } else {
            $processed = Content::find()
                ->where([
                    'is_active' => true,
                    'type' => 'projects',
                    'status' => ProjectsCategory::STATUS_PROCESSED
                ])
                ->orderBy(['date' => SORT_DESC, 'id' => SORT_DESC])
                ->limit(12)
                ->all();

            $process = Content::find()
                ->where([
                    'is_active' => true,
                    'type' => 'projects',
                    'status' => ProjectsCategory::STATUS_PROCESS
                ])
                ->orderBy(['date' => SORT_DESC, 'id' => SORT_DESC])
                ->limit(12)
                ->all();

            return $this->render('projectsListView', [
                'processed' => $processed,
                'process' => $process,
            ]);
        }
    }
}
