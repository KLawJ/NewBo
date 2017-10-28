<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IcoActs */

$this->title = 'Create Ico Acts';
$this->params['breadcrumbs'][] = ['label' => 'Ico Acts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-acts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
