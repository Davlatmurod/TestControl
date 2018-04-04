<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TestEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'test_id')->textInput() ?>

    <?= $form->field($model, 'showed_answers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'action_id')->textInput() ?>

    <?= $form->field($model, 'selected_answer')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
