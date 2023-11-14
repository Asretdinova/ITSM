<?php

/**

 * Date: 1/5/20
 * Time: 6:11 AM
 */

namespace idea\widgets;

use Yii;
use common\models\VoteResult;
use yii\base\Widget;

class VotePool extends Widget
{
    public function run()
    {
        $cookie_name = 'vote';
        if (!isset($_COOKIE[$cookie_name]))
            $showResult = false;
        else
            $showResult = true;

        $data = [];
        $model = new VoteResult();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = new VoteResult();

            setcookie($cookie_name, true, time() + (86400 * 60), "/");
            $showResult = true;
        }

        if ($showResult)
            $data = $this->calculateProgress();

        return $this->render('votePoolView', [
            'model' => $model,
            'showResult' => $showResult,
            'data' => $data,
        ]);
    }

    public function calculateProgress()
    {
        $model = VoteResult::find()->all();

        $data = [0 => [], 1 => []];
        foreach ($model as $item) {
            if (isset($data[0][$item->first]))
                $data[0][$item->first] += 1;
            else {
                $data[0][$item->first] = 1;
            }

            if (isset($data[1][$item->second]))
                $data[1][$item->second] += 1;
            else {
                $data[1][$item->second] = 1;
            }
        }

        $max = count($model);
        foreach ($data as &$item) {
            foreach ($item as &$val) {
                $val = round(($val * 100) / $max, 1);
            }
        }

        return $data;
    }
}