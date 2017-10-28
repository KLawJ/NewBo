<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IcoStaff */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ico Staff';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ico-staff-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ico Staff', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'password',
            'fist_name',
            'last_name',
            // 'email_id:email',
            // 'role',
            // 'privileages:ntext',
            // 'status',
            // 'created_dt',
            // 'created_by',
            // 'updated_dt',
            // 'updated_by',
            // 'enabled',
            // 'validity_date',
            // 'lastlogin',
            // 'auth_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
