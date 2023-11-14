<?php

/**

 * Date: 8/11/19
 * Time: 4:44 PM
 */

namespace frontend\widgets;

use yii\base\Widget;

class SpecialView extends Widget
{
    public function run()
    {
        $this->view->registerCssFile('@web/css/specialView.css');
        $this->view->registerJsFile('@web/js/jquery.cookie.js', ['depends' => ['yii\web\JqueryAsset']]);
        $this->view->registerJsFile('@web/js/specialView.js', ['depends' => ['yii\web\JqueryAsset']]);

        return $this->render('specialView');
    }
}