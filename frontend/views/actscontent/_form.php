<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IcoActsContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ico-acts-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'act_id')->textInput() ?>

    <?= $form->field($model, 'act_content')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
