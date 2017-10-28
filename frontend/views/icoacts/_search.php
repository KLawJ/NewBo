<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IcoActs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ico-acts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'act_id') ?>

    <?= $form->field($model, 'act_title') ?>

    <?= $form->field($model, 'act_date') ?>

    <?= $form->field($model, 'enabled') ?>

    <?= $form->field($model, 'updatedon') ?>

    <?php // echo $form->field($model, 'cate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
