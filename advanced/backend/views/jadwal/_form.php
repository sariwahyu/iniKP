<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Jadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]  ); ?>

    <?= $form->field($model, 'U_ID')->textInput() ?>

    <?= $form->field($model, 'A_ID')->textInput() ?>

    <?= $form->field($model, 'U_TANGGAL')->textInput() ?>

    <?= $form->field($model, 'U_PESERTA')->fileInput() ?>
    <?php
        if ($model->U_PESERTA) {
            echo '<img src="'.\Yii::$app->urlManagerFrontend->baseUrl.'/'.$model->file_import.'" width"90px">&nbsp;&nbsp;&nbsp;';
            echo Html::a('Delete Files', ['deleteimg', 'id'=>$model->id, 'field'=>'file_import'], ['class'=>'btn btn-danger']).'<p>';
        }
    ?>

    <?= $form->field($model, 'status_id')->hiddenInput(['value'=>1])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
