<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Test Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-events-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Test Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'test_id',
            'showed_answers',
            'action_id',
            'selected_answer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
