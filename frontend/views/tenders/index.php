<?php
/* @var $this yii\web\View */
/* @var $model \common\models\Tenders */

$this->title = Yii::t('main', 'Tenders and Competitions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'О нас'), 'url' => ['/page/about']];
$this->params['breadcrumbs'][] = $this->title;

?>

<h1 class="boldTitle center"><?= $this->title ?></h1>

<table class="table tendersTable">
    <thead>
    <tr>
        <th class="col-md-3"><img src="<?= Yii::getAlias('@web/img/certificate_icon.png')?>"> <?= Yii::t('main', 'Название тендера') ?></th>
        <th><img src="<?= Yii::getAlias('@web/img/sign_icon.png')?>"> <?= Yii::t('main', 'Описание тендера') ?></th>
        <th class="col-md-3"><img src="<?= Yii::getAlias('@web/img/mony_icon.png')?>"> <?= Yii::t('main', 'Сумма') ?></th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($model as $item) {
        echo "
            <tr>
                <td>{$item->title}</td>
                <td>{$item->description}</td>
                <td>". number_format($item->amount, 0, ',', ' ') ." UZS</td>
            </tr>
        ";
    }
    ?>
    </tbody>
</table>