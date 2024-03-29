<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jadwal */

$this->title = 'Update Jadwal: ' . $model->U_ID;
$this->params['breadcrumbs'][] = ['label' => 'Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->U_ID, 'url' => ['view', 'id' => $model->U_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
