<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IcoSubcontents */

$this->title = 'Create Section';
$this->params['breadcrumbs'][] = ['label' => 'Section', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-subcontents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
