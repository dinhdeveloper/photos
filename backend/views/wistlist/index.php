<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WistlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wistlists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wistlist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Wistlist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'wis_id',
            'user_id',
            'pro_id',
            'date_wistlist',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
