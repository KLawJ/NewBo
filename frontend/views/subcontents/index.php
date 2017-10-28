<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\IcoSubject;
use common\models\IcoSubs;
use common\models\IcoSubcontents;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Subcontents */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ico Subcontents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-subcontents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ico Subcontents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


                                   [
    
    'label' => 'Subject',
    'value' => function($model, $index, $dataColumn) {

                   $m1=IcoSubject::find()->where(['id'=>$model->subject_id])->one();
                    return $m1['subject'];
                },
    ],
             [
    
    'label' => 'Subs',
    'value' => function($model, $index, $dataColumn) {

                   $m1=IcoSubs::find()->where(['id'=>$model->subs_id])->one();
                    return $m1['name'];
                },
    ],
            'contents',

              ['class' =>'yii\grid\ActionColumn','template'=>'{update}{delete}' ],
        ],
    ]); ?>
</div>
