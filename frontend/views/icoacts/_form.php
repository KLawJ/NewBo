<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IcoActs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ico-acts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'act_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'act_date')->textInput() ?>

    <?= $form->field($model, 'enabled')->textInput() ?>

    <?= $form->field($model, 'updatedon')->textInput() ?>

    <?= $form->field($model, 'cate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
