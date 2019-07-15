<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Sesi;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfigSoal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-soal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'C_ID')->textInput() ?>

    <?= $form->field($model, 'K_ID')->dropDownList(
        ArrayHelper::map(Kategori::find()->all(),'K_ID', 'C_ID','K_NAMA'),
        ['prompt'=>'Pilih Kategori Soal'] 
    ) ?>

    <?= $form->field($model, 'S_ID')->dropDownList(
        ArrayHelper::map(Sesi::find()->all(),'S_ID','S_KETERANGAN'),
        ['prompt'=>'Pilih Sesi'] 
    ) ?>

    <?= $form->field($model, 'C_JUMLAH')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
