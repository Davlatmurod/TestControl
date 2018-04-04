<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TestsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tests-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'science_id') ?>

    <?= $form->field($model, 'question') ?>

    <?= $form->field($model, 'answer_a') ?>

    <?= $form->field($model, 'answer_b') ?>

    <?php // echo $form->field($model, 'answer_c') ?>

    <?php // echo $form->field($model, 'answer_d') ?>

    <?php // echo $form->field($model, 'answer_e') ?>

    <?php // echo $form->field($model, 'right_answer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
