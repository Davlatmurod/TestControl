<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Science;

/* @var $this yii\web\View */
/* @var $model backend\models\Tests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tests-form">

    <?php $form = ActiveForm::begin();
    ///print_r(Science::find()->all()->id);
    ?>

    <?= $form->field($model, 'science_id')->dropDownList(
            ArrayHelper::map(Science::find()->all(),'id','science'),
            ["prompt"=>"Fanni tanlang"]
    ) ?>


    <?= $form->field($model, 'question')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_c')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_d')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_e')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'right_answer')->dropDownList(["a"=>"a", "b"=>"b", "c"=>"c", "d"=>"d", "e"=>"e",],["prompt"=>"To'g'ri javobni tanlang"]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
