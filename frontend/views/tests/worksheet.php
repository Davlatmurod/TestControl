<?php
use yii\helpers\Html;
use frontend\models\Science;
use frontend\models\Tests;
use backend\models\TestEvents;
use backend\models\Actions;

include "give_data_functions.php";
?>

<?php
$this->title = 'Test ishlash jarayoni';
$this->params['breadcrumbs'][] = $this->title;

/*$active_action_id - now come TestController active_action_id*/
$temp=TestEvents::find()->where("action_id=".$active_action_id)->all();

/*User selected of selected test numbers*/
$cnt_all_active_tests=count($temp);
echo "<br>";

/*For used massive instalizating if i-th element equal to 1 this is test already solved else not solved*/
$i_th_test=1;
$now_test=0;
$button_status = array();
foreach ($temp as $item)
{
    if($item->selected_answer!="") $button_status[$i_th_test]=1;
    else
    {
        $button_status[$i_th_test]=0;
        if($now_test==0) $now_test=$i_th_test;
    }
    $i_th_test++;
}
$button_status[$now_test]=-1;

/*now showing test value*/
$value=give_test($now_test,$active_action_id);

/*For answers combinations*/
$combinate_answer=get_test_event($now_test,$active_action_id)->showed_answers;
$a_answer="answer_".$combinate_answer[0];
$b_answer="answer_".$combinate_answer[1];
$c_answer="answer_".$combinate_answer[2];
$d_answer="answer_".$combinate_answer[3];
$e_answer="answer_".$combinate_answer[4];

?>

<html>
<head>
    <script>
        /*This is array save data about status buttons*/
        var buttons_status = new Array();

        /*For get numbers of now events*/
        var cnt_tests = <?php echo $cnt_all_active_tests?>;
        /*For get now action id table in actions*/
        var active_action_id = <?php echo $active_action_id?>;

        /*this is  for index will be start from 1 to buttons_status_len*/
        buttons_status.push(-1);

        <?php foreach ($button_status as $item):?>
            buttons_status.push(<?php echo $item;?>);
        <?php endforeach;?>

        var all_tests_solved = false;
        function color(id) {
            document.getElementById("btn" + id).style.backgroundColor = "green";
            document.getElementById("btn" + id).disabled = true;
        }
        /*For submit buttons enabled*/
        function un_disabled() {
            var solve_btn=document.getElementById("submit_btn").disabled=false;
        }

        /*This is function all testconrol buttons_status give color consider status about buttons_status*/
        function give_color_buttons() {

            for(var i = 1; i <= cnt_tests; i ++)
            {
                if(buttons_status[i] == -1)
                    document.getElementById("btn" + i).className="btn btn-default";
                else if(buttons_status[i] == 1)
                    document.getElementById("btn" + i).className="btn btn-success";
                else if(buttons_status[i] == 0)
                    document.getElementById("btn" + i).className="btn btn-primary";
            }
        }
        function load_th(id) {

            if(id>cnt_tests)
            {
                /*check for all test solved if have unsolved problem show this is problem*/
                for(var i_th=1;i_th<=cnt_tests;i_th++)
                {
                    if(document.getElementById("btn"+i_th).disabled==false)
                    {
                        load_th(i_th);
                        return;
                    }
                }
                location.replace("calculation?id="+active_action_id);
                return;
            }
            if(document.getElementById("btn"+id).disabled==true)
            {
                load_th(id+1);
                return;
            }

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("demo").innerHTML = xhttp.responseText;
                    for(var i=1;i<=cnt_tests;i++)
                    {
                        if(buttons_status[i]==-1) buttons_status[i]=0;
                    }
                    buttons_status[id]=-1;
                    give_color_buttons();
                }
            }
            xhttp.open("post", "viewtest?id="+id+"&active_action_id="+active_action_id, true);
            xhttp.send();
        }
        function update(test_id) {
            /*for get user selected_answer*/
            var t = document.getElementsByName("answer");
            var selected_answer;
            if(t[0].checked) selected_answer = "a";
            if(t[1].checked) selected_answer = "c";
            if(t[2].checked) selected_answer = "b";
            if(t[3].checked) selected_answer = "d";
            if(t[4].checked) selected_answer = "e";

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    color(test_id);
                    buttons_status[test_id]=1;
                    load_th(test_id+1);
                }
            }
            xhttp.open("post", "eventupdate?id="+test_id+"&user_selected_answer="+selected_answer+"&action_id="+active_action_id, true);
            xhttp.send();
        }

    </script>
</head>
<body>

    <div class="container">
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
            <button disabled id="submit_btn" class="btn btn-success" onclick="update(<?php echo $now_test;?>)">Javobni tanlash</button>
        </div>
        <hr>
        <?php for ($i=1;$i<=$cnt_all_active_tests;$i++):?>
            <?php if($button_status[$i]==0):?>
                <button id="btn<?php echo $i;?>" onclick="load_th(<?php echo $i;?>, <?php echo $active_action_id;?>, <?php echo $cnt_all_active_tests;?>)" class="btn btn-primary"><?php echo $i?></button>
            <?php endif;?>

            <?php if($button_status[$i]==1):?>
                <button id="btn<?php echo $i;?>" onclick="load_th(<?php echo $i;?>, <?php echo $active_action_id;?>, <?php echo $cnt_all_active_tests;?>)" class="btn btn-success" disabled><?php echo $i?></button>
            <?php endif;?>

            <?php if($button_status[$i]==-1):?>
                <button id="btn<?php echo $i;?>" onclick="load_th(<?php echo $i;?>, <?php echo $active_action_id;?>, <?php echo $cnt_all_active_tests;?>)" class="btn btn-default"><?php echo $i?></button>
            <?php endif;?>
            <?php endfor;?>
        <br>
    </div>
</body>
</html>
