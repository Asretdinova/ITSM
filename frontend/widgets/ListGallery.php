<?php

/**

 * Date: 2/17/20
 * Time: 8:38 AM
 */

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class ListGallery extends Widget
{
    public $list = [];

    public function run()
    {
        if (empty($this->list))
            return false;

        return $this->render('listGallery', [
            'list' => $this->list
        ]);
    }
}