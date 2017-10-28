<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblCasePrefix */

$this->title = 'Update Case Prefix: ' . $model->prefix_id;
$this->params['breadcrumbs'][] = ['label' => 'Case Prefixes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prefix_id, 'url' => ['view', 'id' => $model->prefix_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-case-prefix-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
