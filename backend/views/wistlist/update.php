<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wistlist */

$this->title = 'Update Wistlist: ' . $model->wis_id;
$this->params['breadcrumbs'][] = ['label' => 'Wistlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->wis_id, 'url' => ['view', 'id' => $model->wis_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wistlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
