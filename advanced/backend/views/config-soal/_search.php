<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfigSoalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-soal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'C_ID') ?>

    <?= $form->field($model, 'K_ID') ?>

    <?= $form->field($model, 'S_ID') ?>

    <?= $form->field($model, 'C_JUMLAH') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
