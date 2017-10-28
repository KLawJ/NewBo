<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Judges */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-judges-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Judges', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'judge_id',
            
            'judge_name',
           
            // 'updated_dt',

            ['class' =>'yii\grid\ActionColumn','template'=>'{update}{delete}' ],
        ],
    ]); ?>
</div>
