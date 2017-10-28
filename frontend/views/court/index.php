<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Court */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-courts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Courts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'court_code',
            'court_name:ntext',
          

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
