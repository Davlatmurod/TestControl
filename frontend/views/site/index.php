<?php
use backend\models\Actions;
use yii\helpers\Html;

$this->title = 'My Yii Application';

if(!Yii::$app->user->isGuest)
{
    $user_id=Yii::$app->user->id;
    $unfinished_cnt=Actions::find()->where(["user_id" => $user_id , "status" => 0])->count();
    $finished_cnt=Actions::find()->where(["user_id" => $user_id , "status" => 1])->count();
}
?>
<div class="site-index">

    <?php if(!(Yii::$app->user->isGuest)):?>
        <table class="table-bordered table">
            <tr>
                <th>Holati</th>
                <th>Soni</th>
            </tr>
            <tr>
                <td>Tugallanmagan testlar soni</td>
                <td><?= Html::a($unfinished_cnt, ['stat?status=0'], '')?></td>


            </tr>
            <tr>
                <td>Tugallanmagan testlar soni</td>
                <td><?= Html::a($finished_cnt, ['stat?status=1'], '')?></td>
            </tr>
        </table>
    <?php endif;?>

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
