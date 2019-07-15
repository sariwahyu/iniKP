<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JadwalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'U_ID') ?>

    <?= $form->field($model, 'A_ID') ?>

    <?= $form->field($model, 'U_TANGGAL') ?>

    <?= $form->field($model, 'U_DIBUAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
