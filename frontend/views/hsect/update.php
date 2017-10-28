<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IcoHeadnoteSection */

$this->title = 'Update  Headnote Section: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => ' Headnote Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ico-headnote-section-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
