<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IcoActs */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ico Acts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-acts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ico Acts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'act_title:ntext',
             [
           'label' => 'Index',
           'format' => 'raw',
           'value' => function ($data) {
                         return Html::a('Act Index', ['actsindex/index', 'id' => $data->act_id]);
                     },
    ],
      [
           'label' => 'Contents',
           'format' => 'raw',
           'value' => function ($data) {
                         return Html::a('Act Content', ['actscontent/index', 'id' => $data->act_id]);
                     },
    ],
          
            // 'cate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
