<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusDetail */

$this->title = 'Update Status Detail: ' . $model->status_id;
$this->params['breadcrumbs'][] = ['label' => 'Status Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->status_id, 'url' => ['view', 'id' => $model->status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="status-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
