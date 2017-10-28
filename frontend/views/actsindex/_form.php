<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IcoActsIndex */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ico-acts-index-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'act_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chapter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'section')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updatedon')->textInput() ?>

    <?= $form->field($model, 'enabled')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
