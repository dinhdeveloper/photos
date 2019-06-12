<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusDetail */

$this->title = 'Create Status Detail';
$this->params['breadcrumbs'][] = ['label' => 'Status Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
