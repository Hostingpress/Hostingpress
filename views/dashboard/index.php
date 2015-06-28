<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= Html::a('Create New', ['create'], ['class' => 'btn btn-success btn-sm pull-right']) ?>
      <?php \yii\widgets\Pjax::begin(); ?>
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'tableOptions' => [
			'class' => 'table table-striped table-hover table-condensed _table-bordered',
		],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
			['class' => 'yii\grid\CheckboxColumn'],
			[
				'attribute' => 'domain',
				'class' => 'yii\grid\DataColumn',
				'format' => 'raw',
				'value' => function ($data) {
					return Html::a($data->domain, 'http://' . $data->domain);
				},
			],
            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {delete}',
				'buttons' => [
					'view' => function ($url, $model, $key) {
						$btn = yii\bootstrap\Button::widget([
							'label' => 'View',
							'options' => ['class' => 'btn-info btn-xs'],
						]);
						return Html::a($btn, \yii\helpers\Url::toRoute(['dashboard/view', 'site' => $model->domain]), [
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
							'data-confirm' => 'Are you sure you want to delete this item?'
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
