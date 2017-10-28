<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IcoActsIndex */

$this->title = 'Create Ico Acts Index';
$this->params['breadcrumbs'][] = ['label' => 'Ico Acts Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-acts-index-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
