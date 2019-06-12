<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderDetail */

$this->title = 'Update Order Detail: ' . $model->detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->detail_id, 'url' => ['view', 'id' => $model->detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
