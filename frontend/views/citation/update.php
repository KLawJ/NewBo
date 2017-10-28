<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblCitation */

$this->title = 'Update Citation: ' . $model->citation_id;
$this->params['breadcrumbs'][] = ['label' => 'Citations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->citation_id, 'url' => ['view', 'id' => $model->citation_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-citation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
