<?php
namespace idea\widgets;

use Yii;
use yii\base\Widget;

class LinksList extends Widget
{
    public function run()
    {
        return $this->render('linksList');
    }
}