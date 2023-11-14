<?php

/**

 * Date: 12/26/19
 * Time: 5:29 AM
 */

namespace frontend\widgets;

use yii\base\Widget;

class MainSlider extends Widget
{
    public function run()
    {
        return $this->render('mainSliderView');
    }
}