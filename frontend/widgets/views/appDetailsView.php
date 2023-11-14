<div class="section">
    <div class="container">
        <div class="tabs-left instaTabs">
            <ul class="nav nav-tabs" role="tablist">
                <?php
                $isFirst = true;
                foreach ($categories as $category) {
                    $active = ($isFirst) ? 'active': '';
                    $isFirst = false;

                    echo "
                        <li class='{$active}'>
                            <a href='#{$category['code']}' role='tab' data-toggle='tab'>
                                <img src='{$category['icon']}'>
                                <span>{$category['title']}</span>
                            </a>
                        </li>        
                    ";
                }
                ?>
            </ul>

            <div class="tab-content">
                <?php
                $isFirst = true;
                foreach ($categories as $category) {
                    $active = ($isFirst) ? 'active': '';
                    $isFirst = false;

                    echo "
                        <div role='tabpanel' class='tab-pane {$active}' id='{$category['code']}'>
                           <div class='casesList swiper-container'>
                            <div class='swiper-wrapper'>  
                    ";

                    foreach ($category['items'] as $item) {
                        echo "<div class='swiper-slide'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <h1>". Yii::t('main', 'Цель') .":</h1>
                                        <p>{$item->goal}</p>

                                        <h1>". Yii::t('main', 'Результат') .":</h1>
                                        <p>{$item->result}</p>
                                    </div>

                                    <div class='col-md-6'>
                                        <img src='". Yii::getAlias('@web/uploads/content/'. $item->screen .'.jpg') ."'>
                                    </div>
                                </div>
                            </div>";
                    }

                    echo "
                        </div>
    
                            <div class='buttons swiper-button-next'></div>
                            <div class='buttons swiper-button-prev'></div>
                        </div>
                    </div>
                    ";
                }
                ?>

            </div>

            <?php
            $this->registerCssFile('@web/css/swiper.min.css');

            $this->registerJsFile('@web/js/swiper.min.js', [
                'depends' => ['yii\web\JqueryAsset']
            ]);

            $js = <<<JS
    function initSlider() {
        new Swiper ('.casesList', {
            spaceBetween: 10,
            slidesPerView: 'auto',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 10000,
                disableOnInteraction: false,
            }
        });
    }
    
    initSlider();
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        e.target;
        e.relatedTarget;
        initSlider();
    });
JS;
            $this->registerJs($js, \yii\web\View::POS_READY);
            ?>

        </div>
    </div>
</div>
