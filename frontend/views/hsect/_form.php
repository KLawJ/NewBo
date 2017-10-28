<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\jui\AutoComplete;
use common\models\IcoSubject;
use common\models\IcoSubs;
use common\models\IcoSubcontents;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\IcoHeadnoteSection */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="ico-headnote-section-form">

    <?php $form = ActiveForm::begin(['id'=>'icoheadnotesection','enableClientValidation' => false,]); ?>
   <?php   $id = Yii::$app->request->get('id');
 $hd_id = Yii::$app->request->get('hd_id');
    if ($id >0)  {
     
         $model->hsubject_id=$model->subject_id;
          $model->hsection_id=$model->section_id;  
  $subj= IcoSubject::find()->where(['id'=>$model->subject_id])->one();
    $subs= IcoSubs::find()->where(['id'=>$model->section_id])->one();
 
  $model->subject_id=$subj['subject'];

  $model->section_id=$subs['name'];
 
    }
else
{
$model->headnote_id=$hd_id;
}
    
      ?>
   
  <?= $form->field($model, 'headnote_id')->hiddenInput()->label(false);?>
      <?= $form->field($model, 'subject_id')->textInput(['class'=>'subject_auto form-control']) ?>
      <?= $form->field($model, 'hsubject_id')->hiddenInput()->label(false);?>

      
   <?= $form->field($model, 'section_id')->textInput(['class'=>'section_auto form-control']) ?>
      <?= $form->field($model, 'hsection_id')->hiddenInput()->label(false);?>

      <?php      if ($id >0)  { $subc= IcoSubcontents::find()->where(['id'=>$model->value_1])->one();
 $model->hvalue_1=$model->value_1;
  $model->value_1=$subc['contents'];  }   
   ?>
<?= $form->field($model, 'value_1')->textInput(['class'=>'auto1 form-control' ]) ?>
<?= $form->field($model, 'hvalue_1')->hiddenInput()->label(false); ?>


    <?php      if ($id >0)  { $subc= IcoSubcontents::find()->where(['id'=>$model->value_2])->one();
  $model->hvalue_2=$model->value_2;
  $model->value_2=$subc['contents'];  }   
   ?>
    <?= $form->field($model, 'value_2')->textInput(['class'=>'auto2 form-control']) ?>
    <?= $form->field($model, 'hvalue_2')->hiddenInput()->label(false); ?>
 <?php      if ($id >0)  { $subc= IcoSubcontents::find()->where(['id'=>$model->value_3])->one();
  $model->hvalue_3=$model->value_3;
  $model->value_3=$subc['contents'];  }   
   ?>
    <?= $form->field($model, 'value_3')->textInput(['class'=>'auto3 form-control']) ?>
    <?= $form->field($model, 'hvalue_3')->hiddenInput()->label(false);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
       <?= Html::a( 'Back',  ['hsect/index','id' => $model->headnote_id])   ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

