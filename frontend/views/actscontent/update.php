<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IcoActsContent */

$this->title = 'Update Ico Acts Content: ' . $model->act_id;
$this->params['breadcrumbs'][] = ['label' => 'Ico Acts Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->act_id, 'url' => ['view', 'id' => $model->act_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ico-acts-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
