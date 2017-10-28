<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblCitation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-citation-form">

    <?php $form = ActiveForm::begin(); ?>

 

    <?= $form->field($model, 'citation_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'citation_format')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'citation_template')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
