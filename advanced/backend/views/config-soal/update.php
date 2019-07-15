<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfigSoal */

$this->title = 'Update Config Soal: ' . $model->C_ID;
$this->params['breadcrumbs'][] = ['label' => 'Config Soals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->C_ID, 'url' => ['view', 'id' => $model->C_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="config-soal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
