<div class="dropdown">
    <div class="eyeIcon icon_accessibility dataTooltip" data-toggle="dropdown" data-placement="bottom"
         title="<?= Yii::t('main', 'Специальные возможности') ?>" aria-expanded="true"><i class="fas fa-eye"></i></div>
    <div class="specialViewArea styledDrop dropdown-menu-right rightDrop dropdown-menu no-propagation">
        <div class="appearance">
            <p class="specialTitle"><?= Yii::t('main', 'Вид') ?></p>

            <div class="squareAppearances">
                <div class="squareBox spcNormal" data-toggle="tooltip" data-placement="bottom" title=""
                     data-original-title="<?= Yii::t('main', 'Обычный режим') ?>">A
                </div>
            </div>
            <div class="squareAppearances">
                <div class="squareBox spcWhiteAndBlack" data-toggle="tooltip" data-placement="bottom" title=""
                     data-original-title="<?= Yii::t('main', 'Чёрно-белый режим') ?>">A
                </div>
            </div>
            <div class="squareAppearances">
                <div class="squareBox spcDark" data-toggle="tooltip" data-placement="bottom" title=""
                     data-original-title="<?= Yii::t('main', 'Темный режим') ?>">A
                </div>
            </div>
        </div>

        <div class="appearance">
            <p class="specialTitle"><?= Yii::t('main', 'Размер шрифта') ?></p>

            <div class="squareAppearances">
                <div class="squareBox fontSizer miniFont middleFont" data-toggle="tooltip" data-placement="bottom" title=""
                     data-original-title="<?= Yii::t('main', 'Обычный') ?>">F
                </div>
            </div>
            <div class="squareAppearances">
                <div class="squareBox fontSizer largeFont" data-toggle="tooltip" data-placement="bottom" title=""
                     data-original-title="<?= Yii::t('main', 'Увеличенный') ?>">F
                </div>
            </div>
        </div>

        <div class="appearance">
            <button id="_resetAllSettings" class="btn btn-link pull-center"><?=Yii::t('main', 'Сбросить все настройки')?></button>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
