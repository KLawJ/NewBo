<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IcoHeadnote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ico-headnote-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'case_id')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['class'=>'editor form-control','rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
 <?= Html::a( 'Back', Yii::$app->request->referrer)   ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
