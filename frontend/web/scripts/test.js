/**
 * Created by LENOVO on 01.04.2018.
 */
var all_tests_solved=false;
function color(id) {
    document.getElementById("btn"+id).style.backgroundColor="green";
    document.getElementById("btn"+id).disabled=true;
}
function color_now(id) {
    document.getElementById("btn"+id).style.backgroundColor="green";
}
function load_th(id , active_action_id , cnt_tests) {
    alert(id+" "+active_action_id+"   "+cnt_tests);
    if(id>cnt_tests)
    {
        /*check for all test solved if have unsolved problem show this is problem*/
        for(var i_th=1;i_th<=cnt_tests;i_th++)
        {
            if(document.getElementById("btn"+i_th).disabled==false)
            {
                load_th(i_th , active_action_id , cnt_tests);
                return;
            }
        }
        location.replace("calculation?id="+active_action_id);
        return;
    }
    if(document.getElementById("btn"+id).disabled==true)
    {
        load_th(id+1 , active_action_id , cnt_tests);
        return;
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("demo").innerHTML = xhttp.responseText;
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

    /*For get now action id table in actions*/
    var active_action_id = "<?php echo $active_action_id;?>";

    var cnt_tests = "<?php echo $cnt_all_active_tests;?>";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //document.getElementById("demo").innerHTML = "Succesfull";
            color(test_id);
            load_th(test_id+1 , active_action_id , cnt_tests);
        }
    }
    xhttp.open("post", "eventupdate?id="+id+"&user_selected_answer="+selected_answer+"&action_id="+active_action_id, true);
    xhttp.send();
}
function un_disabled() {
    var solve_btn=document.getElementById("btn").disabled=false;
}