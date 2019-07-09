<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php 
    if(Yii::$app->session->hasFlash('success')){
        echo"<div class='alert-success'>".Yii::$app->session->getFlash('success')."<div>";
    }
?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'a_username'); ?>
<?= $form->field($model, 'a_password'); ?>

<?= Html::submitButton('Submit',['class'=>'btn btn-success']);?>