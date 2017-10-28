<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IcoHeadnote */

$this->title = 'Update Headnote: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cases', 'url' => ['cases/update', 'id' => $model->case_id]];
$this->params['breadcrumbs'][] = ['label' => 'Headnote'];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ico-headnote-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
