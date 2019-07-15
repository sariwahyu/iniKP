<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfigSoal */

$this->title = 'Create Config Soal';
$this->params['breadcrumbs'][] = ['label' => 'Config Soals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-soal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
