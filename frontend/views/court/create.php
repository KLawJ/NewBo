<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblCourts */

$this->title = 'Create Tbl Courts';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Courts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-courts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
