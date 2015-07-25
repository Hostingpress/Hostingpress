<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Site */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php $form = ActiveForm::begin([
			'layout' => 'horizontal',
			'enableAjaxValidation' => true
		]); ?>
      <?= $form->field($model, 'domain')->textInput(['maxlength' => true, 'placeholder' => 'site.wemakewp.com']) ?>
      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'admin')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'password')->passwordInput() ?>
      <?= $form->field($model, 'email')->textInput([]) ?>
      <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
