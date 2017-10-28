<?php

use yii\helpers\Html;
use common\models\TblCases;
use common\models\IcoJudge;
use common\models\TblJudges;
use common\models\IcoCitation;
use common\models\TblCasesJudgement;
use common\models\IcoHeadnote;
use common\models\TblCourts;
use common\models\IcoCaseNo;
use common\models\IcoRefCitation;
use common\models\JudgeClass;

$this->title = 'PDF Gen';
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$case_id=$_GET['cid'];

  
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
                 $jdnote="No Judgment";
            }
            
                $strEquivalentCitation="";
               $cCit = IcoCitation::find()
        ->where(['case_id'=> $cS->case_id])
              ->all();
                  if ($cCit)
          {
                      foreach($cCit as $ct)
            {
                 
                   $strEquivalentCitation.=  $ct->citation."<br>"  ; 
            
            }
          } 
           if (!empty($cS['citation']) && !empty($cS['strEquivalentCitation'])) {$strEqv="";$strEqv=$cS['citation']." | ".$strEquivalentCitation;} 
             else if(!empty($cS['citation'])) {$strEqv="";$strEqv=$cS['citation'];}
             else if (!empty($strEquivalentCitation)) {$strEqv="";$strEqv=$strEquivalentCitation;}
               
            $judge="";
               $cJd = IcoJudge::find()
        ->where(['case_id'=> $cS->case_id])
              ->all();
                  if ($cJd)
          {
                      foreach($cJd as $jd_1)
            {
                      $tj=TblJudges::find() ->where(['judge_id'=> $jd_1->judge_name ])        
         ->one();
                         $jcl=JudgeClass::find() ->where(['judge_class_id'=> $jd_1->j_label])        
         ->one();
                 $judge.= $jcl['judge_class']." " .$tj['judge_name']."<br>"  ; 
                
            
            }
          }
            
               $case_no="";
               $cNo = IcoCaseNo::find()
        ->where(['case_id'=> $cS['case_id']])
              ->all();
                  if ($cNo)
          {
                  
                  $i=0;
                      foreach($cNo as $cn)
            {
                    if ($i==0)
                    {
                     $case_no=$cn->case_no;
                    }
                      else
                      {
                      $case_no.=";".$cn->case_no;
                      }
                      
                  $i++;
           
         
            }
          }
            
         //$case_no=$cS['case_no'];
         $citation=$cS['citation'];
          $strJudges=$judge;
         $court_name=$Courts['court_name'];
         $p_Aname=$cS['strPartyAName'];
         $p_Bname=$cS['strPartyBName'];
         $p_ALawyer=$cS['strPartyALawyer'];
         $p_BLawyer=$cS['strPartyBLawyer'];
       //$hdnote
       //$jdnote
     
         
            }
          }
?>

<p>
<div>
        <?php echo "<h4 align='center'>".$citation."</h4>"; ?>
           <?php echo "<h4 align='center'>".$court_name."</h4>"; ?>
            <?php echo "<h4 align='center'>".$strJudges."</h4>"; ?>
        
        <br>
          <?php echo "<p align='center'>".$p_Aname." vs. ".$p_Bname."</p>"; ?>
          <?php echo "<p align='center'>"."Parallel Citation: ".$strEqv."</p>"; ?>
          <?php echo "<p align='center'>"."Case no: ".$case_no."</p>"; ?>
          <?php echo  " <p align='center'>Date: ".Yii::$app->formatter->asDate($cS['judgement_dt'])."</p>"; ?>
           
        
           <br>
           <h3>Headnote</h3>
                 <p><?php echo $hdnote; ?></p>
                     <br>
                  <?php echo  "<p> <b>Advocates :</b> ".$p_ALawyer."&nbsp;".$p_BLawyer."</p>"; ?>
                 <br>
           <h3>Judgment</h3>
                 <p><?php echo $jdnote; ?></p>
        <?php  echo $data;  ?>
  </div>
          
</p>      


        
   