<?php

namespace frontend\controllers;

use Yii;
use common\models\IcoSubcontents;
use frontend\models\Subcontents;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubcontentsController implements the CRUD actions for IcoSubcontents model.
 */
class SubcontentsController extends Controller
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
     * Lists all IcoSubcontents models.
     * @return mixed
     */
    public function actionIndex()
    {

        $this->layout='dashboard';
        $searchModel = new Subcontents();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IcoSubcontents model.
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
     * Creates a new IcoSubcontents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $x = Yii::$app->request->post('IcoSubcontents');



        $this->layout='dashboard';
        $model = new IcoSubcontents();
        $model->subject_id=$x['hsubject_id'];
        $model->subs_id=$x['hsection_id'];
         $model->contents=$x['hvalue_1'];
        if ($model->load(Yii::$app->request->post())) {
             
        
            
              if($x['value_2']=="" && $x['value_3']=="" )
            {
              $findcount=IcoSubcontents::find()->where(['and',['contents'=>$x['value_1']],['subject_id'=>$x['hsubject_id']],['subs_id'=>$x['hsection_id']]])->count();
              if (!$findcount){
              $model->own_id=0;
               $model->subject_id=$x['hsubject_id'];
        $model->subs_id=$x['hsection_id'];
           $model->contents=$x['value_1'];
            $model->save(false);
            $last_id= $model->id;
            }
            else
            {
                echo "Duplicate found in Value 1"; exit();
            }
              }
            if($x['value_2'] && $x['value_3']=="")
            {
                 $findcount=IcoSubcontents::find()->where(['id'=>$x['hvalue_2']])->count();
              if (!$findcount){
                  $model = new IcoSubcontents();
                  $model->own_id=$x['hvalue_1'];
                  
                  $model->contents=$x['value_2'];
            $model->save(false);
            
            
            }
            else
            {
                echo "Duplicate found in Value 2"; exit();
            }
            }
            if($x['value_3'])
            {
                   $findcount=IcoSubcontents::find()->where(['id'=>$x['hvalue_3']])->count();
              if (!$findcount){
                  $model = new IcoSubcontents();
                  $model->own_id=$x['hvalue_2'];
                 
                  $model->contents=$x['value_3'];
            $model->save(false);
            
             }
            else
            {
                echo "Duplicate found in Value 3"; exit();
            }
            }
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IcoSubcontents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout='dashboard';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IcoSubcontents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IcoSubcontents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IcoSubcontents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IcoSubcontents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
