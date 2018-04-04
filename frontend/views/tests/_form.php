<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'science_id')->textInput() ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_c')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_d')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_e')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'right_answer')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
