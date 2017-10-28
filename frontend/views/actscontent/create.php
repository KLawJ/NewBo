<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IcoActsContent */

$this->title = 'Create Ico Acts Content';
$this->params['breadcrumbs'][] = ['label' => 'Ico Acts Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-acts-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
