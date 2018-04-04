<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TestEvents */

$this->title = 'Update Test Events: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Test Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-events-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
