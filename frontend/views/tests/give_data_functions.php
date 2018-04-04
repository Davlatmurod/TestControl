<?php
use frontend\models\Science;
use frontend\models\Tests;
use backend\models\TestEvents;
use backend\models\Actions;
?>
<?php
/*give equal to action_id event_id - th element*/
function get_test_event($event_id,$action_id)
{
    $event_id--;

    /*give equal to action_id min test_events.id*/
    $event_min_id=TestEvents::find()->where("action_id=".$action_id)->min("id");

    /*event_id will eqaul to we need test_events_id*/
    $event_id=$event_id+$event_min_id;

    /*we need data*/
    $data=TestEvents::find()->where("id=".$event_id)->one();
    return $data;
}
function give_test($event_id,$action_id)
{
    $data_event=get_test_event($event_id,$action_id);
    $test_data=Tests::find()->where("id=".$data_event->test_id)->one();
    return $test_data;
}
?>
