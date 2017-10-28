<?php

namespace frontend\controllers;

use Yii;
use mPDF;
use common\models\TblCases;
use common\widgets\Excelwriter;
use app\models\TblCases as TblCasesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use common\models\IcoJudge;
use common\models\TblJudges;
use common\models\JudgeClass;
use common\models\IcoCitation;
use common\models\IcoCaseNo;
use common\models\IcoRefCitation;
use common\models\TblCasesJudgement;
use common\models\IcoLog;

/**
 * CasesController implements the CRUD actions for TblCases model.
 */
class CasesController extends Controller
{
    /**
     * @inheritdoc
     */

public $layout=false;
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
     * Lists all TblCases models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest) {
           return $this->goBack();
       }
    Yii::$app->db->createCommand("SET @run_balqty :=null;")->execute();
        $this->layout='dashboard';
        $searchModel = new TblCasesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
}
     public function actionJudge()
    {
         $data="";
         $id=$_POST['id'];
         $case_id=$_POST['sd'];
      $jd_class=$_POST['jcl'];
       $IcoJudge_count=IcoJudge::find() ->where(['and',['case_id'=>$case_id],['judge_name'=>$id ]])        
         ->count();
         
 
         if ( $IcoJudge_count==0 && ($case_id !="" || $case_id !=0)){
         $tj=TblJudges::find() ->where(['judge_id'=>$id ])        
         ->one();
         $ij = new IcoJudge();
         $ij->case_id= $case_id;
         $ij->j_label= $jd_class;
         $ij->judge_name=$tj['judge_id'];
         $ij->save(false);
          $IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Judge";
             $IcoLog->tbl_pid=$case_id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="Insert";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
         $IcoJudge=IcoJudge::find() ->where(['judge_name'=>$tj['judge_id'] ])        
         ->one();
           $jcl=JudgeClass::find() ->where(['judge_class_id'=> $IcoJudge['j_label'] ])        
         ->one();
            $tj=TblJudges::find() ->where(['judge_id'=> $IcoJudge['judge_name'] ])        
         ->one();
        
          $data.="<li>".$jcl['judge_class']."  ".$tj['judge_name']."<a href='index.php?r=cases%2Fdelete_jd&id=".$ij->judge_id."&cid=".$case_id."' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?' data-method='post'>
<span class='glyphicon glyphicon-trash'></span>
</a></li>";
          }
        


         echo "<ul class='list-group'>".$data."</ul>";
    } 

public function actionCreatepdf(){
    
    
      if (!\Yii::$app->user->isGuest) {
            
      
		$mpdf=new mPDF('utf-8','A4','','','15','15','28','18');
                $mpdf->setAutoTopMargin = 'stretch';
                $mpdf->setAutoBottomMargin = 'stretch';
                 $mpdf->SetHeader('Indian Cases Online Fulltext Copyright 2017 © KLJ Pvt. Ltd.<br>
|  |{PAGENO}');
                 $mpdf->SetFooter('{DATE j-m-Y}| |');
                 $mpdf->WriteHTML('<br>', 2, true, false);
		  $mpdf->WriteHTML($this->renderPartial('judgement_pdf'),2, false, false);
                $mpdf->WriteHTML('<br>', 2, false, true);
        $mpdf->Output();
        exit;
        
         }
         else{
            echo "<script>alert('Login to view the pdf'); window.close();</script>";exit();
         }
		//return $this->renderPartial('mpdf');
	}
        
         public function actionSharevemail(){
           

        if (!\Yii::$app->user->isGuest) {
            
          return $this->render('s_emv');
        
         }
         else{
            echo "<script>alert('Login to share via email'); window.close();</script>";exit();
         }
           

         }
        public function actionShareemail(){
            
            
            $hdnote="";
            $jdnote="";
            $data="";
            $case_id=$_POST['cid'];
            
            $email=$_POST['s_email'];
  
             $Cases = TblCases::find()
       
              ->where(['case_id'=>$case_id ])
        
                ->all();  
            
        
 
       $i=1;
         if ($Cases)
          {
               // count number of pages:
               
           $cn1=0;
            foreach($Cases as $cS)
            {
             

 $cH = IcoHeadnote::find()
        ->where(['case_id'=> $cS->case_id])
                      
        ->all();
 
   $Courts = TblCourts::find()
        ->where(['court_id'=> $cS->court_id])
        ->one();
             
 if ($cH)
          {
                      foreach($cH as $c1)
            {
              $hdnote.=  $c1->content;
            }
          }
          else 
          {
                $hdnote="No Headnote";
          }
          
            $CasJ = TblCasesJudgement::find()
        ->where(['case_id'=> $cS->case_id])
        
          ->all();
                if ($CasJ)
          {
           $cn2=0;
            foreach($CasJ as $cJ)
            {
               $jdnote.= $cJ->judgement_content; ; 
            }
          }
          else {
                 $jdnote="No Judgement";
            }
           if (!empty($cS['citation']) && !empty($cS['strEquivalentCitation'])) {$strEqv="";$strEqv=$cS['citation']." | ".$cS['strEquivalentCitation'];} 
             else if(!empty($cS['citation'])) {$strEqv="";$strEqv=$cS['citation'];}
             else if (!empty($cS['strEquivalentCitation'])) {$strEqv="";$strEqv=$cS['strEquivalentCitation'];}
             
                    $data.= "<ul class='search_head'><li><font color=#000>$i.</font>&nbsp;<font color='#b51328'>".$cS['strPartyAName']."</font>&nbsp;<font color=black><b>vs.</b></font><font color='#b51328'> ".$cS['strPartyBName']."</font></li><li><font color=#000>".$hdnote."</font></li> <li>".$jdnote."</li> <li>  <font color=#000>".$strEqv."</font>&nbsp;&nbsp;<font color=#000><span style='margin-top:10px; '>".Yii::$app->formatter->asDate($cS['judgement_dt'])."</font>&nbsp;<font color=#000>[</font><font color='green'>".$Courts['court_name']."</font><font color=#000>]</font></span></font></li></ul></br>";
                    
            } 
          }
                $message = Yii::$app->mailer->compose();
//               if (Yii::$app->user->isGuest) {
    $message->setFrom('support@indiancases.com');
//} else {
//    $message->setFrom(Yii::$app->user->identity->email);
//}
$message->setTo($email)
        ->setSubject('Judgement')
        ->setTextBody($data)
->send();


                if($message){
                 
                
                 return $this->render('s_em');
		//return $this->renderPartial('mpdf');
	}
           
    }
	
      public function actionDelete_jd($id,$cid)
    {
         
           $this->layout='dashboard';
     
 $model=TblCases::find() ->where(['case_id'=>$cid ])        
         ->one();
$modeld = Yii::$app->db->createCommand("
    DELETE FROM tbl_ico_judge 
    WHERE judge_id = '$id' 
   
")->execute();
             $IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Judge";
             $IcoLog->tbl_pid=$cid;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="Delete";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
        //    return $this->render('update', [
        //     'model' => $model,
        // ]);
  return Yii::$app->response->redirect(Url::to(['cases/update', 'id' => $cid]));
    }


          public function actionDelete_cit($id,$cid)
    {
         
           $this->layout='dashboard';
     

$model = Yii::$app->db->createCommand("
    DELETE FROM tbl_ico_citation 
    WHERE id = '$id' 
   
")->execute();
 $model=TblCases::find() ->where(['case_id'=>$cid ])        
         ->one();
$IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Citation";
             $IcoLog->tbl_pid=$cid;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="Delete";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
        //    return $this->render('update', [
        //     'model' => $model,
        // ]);
  return Yii::$app->response->redirect(Url::to(['cases/update', 'id' => $cid]));
    }


    

    /**
     * Displays a single TblCases model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
         $this->layout=false;
     
        return $this->renderAjax('_view', [
            'model' => $this->findModel($id),
        ]);
 
    }

    /**
     * Creates a new TblCases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    Yii::$app->db->createCommand("SET @run_balqty :=null;")->execute();
     $this->layout='dashboard';
        ini_set('memory_limit', '-1');
           $x = Yii::$app->request->post('TblCases');
          $p = Yii::$app->request->post('prefix_content');
       $citation_flag="";
   
         if($x['judgement_dt']){
         
         
          
         $dateTime = \DateTime::createFromFormat("d/m/Y", $x['judgement_dt']);
         $year= \Yii::$app->formatter->asDatetime($dateTime, "php:Y");
         $date= \Yii::$app->formatter->asDatetime($dateTime, "php:Y-m-d");
        
          $SQL_Query  = "SELECT CAST(SUBSTRING(citation,10) AS SIGNED) AS X";
		  $SQL_Query .= " FROM tbl_cases WHERE SUBSTRING(citation,1,4)='".$year."'";
		  $SQL_Query .= " ORDER BY CAST(SUBSTRING(citation,10) AS SIGNED) DESC LIMIT 1;";
          $NextICO = TblCases::findBySql($SQL_Query)->one();
          $nextICO = (int)$NextICO['X']+1;
          $citation_flag= $year." ICO ".$nextICO;
        
         }
        
        $model = new TblCases();
         
        if ($model->load(Yii::$app->request->post())&&  $model->save()) {
            //$model->case_id=$x['case_id'];
            $model->court_id=$x['court_id'];
            $model->shorthead="0";
            $model->judgement_dt=$date;
            //$model->case_no=$x['case_no'];
            $model->citation=$citation_flag;
            $model->strPartyAName=$x['strPartyAName'];
            $model->strPartyBName=$x['strPartyBName'];
            $model->strPartyALawyer=$x['strPartyALawyer'];
            $model->strPartyBLawyer=$x['strPartyBLawyer'];
            $model->strParties=$x['strPartyAName']. " Vs. ".$x['strPartyBName'];
            $model->remarks=$x['remarks'];
            $model->overruled=$x['overruled'];
            $model->klj_reported=$x['klj_reported'];
            $model->PB=$x['PB'];
             $model->PB_D=$x['PB_D'];
        $model->lastupdated=date("Y-m-d H:i:s");
              $model->save(false);
            $modelj = new TblCasesJudgement();
             $modelj->case_id=$model->case_id;
             $modelj->judgement_content=$x['judgement_content'];
             $modelj->save(false);
        
         $IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases";
             $IcoLog->tbl_pid=$model->case_id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="Insert";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
            return $this->redirect(['index', 'id' => $model->case_id]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing TblCases model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
    Yii::$app->db->createCommand("SET @run_balqty :=null;")->execute();
         $this->layout='dashboard';
         $x = Yii::$app->request->post('TblCases');
        $model = $this->findModel($id);
    
 
 
    
      
        if ($model->load(Yii::$app->request->post()) &&  $model->save() ) {
   
   
        $model->case_id=$x['case_id'];
            $model->court_id=$x['court_id'];
            $model->shorthead="0";
         $myDateTime = \DateTime::createFromFormat('d/m/Y', $x['judgement_dt']);
         if($myDateTime){
         
       
          $formatteddate = $myDateTime->format('Y-m-d');
         
     

            $model->judgement_dt=$formatteddate;
         }
        
         $IcoCaseNo=IcoCaseNo::find()->where(['case_id'=>$model->case_id])->all(); 
                                           $cc="";
                                           $i=0;
                                           foreach ($IcoCaseNo as $cno) { 
                                           if ($i==0){$cc=$cno->case_no;}
                                           else {$cc.=";".$cno->case_no;}
                                           $i++; }
            $model->case_no=$cc;
            $model->citation=$x['citation'];
            $model->strPartyAName=$x['strPartyAName'];
            $model->strPartyBName=$x['strPartyBName'];
           $model->strParties=$x['strPartyAName']. " Vs. ".$x['strPartyBName'];
            $model->strPartyALawyer=$x['strPartyALawyer'];
            $model->strPartyBLawyer=$x['strPartyBLawyer'];
        
     
            $model->strreferredcitation=$x['streferredcitation'];
            $model->remarks=$x['remarks'];
            $model->overruled=$x['overruled'];
            $model->klj_reported=$x['klj_reported'];
            $model->PB=$x['PB'];
             $model->PB_D=$x['PB_D'];
        $model->lastupdated=date("Y-m-d H:i:s");
              $model->save(false);
            $modelj = TblCasesJudgement::find()->where(['case_id'=>$x['case_id']])->one();
        
             if ($modelj)
             {
              $modelj->case_id=$model->case_id;
             $modelj->judgement_content=$x['judgement_content'];
             $modelj->save(false);
             
             }
        else
        {
          $modelj = new TblCasesJudgement();
             $modelj->case_id=$model->case_id;
             $modelj->judgement_content=$x['judgement_content'];
             $modelj->save(false);
        }
            
             $IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases";
             $IcoLog->tbl_pid=$model->case_id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="Update";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
            return $this->redirect(['index', 'id' => $model->case_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblCases model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         $this->layout='dashboard';
        $this->findModel($id)->delete();
            $IcoLog=new IcoLog();
            
            $IcoLog->tbl_name="Cases";
             $IcoLog->tbl_pid=$id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="Insert";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
return $this->redirect(['index']);
         
    }

public function actionIcolog_report()
    {
         $this->layout='dashboard';
         $x = $_POST;

        ini_set('memory_limit', '-1');

         if ($x)
        {
           
                $dateTime1 = \DateTime::createFromFormat("d/m/Y", $x['fromDate']);
         $date1= \Yii::$app->formatter->asDatetime($dateTime1, "php:Y-m-d");
             
                 $dateTime2 = \DateTime::createFromFormat("d/m/Y", $x['toDate']);
         $date2= \Yii::$app->formatter->asDatetime($dateTime2, "php:Y-m-d");
          $IcoLog=IcoLog::find()->where(['between','date',$date1,$date2])->all();
         
        }
       //this->findModel($id)->delete();
return $this->render('generate_report_icolog', [
              'IcoLog' => $IcoLog,'x'=>$x
            ]);
        
    }

 public function actionHdreport()
    {
  ini_set('memory_limit', '-1');
 ini_set('max_execution_time', 300); //300 seconds = 5 minutes
         $this->layout='dashboard';
         $x = $_POST;
 
     
         if ($x)
        {
         
          if ($x['citation']) {
       $Tbl_cases=TblCases::find()->where(['like','citation',$x['citation']])->all();
       
         }
        elseif ($x['eqcitation']) {
          
        
                    $IcoCitation=IcoCitation::find()->where(['like','citation',$x['eqcitation']])->all();
        
    
       $Tbl_cases=TblCases::find()->where(['in','case_id',$IcoCitation])->all();
       
         }
    
         
        }
       //this->findModel($id)->delete();
return $this->render('generate_hd_report', [
              'Tbl_cases' => $Tbl_cases,'x'=>$x
            ]);
        
    }
 public function actionDump_report()
    {
  ini_set('memory_limit', '-1');
 ini_set('max_execution_time', 300); //300 seconds = 5 minutes
         $this->layout='dashboard';
         $x = $_POST;
         if ($x)
        {
             $dateTime1 = \DateTime::createFromFormat("d/m/Y", $x['fromDate']);
         $date1= \Yii::$app->formatter->asDatetime($dateTime1, "php:Y-m-d");
             
                 $dateTime2 = \DateTime::createFromFormat("d/m/Y", $x['toDate']);
         $date2= \Yii::$app->formatter->asDatetime($dateTime2, "php:Y-m-d");
         
         
    
          $Tbl_cases=TblCases::find()->where(['between','judgement_dt',$date1,$date2])->all();
        }
       //this->findModel($id)->delete();
return $this->render('generate_report', [
              'Tbl_cases' => $Tbl_cases,'x'=>$x
            ]);
        
    }

    public function actionEqreport()
    {
     ini_set('memory_limit', '-1');
         $this->layout='dashboard';
       
          $chk_referredcitations = $_POST['chk_referredcitations'];
                                      
         if ( $chk_referredcitations)
        {
                $chk_referredcitationsArray = explode(",", $chk_referredcitations);
                                        for($i=0;$i<sizeof($chk_referredcitationsArray);$i++){
                                            $searchQuery = $searchQuery."citation like '%$chk_referredcitationsArray[$i]%' ||";
                                        }
                                        $searchQuery = substr($searchQuery, 0, strlen($searchQuery)-2);

                                        $SQL_Query = "SELECT case_id FROM tbl_ico_citation where ". $searchQuery;

                    $IcoCitation=IcoCitation::findBySql($SQL_Query)->all();
         
       
        }
       //this->findModel($id)->delete();
return $this->render('generate_report_ico', [
              'IcoCitation' =>  $IcoCitation,'chk_referredcitations'=>$chk_referredcitations
            ]);
        
    }

     public function actionFeqreport()
    {
      ini_set('memory_limit', '-1');
         $this->layout='dashboard';
       
          $chk_referredcitations = $_POST['chk_referredcitations'];
                                      
         if ( $chk_referredcitations)
        {
            $chk_referredcitations = $_POST['chk_referredcitations'];
                                        $chk_referredcitationsArray = explode(",", $chk_referredcitations);
                                        for($i=0;$i<sizeof($chk_referredcitationsArray);$i++){
                                            $searchQuery = $searchQuery." citation like '%$chk_referredcitationsArray[$i]%' ||";
                                        }
                                        $searchQuery = substr($searchQuery, 0, strlen($searchQuery)-2);

                                         $SQL_Query = "SELECT case_id FROM tbl_ico_citation where ". $searchQuery;
                   $IcoCitation=IcoCitation::findBySql($SQL_Query)->all();
        }
       //this->findModel($id)->delete();
return $this->render('generate_report_ico_feq', [
              'IcoCitation' => $IcoCitation,'x'=>$x
            ]);
        
    }
    /**
     * Finds the TblCases model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblCases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
         $this->layout='dashboard';
        if (($model = TblCases::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionCitation_category(){
         
 
      
        $citation = $_GET['citation'];   
       
        $html=$citation;
        $html = str_replace('Year', '<input id="year" name="year" placeholder="Year" class="input-sm cit_input">', $html);
        $html = str_replace('PageNumber', '<input id="page_number" placeholder="Page Number" name="page_number" class="input-sm cit_input">', $html);
        $html = str_replace('Volume', '<input id="volume" name="volume" placeholder="Volume" class="input-sm cit_input">', $html);
        $html = str_replace('Case No.X', '<input id="case_number" name="case_number" placeholder="Case No.X" class="input-sm cit_input">', $html);
        echo '<div class="cit_content">'.$html.'</div>';   




    }

  

      public function actionCitation()
    {
         $data="";
         $id=$_POST['id'];
         $case_id=$_POST['sd'];
        $html= $id;
       $flag=false;
        if(!empty($_POST['year'])){
        $flag=true;
        $html = str_replace('Year', $_POST['year'], $html);
        }
        if(!empty($_POST['page_number'])){
        $flag=true;
        $html = str_replace('PageNumber', $_POST['page_number'], $html);
        }
        if(!empty($_POST['volume'])){
        $flag=true;
        $html = str_replace('Volume', $_POST['volume'], $html);
        }
        if(!empty($_POST['case_number'])){
        $flag=true;
        $html = str_replace('Case No.X','Case No.'.$_POST['case_number'], $html);
        }
       //  $IcoCitation_count=IcoCitation::find() ->where(['AND',['citation'=>$html ],['case_id'=> $case_id]])        
      //   ->count();
         $IcoCitation_count=IcoCitation::find() ->where(['citation'=>$html ])        
         ->count();
        if($flag==true && $IcoCitation_count==0 ){
         $iC = new IcoCitation();
         $iC->case_id= $case_id;
         $iC->citation= $html;
         $iC->save(false);
            $IcoLog=new IcoLog();
             $IcoLog->tbl_name="Cases-Citation";
             $IcoLog->tbl_pid=$case_id;
             $IcoLog->user_id=\Yii::$app->user->identity->username;
             $IcoLog->mode="Insert";
             $IcoLog->date=date("Y-m-d H:i:s");
             $IcoLog->save(false);
         $IcoCitation=IcoCitation::find() ->where(['citation'=>$html ])        
         ->one();
        
          $data.="<li>".$IcoCitation['citation']."<a href='index.php?r=cases%2Fdelete_cit&id=".$iC->id."&cid=".$case_id."' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?' data-method='post'>
<span class='glyphicon glyphicon-trash'></span>
</a></li>";
        }
        

         echo $data;
         
    }

   

 public function actionCaseno()
    {
         $data="";
         $case_no=$_POST['case_no'];
         $case_id=$_POST['sd'];
       $IcoCaseNo_count=IcoCaseNo::find() ->where(['and',['case_id'=>$case_id],['case_no'=>$case_no ]])        
         ->count();
   
 
         if ( $IcoCaseNo_count==0 && ($case_id >0)){
        
         $ij = new IcoCaseNo();
         $ij->case_id= $case_id;
         $ij->case_no=$case_no;
         $ij->save(false);
       
            $tj=IcoCaseNo::find() ->where(['case_no'=> $case_no ])        
         ->one();
        
          $data.="<li>".$tj['case_no']."<a href='index.php?r=cases%2Fdelete_cn&id=".$tj['id']."&cid=".$case_id."' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?' data-method='post'>
<span class='glyphicon glyphicon-trash'></span>
</a></li>";
          }
        


         echo "<ul class='list-group_case'>".$data."</ul>";
    } 


public function actionRefcitation()
    {
         $data="";
         $cit=$_POST['cit'];
           $case_id=$_POST['sd'];
       $flag=false;
  
         $IcoRefCitation_count=IcoRefCitation::find() ->where(['citation'=>$cit ])        
         ->count();
        if($case_id !="" || $case_id !=0 ){
         $iC = new IcoRefCitation();
         $iC->case_id= $case_id;
         $iC->citation= $cit;
         $iC->save(false);
         $IcoCitation=IcoRefCitation::find() ->where(['citation'=>$cit ])        
         ->one();
        
          $data.="<li>".$IcoCitation['citation']."<a href='index.php?r=cases%2Fdelete_citref&id=".$iC->id."&cid=".$case_id."' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?' data-method='post'>
<span class='glyphicon glyphicon-trash'></span>
</a></li>";
        }
        

         echo $data;
         
    }
public function actionCitationautocomplete($term) {
     
      


     $data = [];

 

     $IcoCitation = IcoCitation::find()
        ->where(['like','citation', $term])
       ->select(['citation as value', 'citation as label','id as id'])
       ->asArray()
       ->all();
          
      $TblCases = TblCases::find()
        ->where(['like','citation', $term])
       ->select(['citation as value', 'citation as label','case_id as id'])
       ->asArray()
       ->all();

       $IcoCitation=array_merge($IcoCitation, $TblCases );
    return  json_encode( $IcoCitation );


}

public function actionJudgeautocomplete($term) {
     
      


     $data = [];

 

   
          
      $data = TblJudges::find()
        ->where(['like','judge_name', $term])
       ->select(['judge_id as value', 'judge_name as label','judge_id as id'])
       ->asArray()
       ->all();

     
    return  json_encode( $data );


}

 public function actionCitautocomplete($term) {
     
      
     ini_set('memory_limit', '-1');

     $data = [];

 

  
          
      $TblCases = TblCases::find()
        ->where(['like','citation', $term])
       ->select(['case_id as value', 'citation as label','case_id as id'])
       ->asArray()
      ->limit(20)
       ->all();

     
    return  json_encode( $TblCases );


}


  public function actionDelete_cn($id,$cid)
    {
         
           $this->layout='dashboard';
     

$model = Yii::$app->db->createCommand("
    DELETE FROM tbl_ico_case_no 
    WHERE id = '$id' 
   
")->execute();
 $model=TblCases::find() ->where(['case_id'=>$cid ])        
         ->one();

        //    return $this->render('update', [
        //     'model' => $model,
        // ]);
  
  return Yii::$app->response->redirect(Url::to(['cases/update', 'id' => $cid]));

    }
	

  public function actionDelete_citref($id,$cid)
    {
         
           $this->layout='dashboard';
     

$model = Yii::$app->db->createCommand("
    DELETE FROM tbl_ico_ref_citation 
    WHERE id = '$id' 
   
")->execute();
 $model=TblCases::find() ->where(['case_id'=>$cid ])        
         ->one();

        //    return $this->render('update', [
        //     'model' => $model,
        // ]);
  return Yii::$app->response->redirect(Url::to(['cases/update', 'id' => $cid]));
    }
}
