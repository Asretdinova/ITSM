<?php

/**

 * Date: 12/25/19
 * Time: 3:28 AM
 */

namespace frontend\widgets;

use yii\base\Widget;

class Logo extends Widget
{
    public $whiteLogo = false;

    public function run()
    {
        return $this->render('logoView', [
            'whiteLogo' => $this->whiteLogo
        ]);
    }
}