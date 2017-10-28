<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblJudges */

$this->title = 'Update Tbl Judges: ' . $model->judge_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Judges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judge_id, 'url' => ['view', 'id' => $model->judge_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-judges-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
