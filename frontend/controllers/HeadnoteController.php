<?php

namespace frontend\controllers;

use Yii;
use common\models\IcoHeadnote;
use common\models\IcoLog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HeadnoteController implements the CRUD actions for IcoHeadnote model.
 */
class HeadnoteController extends Controller
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
     * Lists all IcoHeadnote models.
     * @return mixed
     */
    public function actionIndex()
    {
          $this->layout='dashboard';
        $dataProvider = new ActiveDataProvider([
            'query' => IcoHeadnote::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IcoHeadnote model.
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
     * Creates a new IcoHeadnote model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $this->layout='dashboard';
        $caseid=Yii::$app->request->get('id');
        $model = new IcoHeadnote(); 
             $model->case_id=$caseid;
              $model->content_txt="";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        $IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Headnote ";
             $IcoLog->tbl_pid=$model->id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="Insert";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
            return $this->redirect(['cases/update', 'id' => $model->case_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IcoHeadnote model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
              $this->layout='dashboard';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Headnote ";
             $IcoLog->tbl_pid=$id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="update";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
            return $this->redirect(['cases/update', 'id' => $model->case_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IcoHeadnote model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->findModel($id)->delete();
     $IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Headnote ";
             $IcoLog->tbl_pid=$model->case_id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="delete";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
        return $this->redirect(['cases/update', 'id' => $model->case_id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the IcoHeadnote model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IcoHeadnote the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IcoHeadnote::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
