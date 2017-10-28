<?php

namespace frontend\controllers;

use Yii;
use yii\jui\AutoComplete;
use common\models\IcoLog;
use yii\data\ActiveDataProvider;
use yii\web\JsExpression;
use common\models\IcoHeadnote;
use common\models\IcoHeadnoteSection;
use frontend\models\HeadnoteSection;
use common\models\IcoSubcontents;
use common\models\IcoSubject;
use common\models\IcoSubs;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HSectController implements the CRUD actions for IcoHeadnoteSection model.
 */
class HsectController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all IcoHeadnoteSection models.
     * @return mixed
     */
    public function actionIndex()
    {
   $request = Yii::$app->request->get('id');
      $case_id = Yii::$app->request->get('cid');
       $this->layout='dashboard';
   
     
        
         //$searchModel = new HeadnoteSection();
       $dataProvider = new ActiveDataProvider([
    'query' => IcoHeadnoteSection::find()
        ->where(['headnote_id'=>$request]),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
        return $this->render('index', [
           // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,'hd_id'=>$request,'case_id'=> $case_id 
        ]);
    }

    /**
     * Displays a single IcoHeadnoteSection model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
   
         $this->layout='dashboard';
         return $this->render('view', [
             'model' => $this->findModel($id),
         ]);
    }

    /**
     * Creates a new IcoHeadnoteSection model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout='dashboard';
     $request = Yii::$app->request->get('id');
    
       $x = Yii::$app->request->post('IcoHeadnoteSection');
        $model = new IcoHeadnoteSection();
print_r($x); 
    
    $model->headnote_id=$x['headnote_id'];
        $model->subject_id=$x['hsubject_id'];
        $model->section_id=$x['hsection_id'];
        $model->value_1=$x['hvalue_1'];
    if ($x['hvalue_2']!="0" || $x['hvalue_2']!=""){
    $model->value_2=$x['hvalue_2'];
    }
    else
    {
    $model->value_2="0";
    }
     if ($x['hvalue_3']!="0" || $x['hvalue_3']!=""){
    $model->value_3=$x['hvalue_3'];
     }
    else
    {
    $model->value_3="0";
    }
   
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
         $model->headnote_id=$x['headnote_id'];
       
        $model->subject_id=$x['hsubject_id'];
        $model->section_id=$x['hsection_id'];
        $model->value_1=$x['hvalue_1'];
       if ($x['hvalue_2']!="0" || $x['hvalue_2']!=""){
    $model->value_2=$x['hvalue_2'];
    }
    else
    {
    $model->value_2="0";
    }
     if ($x['hvalue_3']!="0" || $x['hvalue_3']!=""){
    $model->value_3=$x['hvalue_3'];
     }
    else
    {
    $model->value_3="0";
    }
    $model->save(false);
        $IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Headnote Section ";
             $IcoLog->tbl_pid=$model->headnote_id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="insert";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
            
        return $this->redirect(['index','id'=>$x['headnote_id']]);
        
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IcoHeadnoteSection model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
    $request = Yii::$app->request->post('hd_id');
       $x = Yii::$app->request->post('IcoHeadnoteSection');
        $this->layout='dashboard';
        $model = $this->findModel($id);

   
    //     $model->subject_id=$x['hsubject_id'];
    //     $model->section_id=$x['hsection_id'];
    //     $model->value_1=$x['value_1'];
    // $model->value_2=$x['value_2'];
    // $model->value_3=$x['value_3'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
    $model->headnote_id=$x['headnote_id'];
        $model->subject_id=$x['hsubject_id'];
        $model->section_id=$x['hsection_id'];
        $model->value_1=$x['hvalue_1'];
    $model->value_2=$x['hvalue_2'];
    $model->value_3=$x['hvalue_3'];
     $model->save(false);
$IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Headnote Section ";
             $IcoLog->tbl_pid=$model->headnote_id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="update";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
            return $this->redirect(['index','id'=>$x['headnote_id']]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IcoHeadnoteSection model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      $model = $this->findModel($id);
        $this->findModel($id)->delete();
$IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Headnote Section ";
             $IcoLog->tbl_pid=$id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="delete";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
        return $this->redirect(['index','id'=>$model->headnote_id]);
    }

    /**
     * Finds the IcoHeadnoteSection model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IcoHeadnoteSection the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IcoHeadnoteSection::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
  public function actionSubject_autocomplete($term) {
     
    


     $data = [];

   

     $IcoSubject = IcoSubject::find()
        ->where(['like','subject', $term])
       ->select(['id as value', 'subject as label'])
       ->asArray()
       ->all();
           
           
   
   

    return  json_encode( $IcoSubject );


}


public function actionSection_autocomplete($term) {
     
    


     $data = [];

   

     $IcoSubs = IcoSubs::find()
        ->where(['like','name', $term])
       ->select(['id as value', 'name as label'])
       ->asArray()
       ->all();
           
           
   
   

    return  json_encode( $IcoSubs );


}
       /**
     * Updates an existing IcoHeadnoteSection model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionAutocomplete($term) {
     
       $subj=Yii::$app->request->get("subj");
       $sub=Yii::$app->request->get("sub");
        $own_id=Yii::$app->request->get("ownd");


     $data = [];

 

     $IcoSubcontents = IcoSubcontents::find()
        ->where(['and',['like','contents', $term],['subject_id' => $subj],['subs_id'=>$sub],['own_id'=>$own_id]])
       ->select(['id as value', 'contents as label','id as id'])
       ->asArray()
       ->all();
          
   

    return  json_encode( $IcoSubcontents );


}



public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
}
}
