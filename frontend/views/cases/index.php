<?php

use yii\helpers\Html;
use yii\helpers\Url ;
use yii\widgets\Pjax ;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use common\models\TblCourts;
use common\models\IcoCaseNo;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblCases */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cases - ICO';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->db->createCommand("SET @run_balqty :=null;")->execute();

?>

   



  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-11">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            
                  <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
                    <p>
        <?= Html::a('Create Cases', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
            </div>
            <!-- /.box-header -->
<div class="tbl-cases-index ">
 

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
              [
             'attribute'=>'Date',
             'value'=> function($model) { return date("Y-m-d", strtotime($model->judgement_dt));},
              'contentOptions'=>['style'=>'width: 10px;']
            
             ],
     
              [
             'attribute'=>'ICO',
             'value'=> function($model) { return$model->citation;},
              'contentOptions'=>['style'=>'width: 10px;']
            
             ],
             [
             'attribute'=>'Case No',
             'format'=>'html',
             'contentOptions'=>['style'=>'width: 10px;'],
             'content'=> function($model) {  $IcoCaseNo=IcoCaseNo::find()->where(['case_id'=>$model->case_id])->all(); 
                                           $cc="";
                                           $i=0;
                                           foreach ($IcoCaseNo as $cno) { 
                                           if ($i==0){$cc=$cno->case_no;}
                                           else {$cc.=";".$cno->case_no;}
                                           $i++; }
                                           return $cc  . "<br>" . $model->strParties ;
                                          },
              
            
             ],
          [
             'attribute'=>'Court',
             'value'=> function($model) { $crt=TblCourts::find()->where(['court_id'=>$model->court_id])->one(); return $crt->court_code ;},
              'contentOptions'=>['style'=>'width: 10px;']
            
             ],
            
              [
             'attribute'=>'Lastupdated',
             'value'=> function($model) { return date("Y-m-d", strtotime($model->lastupdated));},
              'contentOptions'=>['style'=>'width: 10px;']
            
             ],
       
       
 [
            'class' =>'yii\grid\ActionColumn',
            'header' => 'View',
            'template' => '{view}',

            'buttons' => [
               
                'view' => function ($url, $model) {
              
            $icon = '<span class="glyphicon glyphicon-eye-open"></span>';
            return Html::a($icon, $url, [
                'id' => 'popup-window',
                        'title' => Yii::t('app', 'View'),
                        'data-toggle' => "modal",
                        'data-target' => "#myModal",
                         'data-pjax' =>true,
            ]);
        },
            ],
            'urlCreator' => function ($action, $model, $key, $index) {
        if ($action === 'view') {
            $url = Url::toRoute(['/cases/view', 'id' => $model->case_id], ['data-method' => 'post',]);
            return $url;
        }
    }
        ]
    ,
        
        
             ['class' =>'yii\grid\ActionColumn','template'=>'{update}' ],
             
        ],
    ]); ?>


  
  <?php
Modal::begin([
'id' => 'myModal',
 'closeButton' => ['id' => 'close-button'],
'clientOptions' => ['backdrop' => false],
]);
 Pjax::begin([
     'id'=>'myModal1','timeout'=>false,
     'enablePushState'=>false,
     'enableReplaceState'=>false,
 
 ]); 

 Pjax::end();

 Modal::end();
?>
  </div>
     </div>
          <!-- /.box -->

         
      </div>
  </div>

      <!-- /.row -->
    </section>

    <!-- /.content -->