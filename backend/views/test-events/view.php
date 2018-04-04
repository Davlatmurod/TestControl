<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TestEvents */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-events-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'test_id',
            'showed_answers',
            'action_id',
            'selected_answer',
        ],
    ]) ?>

</div>
