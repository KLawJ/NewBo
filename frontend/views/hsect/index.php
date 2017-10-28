<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\IcoSubject;
use common\models\IcoHeadnote;
use common\models\IcoSubs;
use common\models\IcoSubcontents;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\HeadnoteSection */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ico Headnote Sections';
$this->params['breadcrumbs'][] = $this->title;

$ich=IcoHeadnote::find()->where(['id'=>$hd_id])->one();

?>
<div class="ico-headnote-section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Ico Headnote Section', ['create','hd_id'=>$hd_id], ['class' => 'btn btn-success']); ?>
     <?= Html::a( 'Back',  ['cases/update','id' => $ich->case_id])   ?>
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

                   $m1=IcoSubs::find()->where(['id'=>$model->section_id])->one();
                    return $m1['name'];
                },
    ],
               [
    
    'label' => 'Value 1',
    'value' => function($model, $index, $dataColumn) {

                   $m1=IcoSubcontents::find()->where(['id'=>$model->value_1])->one();
                    return $m1['contents'];
                },
    ],
              [
    
    'label' => 'Value 2',
    'value' => function($model, $index, $dataColumn) {

                   $m1=IcoSubcontents::find()->where(['id'=>$model->value_2])->one();
                    return $m1['contents'];
                },
    ],
             [
    
    'label' => 'Value 3',
    'value' => function($model, $index, $dataColumn) {

                   $m1=IcoSubcontents::find()->where(['id'=>$model->value_3])->one();
                    return $m1['contents'];
                },
    ],

            ['class' =>'yii\grid\ActionColumn','template'=>'{update}{delete}' ],
        ],
    ]); ?>
</div>
