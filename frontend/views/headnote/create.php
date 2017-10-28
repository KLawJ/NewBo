<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IcoHeadnote */
$case_id=$_GET['id'];
$this->title = 'Create Ico Headnote';
$this->params['breadcrumbs'][] = ['label' => 'Cases', 'url' => ['cases/update', 'id' => $model->case_id]];
$this->params['breadcrumbs'][] = ['label' => 'Headnote'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-headnote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'case_id'=>$case_id,
    ]) ?>

</div>
