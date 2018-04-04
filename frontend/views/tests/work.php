<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 23.03.2018
 * Time: 10:34
 */
use yii\helpers\Html;
use frontend\models\Science;

$this->title = 'Test ishlashni boshlash';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="containe">
    <form class="form-control" action="worksheet" method="post">
        <select name="fan" class="center-block">
            <?php foreach ($fanlar as $rows):?>
                <option><?php echo $rows->science; ?></option>
            <?php endforeach;?>
        </select>
        <br>
        <input value="5" class="center-block" name="cnt_test" type="number" min="5" placeholder="Testlar soni"  required>
        <button class="center-block btn btn-success ">Boshlash</button>
    </form>
</div>
