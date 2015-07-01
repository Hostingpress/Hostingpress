<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
app\assets\BootboxAsset::overrideSystemConfirm();
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= Html::a('Create New', ['create'], ['class' => 'btn btn-success btn-sm pull-right']) ?>
      <?php \yii\widgets\Pjax::begin(); ?>
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'tableOptions' => [
			'class' => 'table table-striped table-hover table-condensed _table-bordered',
		],
		'options' => [
			'id' => 'dashboardGrid'
		],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
			// ['class' => 'yii\grid\CheckboxColumn'],
			[
				'attribute' => 'domain',
				'class' => 'yii\grid\DataColumn',
				'format' => 'raw',
				'value' => function ($model) {
					if($model->status != 'active') return $model->domain;
					return Html::a($model->domain, 'http://' . $model->domain);
				},
			],
            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view}',
				'buttons' => [
					'view' => function ($url, $model, $key) {
						if($model->status == 'new'){
							return '<button class="btn-primary btn-xs btn disabled" data-status="new" data-site="' . $model->domain . '"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Setup...</button>';
						}
						if($model->status == 'deleted'){
							return '<button class="btn-danger btn-xs btn disabled" data-status="deleted" data-site="' . $model->domain . '"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Deleting...</button>';
						}
						$btn = yii\bootstrap\Button::widget([
							'label' => 'Manage',
							'options' => ['class' => 'btn-primary btn-xs'],
						]);
						return Html::a($btn, \yii\helpers\Url::toRoute(['dashboard/manage', 'site' => $model->domain]), [
							'data-pjax' => 0,
						]);
					},
					'update' => function ($url, $model, $key) {
						$btn = yii\bootstrap\Button::widget([
							'label' => 'Update',
							'options' => ['class' => 'btn-primary btn-xs'],
						]);
						return Html::a($btn, \yii\helpers\Url::toRoute(['dashboard/update', 'site' => $model->domain]), [
							'data-pjax' => 0,
						]);
					},
					'delete' => function ($url, $model, $key) {
						$btn = yii\bootstrap\Button::widget([
							'label' => 'Delete',
							'options' => ['class' => 'btn-danger btn-xs'],
						]);
						return Html::a($btn, \yii\helpers\Url::toRoute(['dashboard/delete', 'site' => $model->domain]), [
							'data-pjax' => 0,
							'data-method' => 'post',
							'data-confirm' => 'Are you sure you want to delete this site?'
						]);
					},
					'status' => function ($url, $model, $key) {
						if($model->status == 1){
							$btn = yii\bootstrap\Button::widget([
								'label' => 'Suspend',
								'options' => ['class' => 'btn-warning btn-xs'],
							]);
							$confirm = 'Are you sure you want to suspend this site?';
						} else {
							$btn = yii\bootstrap\Button::widget([
								'label' => 'Unsuspend',
								'options' => ['class' => 'btn-success btn-xs'],
							]);
							$confirm = 'Are you sure you want to unsuspend this site?';
						}
						return Html::a($btn, \yii\helpers\Url::toRoute(['dashboard/status', 'site' => $model->domain]), [
							'data-pjax' => 1,
							'data-method' => 'post',
							'data-confirm' => $confirm
						]);
					},
				]
			],
        ],
    ]); ?>
      <?php \yii\widgets\Pjax::end(); ?>
    </div>
  </div>
</div>
