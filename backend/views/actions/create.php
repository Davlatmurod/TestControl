<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Actions */

$this->title = 'Create Actions';
$this->params['breadcrumbs'][] = ['label' => 'Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
