<div class="row section">
    <div class="info_cards">
        <div class="col-md-4">
            <div class="card_item">
                <div class="card_content">
                    <div class="info_card_icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>

                    <h1><?= Yii::t('main', 'Телефон') ?></h1>

                    <?= @$contacts['phone']?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card_item">
                <div class="card_content">
                    <div class="info_card_icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>

                    <h1><?= Yii::t('main', 'Адрес') ?></h1>

                    <p><?= @$contacts['address']?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card_item">
                <div class="card_content">
                    <div class="info_card_icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>

                    <h1><?= Yii::t('main', 'Э-ПОЧТА') ?></h1>

                    <?= @$contacts['mail']?>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<style>
    .card_content li{
        list-style-type:none!important;
    }
</style>