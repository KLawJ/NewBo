<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Citation */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Citations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-citation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Citation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'citation_title',
            'citation_format',
            'citation_template',
            

                  ['class' =>'yii\grid\ActionColumn','template'=>'{update}{delete}' ],
        ],
    ]); ?>
</div>
