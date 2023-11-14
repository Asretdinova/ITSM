<?php

/**

 * Date: 2/3/20
 * Time: 1:20 AM
 */

namespace frontend\widgets;

use yii\base\Widget;

class FixedMenu extends Widget
{
    public function run()
    {
        return $this->render('fixedMenuView');
    }
}