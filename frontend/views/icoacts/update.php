<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IcoActs */

$this->title = 'Update Ico Acts: ' . $model->act_id;
$this->params['breadcrumbs'][] = ['label' => 'Ico Acts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->act_id, 'url' => ['view', 'id' => $model->act_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ico-acts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
