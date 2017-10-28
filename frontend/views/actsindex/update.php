<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IcoActsIndex */

$this->title = 'Update Ico Acts Index: ' . $model->a_id;
$this->params['breadcrumbs'][] = ['label' => 'Ico Acts Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->a_id, 'url' => ['view', 'id' => $model->a_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ico-acts-index-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
