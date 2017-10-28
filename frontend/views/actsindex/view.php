<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\IcoActsIndex */

$this->title = $model->a_id;
$this->params['breadcrumbs'][] = ['label' => 'Ico Acts Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-acts-index-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->a_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->a_id], [
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
            'a_id',
            'act_id',
            'chapter',
            'section',
            'updatedon',
            'enabled',
        ],
    ]) ?>

</div>
