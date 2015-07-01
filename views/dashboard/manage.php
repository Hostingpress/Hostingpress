<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Site */

$this->title = $model->domain;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

app\assets\BootboxAsset::overrideSystemConfirm();
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <!--<p>
        <?php // Html::a('Update', ['update', 'site' => $model->domain], ['class' => 'btn btn-primary']) ?>
      </p>-->
      <?= DetailView::widget([
        'model' => $model,
		'options' => [
			'class' => 'table table-striped table-hover table-condensed _table-bordered',
		],
        'attributes' => [
            'domain',
        ],
    ]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="page-header">
        <h4> Authorized Access </h4>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?= yii\bootstrap\Collapse::widget([
		'items' => [
			[
				'label' => 'Delete Site',
				'content' => Html::a('Delete', ['delete', 'site' => $model->domain], [
					'class' => 'btn btn-danger',
					'data' => [
						'confirm' => 'Are you sure you want to delete this site?',
						'method' => 'post',
					],
				]),
				'contentOptions' => ['class' => 'out']
			],
		]
	]);?>
    </div>
  </div>
</div>
