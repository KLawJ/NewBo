<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\IcoActsContent */

$this->title = $model->act_id;
$this->params['breadcrumbs'][] = ['label' => 'Ico Acts Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-acts-content-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->act_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->act_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'act_id',
            'act_content',
        ],
    ]) ?>

</div>
