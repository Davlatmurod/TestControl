<?php include "give_data_functions.php";?>

<?php
use backend\models\TestEvents;
use backend\models\Actions;
print_r($_GET);
echo "<br>";
print_r($_POST);
echo "<br>";
$database_event_id=get_test_event($event_id,$active_action_id)->id;

/*All eqaul to now action_id tests solved so we are update all selected answers*/
TestEvents::updateAll(["selected_answer"=>$selected_answer],["id"=>$database_event_id]);
$cnt=TestEvents::find()->where(["action_id"=>$active_action_id,"selected_answer"=>""])->count();
if($cnt==0)
{
    Actions::updateAll(["status"=>1],["id"=>$active_action_id]);
}
?>