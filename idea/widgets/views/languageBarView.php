<?php

/**

 * Date: 8/11/19
 * Time: 5:13 PM
 */

/* @var $items ArrayObject */
/* @var $currentLang String */

use yii\widgets\Menu;

?>

<div class="dropdown">
    <span class="text-uppercase clickArea" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <?=$currentLang?>
        <span class="caret"></span>
    </span>

    <?=Menu::widget([
        'options' => [
            'class' => 'styledDrop dropdown-menu-right miniDrop dropdown-menu'
        ],
        'items' => $items
    ]);?>
</div>