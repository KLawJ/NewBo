<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IcoStaff */

$this->title = 'Create Ico Staff';
$this->params['breadcrumbs'][] = ['label' => 'Ico Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-staff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
