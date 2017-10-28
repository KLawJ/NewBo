<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ActsContent */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ico Acts Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-acts-content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ico Acts Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'act_id',
            'act_content',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
