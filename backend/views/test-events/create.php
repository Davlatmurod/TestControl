<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TestEvents */

$this->title = 'Create Test Events';
$this->params['breadcrumbs'][] = ['label' => 'Test Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-events-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
