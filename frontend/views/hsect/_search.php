<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\HeadnoteSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ico-headnote-section-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'headnote_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'section_id') ?>

    <?= $form->field($model, 'value_1') ?>

    <?php // echo $form->field($model, 'value_2') ?>

    <?php // echo $form->field($model, 'value_3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
