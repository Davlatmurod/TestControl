<?php
use backend\models\TestEvents;
use frontend\models\Tests;

include "give_data_functions.php";
?>

<?php
/*now showing test value get come give_data_functions.php*/
$value=give_test($event_id,$active_action_id);
$cnt_all_active_tests=count($temp);

/*For answers combinations*/
$combinate_answer=get_test_event($event_id,$active_action_id)->showed_answers;
$a_answer="answer_".$combinate_answer[0];
$b_answer="answer_".$combinate_answer[1];
$c_answer="answer_".$combinate_answer[2];
$d_answer="answer_".$combinate_answer[3];
$e_answer="answer_".$combinate_answer[4];
?>

<html>
<head>
</head>
<body>
    <div id="demo">
        <b>
            <i><?php echo $value["id"];?>.</i>
            <?php echo $value["question"];?>
        </b>
        <br>
        <i>A.</i><input type="radio" name="answer" onclick="un_disabled()"/>
        <?php echo $value[$a_answer];?>
        <br>
        <i>B.</i><input type="radio" name="answer" onclick="un_disabled()"/>
        <?php echo $value[$b_answer];?>
        <br>
        <i>C.</i><input type="radio" name="answer" onclick="un_disabled()"/>
        <?php echo $value[$c_answer];?>
        <br>
        <i>D.</i><input type="radio" name="answer" onclick="un_disabled()"/>
        <?php echo $value[$d_answer];?>
        <br>
        <i>E.</i><input type="radio" name="answer" onclick="un_disabled()"/>
        <?php echo $value[$e_answer];?>
        <hr>
        <button disabled id="submit_btn" class="btn btn-success" onclick="update(<?php echo $event_id;?>)">Javobni tanlash</button>
    </div>
</body>
</html>