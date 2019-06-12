<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wistlist */

$this->title = 'Create Wistlist';
$this->params['breadcrumbs'][] = ['label' => 'Wistlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wistlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
