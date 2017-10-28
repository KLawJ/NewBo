<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\IcoSubject;
use common\models\IcoSubs;

/* @var $this yii\web\View */
/* @var $model frontend\models\Subcontents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ico-subcontents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

   

    <?= $form->field($model, 'subject_id')->dropdownlist(ArrayHelper::map(IcoSubject::find()->all(), 'id', 'subject')) ?>

    <?= $form->field($model, 'subs_id')->dropdownlist(ArrayHelper::map(IcoSubs::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'contents') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
