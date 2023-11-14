<?php

/**

 * Date: 8/5/19
 * Time: 4:06 AM
 */

namespace frontend\widgets;


use yii\base\Widget;
use yii\web\View;

class ResponsiveBar extends Widget
{
    public function run()
    {
        $js = <<<JS
        const app = (() => {
            let body;
            let menu;
            let menuItems;
    
            const init = () => {
              body = document.querySelector('body');
              menu = document.querySelector('.menu-icon');
              dropMenu = document.querySelector('.drop_menu');
              menuItems = document.querySelectorAll('.drop_menu__list li');
    
              applyListeners();
            };
    
            const applyListeners = () => {
              menu.addEventListener('click', function() {
                  toggleClass(dropMenu, 'displayable');
                  toggleClass(body, 'drop_menu-active');
              }
            )};
    
            const toggleClass = (element, stringClass) => {
              if (element.classList.contains(stringClass))
                element.classList.remove(stringClass);
              else element.classList.add(stringClass);
            };
    
            init();
      })();
JS;

        $this->view->registerJs($js, View::POS_READY);

        return $this->render('responsiveBar');
    }
}