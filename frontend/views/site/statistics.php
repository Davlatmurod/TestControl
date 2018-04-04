<?php
use backend\models\Actions;
use yii\helpers\Html;

$user_id=Yii::$app->user->id;
$actions=Actions::find()->where(["user_id" => $user_id , "status" => $status])->all();
?>
<div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 50px">№</th>
            <th>Holati</th>
            <th>Sanasi</th>
        </tr>
        <?php $ind=1;?>
        <?php foreach($actions as $item):?>
        <tr>
            <td><?php echo $ind++;?></td>
            <td><?php echo Html::a($item['id'], ["tests/oldtest?id=".$item['id']],'')?></td>
            <td><?php echo $item['date_time'];?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
