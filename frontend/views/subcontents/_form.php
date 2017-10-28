<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\jui\AutoComplete;
use common\models\IcoSubject;
use common\models\IcoSubs;
use common\models\IcoSubcontents;

/* @var $this yii\web\View */
/* @var $model common\models\IcoSubcontents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ico-subcontents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php   $id = Yii::$app->request->get('id');  
    if ($id >0)  {
  $subj= IcoSubject::find()->where(['id'=>$model->subject_id])->one();
    $subs= IcoSubs::find()->where(['id'=>$model->subs_id])->one();
  $model->subject_id=$subj['subject'];
  $model->subs_id=$subs['name'];

    }
    
      ?>

       <?= $form->field($model, 'subject_id')->textInput(['class'=>'subject_auto1 form-control']) ?>
     <?= $form->field($model, 'hsubject_id')->hiddenInput()->label(false);?>

      
   <?= $form->field($model, 'subs_id')->textInput(['class'=>'section_auto1 form-control']) ?>
   <?= $form->field($model, 'hsection_id')->hiddenInput()->label(false);?>
      <?= $form->field($model, 'value_1')->textInput(['class'=>'sauto1 form-control']) ?>
<?= $form->field($model, 'hvalue_1')->hiddenInput()->label(false);?>

    <?= $form->field($model, 'value_2')->textInput(['class'=>'sauto2 form-control']) ?>
  <?= $form->field($model, 'hvalue_2')->hiddenInput()->label(false);?>

    <?= $form->field($model, 'value_3')->textInput(['class'=>'sauto3 form-control']) ?>
 <?= $form->field($model, 'hvalue_3')->hiddenInput()->label(false);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
