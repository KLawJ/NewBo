<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\IcoStaff */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ico Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-staff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'username',
            'password',
            'fist_name',
            'last_name',
            'email_id:email',
            'role',
            'privileages:ntext',
            'status',
            'created_dt',
            'created_by',
            'updated_dt',
            'updated_by',
            'enabled',
            'validity_date',
            'lastlogin',
            'auth_key',
        ],
    ]) ?>

</div>
