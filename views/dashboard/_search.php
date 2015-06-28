<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SiteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'domain') ?>

    <?= $form->field($model, 'DB_NAME') ?>

    <?= $form->field($model, 'DB_USER') ?>

    <?php // echo $form->field($model, 'DB_PASSWORD') ?>

    <?php // echo $form->field($model, 'DB_HOST') ?>

    <?php // echo $form->field($model, 'DB_CHARSET') ?>

    <?php // echo $form->field($model, 'DB_COLLATE') ?>

    <?php // echo $form->field($model, 'AUTH_KEY') ?>

    <?php // echo $form->field($model, 'SECURE_AUTH_KEY') ?>

    <?php // echo $form->field($model, 'LOGGED_IN_KEY') ?>

    <?php // echo $form->field($model, 'NONCE_KEY') ?>

    <?php // echo $form->field($model, 'AUTH_SALT') ?>

    <?php // echo $form->field($model, 'SECURE_AUTH_SALT') ?>

    <?php // echo $form->field($model, 'LOGGED_IN_SALT') ?>

    <?php // echo $form->field($model, 'NONCE_SALT') ?>

    <?php // echo $form->field($model, 'DB_PREFIX') ?>

    <?php // echo $form->field($model, 'WP_DEBUG') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
