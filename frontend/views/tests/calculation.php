<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\models\TestEvents;
use frontend\models\Tests;

function for_echo_answer_image($now_answer , $selected_answer , $right_answer)
{
    /*$selected_answer -> database format*/
    /*now_answer -> database format*/
    if($now_answer==$selected_answer || $now_answer==$right_answer)
    {
        if($selected_answer==$right_answer)
            return Html::img("@web/images/your_answer_right.png" , ["width" => 25]);
        else if($now_answer==$right_answer)
            return Html::img("@web/images/right_answer.png" , ["width" => 25]);
        return Html::img("@web/images/your_answer_wrong.png" , ["width" => 25]);
    }
    return "";
}

function convert_database_format($selected , $showed)
{
    /*
     * Get for user selected answer;
     * if user selected answer c
     *
     * test_events table's showed answer wrote ebdac
     * user saw answer a in database's table test's column answer_e
     * user saw answer b in database's table test's column answer_b
     * user saw answer c in database's table test's column answer_d
     * user saw answer d in database's table test's column answer_a
     * user saw answer e in database's table test's column answer_c
     *
     * for calculation solved tests user selected answer will same format table tests columns
     * so user selected c answer user saw format ebdac so user saw answer table tests answer_d
     *
     * for calculation char code c subtract char code a (always will a because initial a)
     * charcode(c)-charcode(a)=2 so indexs from 0 to 4 user selected abswer index 2
     *
     * 01234
     * ebdac
     *
     * this sample index 2 equal to d
     * user selected answer c but this answer database wrote answer d or contain user selected answer c answer_d column
     * */
    $index=ord($selected[0])-ord('a');
    $answer_database_format=$showed[$index];
    return $answer_database_format;
}
?>

<?php
$solved_tests=TestEvents::find()->where("action_id=".$active_action_id)->all();
//echo "<pre>";
//print_r($solved_tests);
//echo "</pre>";

$cnt_problems=count($solved_tests);

$cnt_right_anwers=0;
foreach ($solved_tests as $item)
{
    $user_selected_answer=$item->selected_answer;
    $user_showed_answers=$item->showed_answers;
    $test=Tests::find()->where("id=".$item->test_id)->one();
    $right_answer=$test->right_answer;
//    echo "user selected---------------------------------->".$user_selected_answer."<br>";
//    echo "user showed---------------------------------->".$user_showed_answers."<br>";;
//    echo "right answer---------------------------------->".$right_answer."<br>";

    $user_selected_answer_database_format=convert_database_format($user_selected_answer , $user_showed_answers);
    if($user_selected_answer_database_format == $right_answer) $cnt_right_anwers++;
}

?>
<html>
<head>
</head>
<body>
    <div>
        <table class="table table-bordered">
            <tr>
                <th>Holat</th>
                <th>Natija</th>
            </tr>
            <tr>
                <td>To'g'ri javoblar soni</td>
                <td><button class="btn btn-success"><?php echo $cnt_right_anwers;?></button></td>
            </tr>
            <tr>
                <td>Noto'g'ri javoblar soni javoblar soni </td>
                <td><button class="btn btn-danger"><?php echo ($cnt_problems - $cnt_right_anwers);?></button></td>
            </tr>
            <tr>
                <td>Jami</td>
                <td><button class="btn btn-primary"><?php echo $cnt_problems;?></button></td>
            </tr>
        </table>
    </div>
    <div>
        <hr>
        <h1 class="text-center">Test bo'yicha natijalar</h1>
        <?php
        /*For answers combinations*/

        foreach ($solved_tests as $item):?>
            <?php
            $test=Tests::find()->where("id=".$item->test_id)->one();

            $user_showed_answers=$item->showed_answers;
            $user_selected_answer=$item->selected_answer;

            /*Not same format user showed answers with saved databased answers.
            So we output user showed answers.
            */
            $a_answer="answer_".$user_showed_answers[0];
            $b_answer="answer_".$user_showed_answers[1];
            $c_answer="answer_".$user_showed_answers[2];
            $d_answer="answer_".$user_showed_answers[3];
            $e_answer="answer_".$user_showed_answers[4];
            $right_answer=$test->right_answer;

            /*This is format user showed answers*/
            /*And with images answer about correct or incorrect */
            /*IF X user selected answer incorrect answer*/
            /*IF one mark correct answer*/
            /*IF two mark user selected answer correct*/

            $user_selected_answer_database_format = convert_database_format($user_selected_answer , $user_showed_answers);
            ?>
            <table class='table table-bordered'>
                <tr>
                    <th>
                        <?php if($right_answer == $user_selected_answer_database_format)
                            echo Html::img("@web/images/you_solve.png" , ["width" => 25]);?>
                    </th>
                    <th> <?php echo $test->id.". ".$test->question;?></th>
                </tr>

                <tr>
                    <td width='10px'><?php echo for_echo_answer_image($a_answer[7] , $user_selected_answer_database_format , $right_answer)?></td>
                    <td>A.<?php echo $test->$a_answer;?> </td>
                </tr>

                <tr>
                    <td width='10px'><?php echo for_echo_answer_image($b_answer[7] , $user_selected_answer_database_format , $right_answer)?></td>
                    <td>B.<?php echo $test->$b_answer;?> </td>
                </tr>

                <tr>
                    <td width='10px'><?php echo for_echo_answer_image($c_answer[7] , $user_selected_answer_database_format , $right_answer)?></td>
                    <td>C.<?php echo $test->$c_answer;?> </td>
                </tr>

                <tr>
                    <td width='10px'><?php echo for_echo_answer_image($d_answer[7] , $user_selected_answer_database_format , $right_answer)?></td>
                    <td>D.<?php echo $test->$d_answer;?> </td>
                </tr>

                <tr>
                    <td width='10px'><?php echo for_echo_answer_image($e_answer[7] , $user_selected_answer_database_format , $right_answer)?></td>
                    <td>E.<?php echo $test->$e_answer;?> </td>
                </tr>

            </table>
        <?php endforeach;?>

    </div>
</body>
</html>



