<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('main', 'Структура');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'О нас'), 'url' => ['/page/about']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/jquery.fancybox.min.css');
$this->registerJsFile('@web/js/jquery.fancybox.min.js', ['depends' => ['yii\web\JqueryAsset']]);

?>

<h1 class="boldTitle center"><?= $this->title ?></h1>
<section>
	<div class="content">
		<figure class="org-chart cf">
			<ul class="administration">
				<li>
					<ul class="director">
						<li>
							<a href="<?= Url::toRoute('team/58') ?>" style="color: #fe7017; font-size:22px; border-radius:40px; font-weight:600;   text-transform: uppercase;"><span><?= Yii::t('main', 'Генеральный директор'); ?> </span></a>
							<ul class="departments cf">
								<li class="department dep-0">
									<a href="<?= Url::toRoute('team/5') ?>" class="main-dep"><span style="top: 10%;"><?= Yii::t('main', 'Директор по развитию'); ?></span></a>
									<ul class="sections">
										<li class="section"><a href="<?= Url::toRoute('team/department/44') ?>"><span><?= Yii::t('main', 'Служба оценки и сертификации Современных школ'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/68') ?>"><span><?= Yii::t('main', 'Управление по развитию внешкольного образования и электронных ресурсов'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/60') ?>"><span><?= Yii::t('main', 'Отдел PR и маркетинга'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/69') ?>"><span><?= Yii::t('main', 'Отдел внедрения стартап проектов'); ?></span></a></li>
									</ul>
								</li>
								<li class="department dep-a">
									<a href="<?= Url::toRoute('team/5') ?>" class="main-dep"><span style="top: 10%;"><?= Yii::t('main', 'Директор по развитию'); ?></span></a>
									<ul class="sections">
										<li class="section"><a href="<?= Url::toRoute('team/department/44') ?>"><span><?= Yii::t('main', 'Служба оценки и сертификации Современных школ'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/68') ?>"><span><?= Yii::t('main', 'Управление по развитию внешкольного образования и электронных ресурсов'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/60') ?>"><span><?= Yii::t('main', 'Отдел PR и маркетинга'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/69') ?>"><span><?= Yii::t('main', 'Отдел внедрения стартап проектов'); ?></span></a></li>
									</ul>
								</li>
								<li class="department dep-b">
									<a href="<?= Url::toRoute('team/106') ?>" class="main-dep"><span><?= Yii::t('main', 'Директор по цифровым тенологиям'); ?></span></a>
									<ul class="sections">
										<li class="section"><a href="#"><span><?= Yii::t('main', 'Заместитель директора по цифровым технологиям'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/71') ?>"><span><?= Yii::t('main', 'Управление развития цифровых образовательных платформ'); ?> </span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/50') ?>"><span> <?= Yii::t('main', 'Управление по кибербезопасности информационных систем и ведению сети электронного обучения'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/67') ?>"><span><?= Yii::t('main', 'Управление по ведению и внедрению программного комплекса ERP'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/48') ?>"><span><?= Yii::t('main', 'Отдел технической поддержки и внедрения регионах цифровых и образовательных ресурсов'); ?></span></a></li>
									</ul>
								</li>
								<li class="department dep-c">
									<a href="<?= Url::toRoute('team/59') ?>" class="main-dep"><span style="top: 10%;"> <?= Yii::t('main', 'Директор по инновациям'); ?></span></a>
									<ul class="sections">
										<li class="section"><a href="<?= Url::toRoute('team/department/72') ?>"><span><?= Yii::t('main', 'Управление образовательных инноваций'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/54') ?>"><span><?= Yii::t('main', 'Управление по международным проектам и исследованиям'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/45') ?>"><span><?= Yii::t('main', 'Управление развития STEAM-образования'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/64') ?>"><span><?= Yii::t('main', 'Отдел по работе с обращениями в рамках системы образования'); ?></span></a></li>
									</ul>
								</li>

								<li class="department dep-e">
									<a href="<?= Url::toRoute('team/department/73') ?>" style="background: rgb(38,55,115);
background: linear-gradient(90deg, rgba(38,55,115,1) 0%, rgba(2,51,162,1) 100%); border-bottom-left-radius: 0px;
			border-top-left-radius: 40px;
			border-top-right-radius: 40px;
			border-bottom-right-radius: 40px;
			padding:0.3rem!important; font-size:14px!important;"><span style="top: 10%;"> <?= Yii::t('main', 'Департамент стратегического развития и зарубежного сотрудничества'); ?></span></a>
									<ul class="sections">
										<li class="section"><a href="<?= Url::toRoute('team/department/59') ?>"><span style="top: 30%;"> <?= Yii::t('main', 'Юрисконсульт'); ?></span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/61') ?>"><span><?= Yii::t('main', 'Отдел управления персоналом'); ?> </span></a></li>
										<li class="section"><a href="<?= Url::toRoute('team/department/57') ?>"><span> <?= Yii::t('main', 'Отдел бухгалтерского учёта'); ?></span></a></li>
										<li class="section"><a href="#"><span> <?= Yii::t('main', 'Главный экономист'); ?></span></a></li>
										<li class="section"><a href="#"><span> <?= Yii::t('main', 'Советник Генерального директора по кадрам и финансам'); ?></span></a></li>
										<li class="section"><a href="№"><span> <?= Yii::t('main', 'Отдел по внутненным делам'); ?></span></a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</figure>
	</div>
	<style>
		* {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			position: relative;
		}

		.section {
			margin: 0;
		}

		.content {
			width: 100%;
			max-width: 1142px;
			margin: 0 auto;
			padding: 0 20px;
			font-size: 17px;
			font-family: inherit;
			letter-spacing: 1px;
			line-height: 1.2rem;

		}

		a:focus {
			outline: 2px dashed #f7f7f7;
		}

		@media all and (max-width: 767px) {
			.content {
				padding: 0 20px;
			}
		}

		.content ul {
			padding: 0;
			margin: 0;
			list-style: none;
		}

		.content ul a {
			display: block;

			border-radius: 12px;
			text-align: center;
			overflow: hidden;
			font-size: 14px;
			text-decoration: none;
			vertical-align: -webkit-baseline-middle;
			padding: 2px;
			color: #fff;
			height: 70px;
			margin-bottom: -26px;
			box-shadow: 2px 2px 9px -2px rgba(0, 0, 0, 0.4);
			-webkit-transition: all linear .1s;
			-moz-transition: all linear .1s;
			transition: all linear .1s;
		}


		@media all and (max-width: 767px) {
			.content ul a {
				font-size: 1em;
			}
		}

		.content ul a span {
			vertical-align: -webkit-baseline-middle;
		}

		.director>li>a {
			width: 40%;
			top: 25%;
			margin: 0 auto 0px auto;

		}

		.director>li>a span {
			top: 25%;
		}

		.departments {
			position: absolute;
			width: 100%;
			display: contents;
			height: auto;

		}

		.departments>li:first-child {
			width: 15.59894921190893%;
			height: 52px;
			margin: 0 auto 20px auto;
			padding-top: 5px;
			z-index: 1;

		}

		.departments>li:first-child {
			float: left;
			left: 0%;
			border-right: 1.5px solid lightgrey;
		}

		.departments>li:first-child a {
			width: 100%;
		}

		@media all and (max-width: 767px) {
			.departments>li:first-child {
				width: 40%;
			}

			.director>li>a {
				width: 100%;
				top: 10%;
			}

			.departments>li:first-child {
				left: 10%;
				margin-left: 2px;
			}
		}

		.departments>li:first-child a {
			right: 25px;
		}

		.departments li:nth-child(2) {
			margin-left: 0;
			clear: left;

		}

		.departments:after {
			content: "";
			display: block;
			position: absolute;
			width: 81.1%;
			height: 22px;
			border-top: 1.5px solid lightgrey;
			border-right: 1.5px solid lightgrey;
			border-left: 1.5px solid lightgrey;
			margin: 0 auto;
			top: 120px;
			left: 9.1%
		}

		@media all and (max-width: 767px) {
			.departments:after {
				border-right: none;
				left: 0;
				width: 49.8%;
			}
		}

		@media all and (min-width: 768px) {

			.department:first-child:before,
			.department:last-child:before {
				border: none;
			}
		}

		.department:before {
			content: "";
			display: block;
			position: absolute;
			width: 0;
			height: 22px;
			border-left: 1.5px solid lightgrey;
			z-index: 1;
			top: -22px;
			left: 50%;
			margin-left: -2px;
		}

		.department {
			border-left: 1.5px solid lightgrey;
			width: 15.59894921190893%;
			float: left;
			margin-left: 5%;
			left: 21%;
			margin-bottom: 65px;
		}

		.lt-ie8 .department {
			width: 18.25%;
		}

		@media all and (max-width: 767px) {
			.department {
				float: none;
				width: 100%;
				margin-left: 0;
			}

			.department:before {
				content: "";
				display: block;
				position: absolute;
				width: 0;
				height: 10px;
				border-left: 1.5px solid lightgrey;
				z-index: 1;
				top: -60px;
				left: 0%;
				margin-left: -2px;
			}

			.department:nth-child(2):before {
				display: none;
			}
		}

		.department>a {
			margin: 0 0 -26px -2px;
			z-index: 1;

		}

		.department>ul {
			margin-top: 0px;
			margin-bottom: 0px;

		}

		.department li {
			padding-left: 25px;
			border-bottom: 1.5px solid lightgrey;
			height: 80px;
			vertical-align: -webkit-baseline-middle;
			align-items: center;

		}

		.department li a {
			color: black;
			top: 48px;
			position: absolute;
			z-index: 1;
			width: 100%;
			height: auto;
			right: -1px;
			padding: 5px 15px;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#40000000', endColorstr='#00000000', GradientType=1);

		}

		.department.dep-e a,
		.department.dep-d a,
		.department.dep-c a,
		.department.dep-a a,
		.department.dep-b a {

			padding: 1rem;
			font-size: 14px;
			background: white;
			text-align: start;
		}

		.department .dep-0 {
			left: 0%;
		}

		.department .main-dep {
			border-bottom-left-radius: 0px;
			border-top-left-radius: 40px;
			border-top-right-radius: 40px;
			border-bottom-right-radius: 40px;
			padding: 1.6rem !important;
			background: rgb(254, 112, 23) !important;
			background: linear-gradient(90deg, rgba(254, 112, 23, 1) 0%, rgba(255, 176, 27, 1) 100%) !important;
			color: white;
			font-size: 14px;
			font-weight: 600;
			width: 100%;

		}

		.department ul a span {
			display: inline-block;
			border-left: 2px solid #263773;
			margin: 0px 5px;
			height: auto;
			padding: inherit;
			text-align: start;
		}
	</style>