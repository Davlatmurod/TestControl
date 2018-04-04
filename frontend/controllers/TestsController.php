<?php

namespace frontend\controllers;

use backend\models\TestEvents;
use Yii;
use frontend\models\Tests;
use frontend\models\TestsSearch;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Science;
use backend\models\Actions;

/**
 * TestsController implements the CRUD actions for Tests model.
 */
class TestsController extends Controller
{

    /*For get rand test id*/
    public function give_rand_number($cnt_test)
    {
        /**Save for rand test's id*/
        $rand_test_id=array();

        /*MX_RAND numbers test of all have table tests */
        $MX_RAND=Tests::find()->count();

        for($i=1;$i<=$cnt_test;$i++)
        {
            $rand_number=rand(0,$MX_RAND);
            array_push($rand_test_id,$rand_number);
        }
        return $rand_test_id;
    }
    /*For get combination test's answers*/
    public function give_rand_combination()
    {
        /*User's can see test's answers*/
        $answer_combinate="abcde";
        $combations_cnt=rand(0,120);
        for($i=1;$i<=$combations_cnt;$i++)
        {
            $ind1=rand(0,4);
            $ind2=rand(0,4);
            $temp=$answer_combinate[$ind1];
            $answer_combinate[$ind1]=$answer_combinate[$ind2];
            $answer_combinate[$ind2]=$temp;
        }
        return $answer_combinate;
    }
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access'=>[
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'=>true,
                        'roles'=>['@'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tests models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tests model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tests model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tests();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tests model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tests model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tests model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tests the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tests::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionWorksheet()
    {
        $cnt_tests=$_POST["cnt_test"];
//        print_r($_GET);
//        echo "<br>";
//        echo "<br>";
//        print_r($_POST);
        /*now action save to action tabel*/
        $model=new Actions();
        $model->user_id=Yii::$app->user->id;
        $model->status=0;
        $model->date_time=date('d-m-Y');
        $model->save();

        /*Get now insertrd action.id*/
        $active_action_id=Actions::find()->max("id");
        /*active_test_id -> now rand tests id*/
        $active_test_id=$this->give_rand_number($cnt_tests);
        foreach ($active_test_id as $item)
        {
            $model=new TestEvents();
            $model->test_id=$item;
            $model->showed_answers=$this->give_rand_combination();
            $model->action_id=$active_action_id;
            $model->save();
        }

        return $this->render("worksheet",[
            "active_action_id"=>$active_action_id,
        ]);

    }

    public function actionViewtest($id,$active_action_id)
    {
        return $this->renderAjax('viewtest', [
            "event_id"=>$id,
            "active_action_id"=>$active_action_id,
        ]);
    }
    public function actionWork()
    {
        $fanlar=Science::find()->all();
        return $this->render("work",["fanlar"=>$fanlar]);
    }
    public function actionEventupdate($id,$user_selected_answer,$action_id)
    {
        echo $id."<br>".$user_selected_answer."<br>".$action_id."<br>";
        return $this->renderAjax("eventupdate",[
            "event_id"=>$id,
            "selected_answer"=>$user_selected_answer,
            "active_action_id"=>$action_id,
        ]);
    }
    public function actionCalculation($id)
    {
        return $this->render("calculation",[
            "active_action_id"=>$id,
        ]);
    }
    public function actionOldtest($id)
    {
        $unsolved_cnt=TestEvents::find()->where(["action_id"=>$id ,"selected_answer" => ""])->count();
        if($unsolved_cnt==0) {
            return $this->render("calculation", [
                "active_action_id" => $id,
            ]);
        }
        else {
            return $this->render("worksheet", [
                "active_action_id" => $id,
            ]);
        }
    }
}
