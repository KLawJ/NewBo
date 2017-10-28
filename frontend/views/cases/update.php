<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblCases */

$this->title = 'Case id: ' . $model->case_id;
$this->params['breadcrumbs'][] = ['label' => 'Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->case_id,];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-cases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
