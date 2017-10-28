<style>
/* Ribbon Box */

.ribbon, .ribbon * {
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}
.ribbon {
	width: 600px;
	margin: 40px auto 10px;
	padding: 0 10px 4px;
	position: relative;
	color: black;
	background: #eee;
}
.ribbon h3 {
	display: block;
	height: 40px;
	width: 620px;
	margin: 0;
	padding: 5px 10px 5px 30px;
	position: relative;
	left: -30px;
	color: white;
	background: rgb(193,0,0);
	box-shadow: 0 1px 2px rgba(0,0,0,0.3);
}
.ribbon h3::before {
	content: '';
	display: block;
	width: 0;
	height: 0;
	position: absolute;
	bottom: -11px;
	z-index: 10;
	left: 0;
}
/* Round */
.ribbon.round h3 {
	border-radius: 10px 0px 0px 0px;
}
.ribbon.round h3::before, .ribbon.round h3::after {
	width: 20px;
	height: 30px;
	bottom: -20px;
	border: none;
	background: rgb(61,0,0);
	border-radius: 10px 0px 0px 10px;
}


</style>

<?php


use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\TblCases;
use common\models\TblCasesJudgement;
use common\models\IcoHeadnote;
use common\models\TblCourts;
use common\models\IcoJudge;
use common\models\TblJudges;
use common\models\IcoCitation;
use common\models\IcoCaseNo;
use common\models\IcoRefCitation;
use common\models\JudgeClass;

$this->title = 'Judgment View';
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$hdnote="";
 $jdnote="";
$case_id=$_GET['id'];

 
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
            if ($Courts){
            $c_name=$Courts['court_name'];
            }
             
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
           if (!empty($cS['citation'])) {$strEqv="";$strEqv=$cS['citation'];} 
           
         
             
        $p_Aname=$cS['strPartyAName'];
       $p_Bname=$cS['strPartyBName'];
       //$hdnote
       //$jdnote
        $judge="";
               $cJd = IcoJudge::find()
        ->where(['case_id'=> $cS['case_id']])
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
            
            
            
            }
         }
?>

 <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 align="center" class="modal-title"><?php echo $c_name; ?></h3>
      </div>
    <?php echo "<p align='right'><a href='index.php?r=cases/createpdf&cid=$cS->case_id'  target='_blank' ><img width='40' height='40' src='theme/image/pdf-icon-png.png' /></a>&nbsp;<a href='index.php?r=cases/sharevemail&cid=$cS->case_id'  target='_blank' ><img width='40' height='40' src='theme/image/icons_email.png' /></a></p>";  ?>
      <div class="modal-body">
      <p align="center"><?php echo  $judge;   ?></p>
          <p >
           <?php echo "<p align='center'>".$case_no."</p>"; ?>
          <?php echo "<p align='center'>".$p_Aname." Versus. ".$p_Bname."</p>"; ?>
        <?php echo  " <p align='center'>Judgment Date: ".Yii::$app->formatter->asDate($cS['judgement_dt'])."</p>"; ?>
        <?php echo "<p align='center'>"."Citation: ".$strEqv."</p>";   
          echo "<p align='center'>"."Equvalaent Citation: ".$strEquivalentCitation."</p>"; 
          if(!empty($cS['overruled'])) {echo "<div class='ribbon round'><h3 align='center'>Overruled</h3></div>";}
          ?>
            <?php echo "<p align='center'>"."Partty A Lawyer: ".$cS['strPartyALawyer']."</p>";?>
            <?php echo "<p align='center'>"."Partty B Lawyer: ".$cS['strPartyBLawyer']."</p>";?>
            <hr>
           <h3>Headnote</h3>
                 <p><?php echo $hdnote; ?></p>
                   <hr>
           <h3>Judgment</h3>
                 <p><?php echo $jdnote; ?></p>
        </p>
        </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

        
       
      

  
 

