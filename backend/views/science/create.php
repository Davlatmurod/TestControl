<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Science */

$this->title = 'Create Science';
$this->params['breadcrumbs'][] = ['label' => 'Sciences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="science-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
