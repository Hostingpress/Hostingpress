<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Site */

$this->title = 'Create Site';
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
  </div>
</div>
