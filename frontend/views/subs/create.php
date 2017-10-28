<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IcoSubs */

$this->title = 'Create Ico Subs';
$this->params['breadcrumbs'][] = ['label' => 'Ico Subs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-subs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
