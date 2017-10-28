<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblCitation */

$this->title = 'Create Tbl Citation';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Citations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-citation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
