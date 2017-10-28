<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblCasePrefix */

$this->title = 'CreateCase Prefix';
$this->params['breadcrumbs'][] = ['label' => 'Case Prefixes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-case-prefix-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
