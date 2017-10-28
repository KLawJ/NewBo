<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblCases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-cases-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'citation') ?>



    <?php  echo $form->field($model, 'case_no') ?>

    <?php // echo $form->field($model, 'strOppPartyType') ?>

    <?php // echo $form->field($model, 'strPartyAName') ?>

    <?php // echo $form->field($model, 'strPartyBName') ?>

    <?php  echo $form->field($model, 'strParties') ?>

    <?php // echo $form->field($model, 'strPartyALawyer') ?>

    <?php // echo $form->field($model, 'strPartyBLawyer') ?>

    <?php // echo $form->field($model, 'strAdvocate') ?>

    <?php // echo $form->field($model, 'strAppearingLawyers') ?>

    <?php // echo $form->field($model, 'strJudges') ?>

    <?php // echo $form->field($model, 'headnote_content') ?>

    <?php // echo $form->field($model, 'citation') ?>

    <?php // echo $form->field($model, 'strReferredCitation') ?>

    <?php // echo $form->field($model, 'strAmicuscurie') ?>

    <?php // echo $form->field($model, 'strJudgementData') ?>

    <?php // echo $form->field($model, 'strFileName') ?>

    <?php // echo $form->field($model, 'isNew')->checkbox() ?>

    <?php // echo $form->field($model, 'oldCaseID') ?>

    <?php // echo $form->field($model, 'strEquivalentCitation') ?>

    <?php // echo $form->field($model, 'lastupdated') ?>

    <?php // echo $form->field($model, 'CD') ?>

    <?php // echo $form->field($model, 'HN') ?>

    <?php // echo $form->field($model, 'JD') ?>

    <?php // echo $form->field($model, 'QC') ?>

    <?php // echo $form->field($model, 'PB') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'shorthead') ?>

    <?php // echo $form->field($model, 'nhn') ?>

    <?php // echo $form->field($model, 'reporters') ?>

    <?php // echo $form->field($model, 'ico_reported') ?>

    <?php // echo $form->field($model, 'klj_reported') ?>

    <?php // echo $form->field($model, 'alignment') ?>

    <?php // echo $form->field($model, 'links') ?>

    <?php // echo $form->field($model, 'languages') ?>

    <?php // echo $form->field($model, 'img_table') ?>

    <?php // echo $form->field($model, 'scan') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'judgement') ?>

    <?php // echo $form->field($model, 'proof1') ?>

    <?php // echo $form->field($model, 'proof2') ?>

    <?php // echo $form->field($model, 'reject') ?>

    <?php // echo $form->field($model, 'hlinks') ?>

    <?php // echo $form->field($model, 'overruled') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
