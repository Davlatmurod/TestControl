<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
$this->render("about",["id"=>"salom"]);
?>
<?php
for($i=0;$i<=10;$i++)
{
    echo rand(1,2);
    echo " - ";
    echo rand(1,2);
    echo "<br>";
}


?>
<?php
$myJSON = '{ "name":"John", "age":30, "city":"New York" }';

echo "myFunc(".$myJSON.");";
?>

<script src="contact.php"></script>
<script>
    function proba() {
        alert("sasaaaaaaaaaaaaaaaaaaaa");
        var myObj = new Array();
        myObj.push(1);
        myObj.push(2);
        myObj.push(3);
        var myJSON = JSON.stringify(myObj);
        window.location = "about?x=" + myJSON;
    }
    function phptoscript() {
        alert(myObj);
        alert("sasas");
    }
</script>
<script>
    function myFunc(myObj) {
        alert(myObj.name);
        document.getElementById("demo").innerHTML = myObj.name;
    }
</script>


<div class="site-contact">
    <a href="..\tests\viewtest?id=1&ac=1">salom</a>
    <br>
    <button onclick="myFunc()">Proba</button>
    <br>
    <button onclick="phptoscript()">converter</button>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
