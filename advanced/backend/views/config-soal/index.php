<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConfigSoalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Config Soals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-soal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Config Soal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'C_ID',
            'K_ID',
            'S_ID',
            'C_JUMLAH',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
