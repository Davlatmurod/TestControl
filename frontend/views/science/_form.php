<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Science */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="science-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'science')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
