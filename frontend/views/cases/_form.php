<style>
.input-group .form-control {
    position: relative;
    z-index: 0!important;
    float: left;
    width: 100%;
    margin-bottom: 0;
}

ul.ui-autocomplete {
    z-index: 1100;
}

</style>

<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\TblCases;
use common\models\TblCourts;
use common\models\TblCasePrefix;
use common\models\IcoJudge;
use common\models\TblJudges;
use common\models\IcoCitation;
use common\models\IcoRefCitation;
use common\models\IcoCaseNo;
use common\models\TblCitation;
use common\models\JudgeClass;
use common\models\IcoHeadnote;
use common\models\TblCasesJudgement;
  $id = Yii::$app->request->get('id');  
 $case_no ="";
 $c_prefix="";
  $case_no ="";
 $case_year ="";
 if($id==0)
 {
  $modd=TblCases::find()->orderBy(['case_id' => SORT_DESC])->one();
 $model->case_id=$modd['case_id']+1;
 
 }
/* @var $this yii\web\View */
/* @var $model common\models\TblCases */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
form div.required label.control-label:after {
  content:" * ";
  color:red;
}

</style>
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-11">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Judgment</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $form = ActiveForm::begin(['id' => 'judgment-form ',
                  'enableAjaxValidation' => true,
                  'enableClientValidation' => true,
                  'options' => [
                  'validateOnSubmit' => true,
                  'class' => 'form'
                   ],]);
    
                ?>
              <div class="box-body">
                <div class="form-group">
                   <?=  $form->field($model, 'case_id')->hiddenInput()->label(false);     ?>
                   <?=  $form->field($model, 'court_id')->dropdownlist(ArrayHelper::map(TblCourts::find()->all(), 'court_id', 'court_name'),['prompt'=>'Select']) ?>

                </div>
                <div class="form-group">
                                  
                  
                  
                    <?= $form->field($model, 'judgement_dt')->textInput(['class'=>'form-control pull-right']) ?>
                
                 
                </div>
               </div>
                <div class="form-group">
              <div class="box-body">


               <div class="col-md-05">
          <div class="box box-info">
                   <div class="box-header">
              <h3 class="box-title">Case No </h3>        
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
   <?php  
            if ($id>0)  {    
          $IcoCaseNo =  IcoCaseNo::find()
         ->where(['case_id'=>$model->case_id ])        
         ->all(); 
   echo "<ul class='list-group_case  append_list_case_no'>";
        if ($IcoCaseNo)
        {
         
           
          foreach($IcoCaseNo as $jd)
            {  
             

        echo "<li>".  $jd->case_no."<a href='index.php?r=cases%2Fdelete_cn&id=".$jd->id."&cid=".$model->case_id."' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?' data-method='post'>
<span class='glyphicon glyphicon-trash'></span>
</a></li>";

        }

             
        }
  echo "</ul>";
            }
   ?>

              <div class="row">
                <div class="col-xs-3">
   

 <?= Html::dropDownList('prefix_content', null,
      ArrayHelper::map(TblCasePrefix::find()->orderBy(['prefix_content'=>SORT_ASC])->all(), 'prefix_content', 'prefix_content'),['id'=>'prefix_content','prompt'=>'Select']) ?>
  


                </div>
               
                <div class="col-xs-4">
                  <?= $form->field($model, 'vol')->textInput(['maxlength' => true,'value'=>$case_no])->label(false) ?>
                </div>
                    <?php 
               // set start and end year range
                  $yearArray = range(1700, 2017);
foreach ($yearArray as $year) {
        // if you want to select a particular year
       $yr[$year]=$year; 
    }
               
                 ?>
                <div class="col-xs-5">
               <?=$form->field($model, 'year')->dropDownList( $yr,['prompt'=>'Select','options'=>[$case_year=>['selected'=>true]]])->label(false) ?>
       
                </div>
                   <button type='button' id="add_case_no">Add Case No</button>
 
              </div>
              </div>
                </div>
               
                 <div class="form-group">


                  <?= $form->field($model, 'citation')->textInput(['readonly'=>true,'maxlength' => true]) ?>
                </div>
                
 <div class="col-md-05">
          <div class="box box-info">
                   <div class="box-header">
              <h3 class="box-title">Judges </h3>        
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
   <?php  
            if ($id>0)  {    
          $judge =  IcoJudge::find()
         ->where(['case_id'=>$model->case_id ])        
         ->all(); 
   echo "<ul class='list-group  append_list'>";
        if ($judge)
        {
         
           
          foreach($judge as $jd)
            {  
                $tj=TblJudges::find() ->where(['judge_id'=> $jd->judge_name ])        
         ->one();
          
             $jcl=JudgeClass::find() ->where(['judge_class_id'=>  $jd->j_label ])        
         ->one();

        echo "<li>".$jcl['judge_class']."  ".  $tj['judge_name']."<a href='index.php?r=cases%2Fdelete_jd&id=".$jd->judge_id."&cid=".$model->case_id."' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?' data-method='post'>
<span class='glyphicon glyphicon-trash'></span>
</a></li>";

        }

             
        }
  echo "</ul>";
            }
   ?>
   <?=$form->field($model, 'strJudges_Class')->dropdownlist(ArrayHelper::map(JudgeClass::find()->all(), 'judge_class_id', 'judge_class'),['prompt'=>'Select'])  ?>
       
            <?=$form->field($model, 'strJudges')->textInput(['rows' => 6,'value'=>'','class'=>'auto_judge  form-control'])->label(false)   ?>
            <?=$form->field($model, 'strjudges_value')->hiddenInput(['type'=>"hidden",'rows' => 6,'class'=>'auto_judge'])->label(false)  ?>
           
    <button type='button' id="btn2">Add Judge</button>
    
</div>
  </div>
                </div>
                   <div class="form-group">
                     <?= $form->field($model, 'strPartyAName')->textInput(['rows' => 6]) ?>
                </div>
                  <div class="form-group">
                     <?= $form->field($model, 'strPartyBName')->textInput(['rows' => 6]) ?>
                </div>
                  <div class="form-group">
                     <?= $form->field($model, 'strPartyALawyer')->textInput(['rows' => 6]) ?>
                </div>
               
                  <div class="form-group">
                     <?= $form->field($model, 'strPartyBLawyer')->textInput(['rows' => 6]) ?>
                </div>
                  <div class="col-md-05">
          <div class="box box-info">
                   <div class="box-header">
              <h3 class="box-title">Citation </h3>        
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
   <?php  
         
          $citat =  IcoCitation::find()
         ->where(['case_id'=>$model->case_id ])        
         ->all(); 
    echo "<ul class='list_group_c  append_list_c'>";
        if ($citat)
        {
         
          
          foreach($citat as $jd)
            {  
              

        echo "<li>". $jd->citation."<a href='index.php?r=cases%2Fdelete_cit&id=".$jd->id."&cid=".$model->case_id."' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?' data-method='post'>
<span class='glyphicon glyphicon-trash'></span>
</a></li>";

        }

              
        }
 echo "</ul>";
   ?>
   
  <?php $array =  ArrayHelper::map(TblCitation::find()->orderby('citation_title')->all(), 'citation_template','citation_title');
      echo Html::dropDownList('citation', 'citation_title',$array ,['class'=>'form-control ','id'=>'citation_id', 'prompt'=>'Select Journal',]); ?> 
    
        <div id="citation_category"> 
        </div>
           
    <button type='button' id="btn3">Add Citation</button>
    
</div>
                </div>
                </div>
                 <div class="box box-info">
                   <div class="box-header">
              <h3 class="box-title">Reffered Citation </h3>        
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
   <?php  
         
          $Refcitat =  IcoRefCitation::find()
         ->where(['case_id'=>$model->case_id ])        
         ->all(); 
    echo "<ul class='list_group_cr  append_list_cr'>";
        if ($Refcitat)
        {
         
          
          foreach($Refcitat as $rjd)
            {  
              

        echo "<li>". $rjd->citation."<a href='index.php?r=cases%2Fdelete_citref&id=".$rjd->id."&cid=".$model->case_id."' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?' data-method='post'>
<span class='glyphicon glyphicon-trash'></span>
</a></li>";

        }

              
        }
 echo "</ul>";
   ?>
   

    
        <div id="citation_category"> 
        </div>
        <?= $form->field($model, 'strReferredCitation')->textInput(['class'=>'cit_auto form-control','rows' => 6]) ?>      
    <button type='button' id="btn4">Add  Ref Citation</button>
    
</div>
                </div>
                </div>
                   <div class="form-group">
                     <?= $form->field($model, 'remarks')->textInput(['rows' => 6]) ?>
                </div>

                <div class="form-group">
                       <div class='hd_note_split'>
         <?php
              $headnote_content="";
              $headnote= IcoHeadnote::find()
              ->where(['case_id'=>$model->case_id])
              ->all();

              if ($headnote)
              {
                foreach ($headnote as $hn)
                {

                  $headnote_content.= "<tr><td>".$hn->content."</td><td><a href='index.php?r=headnote%2Fupdate&id=".$hn->id."' title='Update' aria-label='Update' data-pjax='0'>
<span class='glyphicon glyphicon-pencil'></span></a>"." | <a href='index.php?r=hsect%2Findex&id=".$hn->id."&cid=".$hn->case_id."' title='Link' aria-label='Update' data-pjax='0'>
<span class='fa fa-fw fa-external-link'></span></a>"." | <a href='index.php?r=headnote%2Fdelete&id=".$hn->id."' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?' data-method='post'>
<span class='glyphicon glyphicon-trash'></span>
</a>
</td></tr>";

                }
     echo "<table>".$headnote_content."</table>";

              }
              else
              {
     echo "No Headnote<br>";
              }

     if ($id >0 )  {
         echo "<a href='index.php?r=headnote/create&id=".$model->case_id."'>Add Headnote </a>";
     }
          ?>
         </div>
                </div>
                   <div class="form-group">
                     <?php 

                   
                      if ($id >0)  {
            $j_content= TblCasesJudgement::find()
              ->where(['case_id'=>$model->case_id])
              ->one();

                   $model->judgement_content=$j_content['judgement_content'];
                      }
                       ?>
                     <?= $form->field($model, 'judgement_content')->textarea(['class'=>'editor form-control','rows' => 6]) ?>
                </div>
              </div>
              <!-- /.box-body -->
<div class="box-footer form-group">

              	<?= $form->field($model, 'overruled')->checkbox(); ?>

</div>
           <div class="box-footer form-group">

              	<?= $form->field($model, 'klj_reported')->checkbox(); ?>

</div>

 <div class="box-footer form-group">

              	<?= $form->field($model, 'PB')->checkbox(); ?>

</div>

 <div class="box-footer form-group">

              	<?= $form->field($model, 'PB_D')->checkbox(); ?>

</div>
              <div class="box-footer form-group">
              
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
               <?= Html::a( 'Back', Yii::$app->request->referrer)   ?>
         </div>
             
              <?php ActiveForm::end(); ?>
          </div>
          <!-- /.box -->
<div class="modal fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Judgment Link</h4>
              </div>
              <div class="modal-body">
              <input type="text" id="cross-citation" class="cita_auto" />
              <input type="hidden" id="cross-case_id"  />
                <input type="hidden" id="cross-selected_text"  />
              </div>
              <div class="modal-footer">
                <button type="button" id="m_close" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="m_save" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
         
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

