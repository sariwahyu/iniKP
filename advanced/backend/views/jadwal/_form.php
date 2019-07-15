<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Jadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'U_ID')->textInput() ?>

    <?= $form->field($model, 'A_ID')->textInput() ?>

    <?= $form->field($model, 'U_TANGGAL')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
