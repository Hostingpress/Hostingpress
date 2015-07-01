<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Site */

$this->title = 'Update Site: ' . ' ' . $model->domain;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->domain, 'url' => ['manage', 'site' => $model->domain]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
