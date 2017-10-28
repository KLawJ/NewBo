<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IcoSubject */

$this->title = 'Create Ico Subject';
$this->params['breadcrumbs'][] = ['label' => 'Ico Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-subject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
