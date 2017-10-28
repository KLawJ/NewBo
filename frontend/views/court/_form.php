<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblCourts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-courts-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'court_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_name')->textarea(['rows' => 6]) ?>

 



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
