<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 8/18/19
 * Time: 4:16 PM
 */

/* @var $this \yii\web\View */

/* @var $model \common\models\GalleryCategory[] */

use yii\helpers\Html;

$this->title = Yii::t('main', 'Нормативные документы');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs($js);

echo \yii\helpers\Html::tag('p', $this->title, ['class' => 'title']);
?>
<Style>
.js-pscroll {
  position: relative;
  overflow: hidden;
}

.table100 .ps__rail-y {
  width: 9px;
  background-color: transparent;
  opacity: 1 !important;
  right: 5px;
}

.table100 .ps__rail-y::before {
  content: "";
  display: block;
  position: absolute;
  background-color: #ebebeb;
  border-radius: 5px;
  width: 100%;
  height: calc(100% - 30px);
  left: 0;
  top: 15px;
}

.table100 .ps__rail-y .ps__thumb-y {
  width: 100%;
  right: 0;
  background-color: transparent;
  opacity: 1 !important;
}

.table100 .ps__rail-y .ps__thumb-y::before {
  content: "";
  display: block;
  position: absolute;
  background-color: #cccccc;
  border-radius: 5px;
  width: 100%;
  height: calc(100% - 30px);
  left: 0;
  top: 15px;
}

/*//////////////////////////////////////////////////////////////////
[ Table ]*/

.limiter {
  width: auto;
  margin: 0 auto;
}

.container-table100 {
  width: 100%;
  /* min-height: 100vh; */
  background: #fff;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  padding: 33px 30px;
}

.wrap-table100 {
  width: 100%;
}

/*//////////////////////////////////////////////////////////////////
[ Table ]*/
.table100 {
  background-color: #fff;
}

table {
  width: 100%;
}

th, td {
  font-weight: unset;
  padding-right: 10px;
}

.column1 {
  width: 5%;
  padding-left: 40px;
}

.column2 {
  width: 60%;
}

.column3 {
  width: 35%;
}

.table100-head th {
  padding-top: 18px;
  padding-bottom: 18px;
}

.table100-body td {
  padding-top: 16px;
  padding-bottom: 16px;
}

/*==================================================================
[ Fix header ]*/
.table100 {
  position: relative;
  padding-top: 60px;
}

.table100-head {
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
}

.table100-body {
  max-height: 585px;
  overflow: auto;
}


/*==================================================================
[ Ver1 ]*/

.table100.ver1 th {
  font-family: Lato-Bold;
  font-size: 18px;
  color: #fff;
  line-height: 1.4;
  text-align: center;
  background-color: #6c7ae0;
}

.table100.ver1 td {
  font-family: Lato-Regular;
  font-size: 15px;
  color: #808080;
  line-height: 1.4;
  text-align: center;
}

.table100.ver1 .table100-body tr:nth-child(even) {
  background-color: #f8f6ff;
}

/*---------------------------------------------*/

.table100.ver1 {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -o-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -ms-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
}

.table100.ver1 .ps__rail-y {
  right: 5px;
}

.table100.ver1 .ps__rail-y::before {
  background-color: #ebebeb;
}

.table100.ver1 .ps__rail-y .ps__thumb-y::before {
  background-color: #cccccc;
}
</Style>

<div class="limiter">
<div class="container-table100">
    <div class="wrap-table100">
        <div class="table100 ver1 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                        <tr class="row100 head ">
                            <th class="cell100 column1">№</th>
                            <th class="cell100 column2 " >Наименование</th>
                            <th class="cell100 column3">Файл</th>
                      
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
                    <?php
                    $id=1;
                          foreach ($model as $item) {
                              echo "
                                  <tr class='row100 body'>
                                  <td class='cell100 column1'>{$id}</td>
                                  <td class='cell100 column2'>{$item->title}</td>
                                  <td class='cell100 column3'>{$item->files}</td>
                                  </tr>
                              ";
                              $id++;
                          }
                          ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</div>

<?php
$js = <<<JS
    $(document).ready(function() {
        $('.images_list').isotope({
          itemSelector: '.gItem',
        })
    })
JS;
$this->registerJs($js);
$this->registerJsFile(Yii::getAlias("@web/js/isotope.pkgd.min.js"), ['depends' => ['yii\web\JqueryAsset']]);
