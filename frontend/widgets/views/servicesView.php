<div class="container">
    <h1 class="boldTitle center"><?= Yii::t('main', 'Услуги')?></h1>

    <div class="servicesList">
        <?php
        /* @var $serviceList array */
        foreach ($serviceList as $item) {
            echo "
                <a href='{$item['url']}' class='col'>
                    <div class='titleBox'>
                        <img class='sImage' src='{$item['image']}'>
                        <p>{$item['title']}</p>
                    </div>
                    
                    <div class='sContent'>{$item['text']}</div>
                </a>  
            ";
        }
        ?>
    </div>
</div>