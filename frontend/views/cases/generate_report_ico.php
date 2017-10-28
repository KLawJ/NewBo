<?php
use yii\helpers\Html;
use yii\helpers\Url ;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\TblCases;
use common\models\TblCourts;
use common\models\TblCasePrefix;
use common\models\IcoJudge;
use common\models\TblJudges;
use common\models\IcoCitation;
use common\models\TblCitation;
use common\models\IcoHeadnote;
use common\models\TblCasesJudgement;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblCases */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cases - ICO';
$this->params['breadcrumbs'][] = $this->title;


 

?>

   



  <section class="content">
    <?php $form = ActiveForm::begin(['id' => 'dumpreport-form ',
                  
                  'options' => [
                  
                  'class' => 'form'
                   ],
                   ]);
    
                ?>
<div class="tbl-cases-index">
 
                   <table width="36%" border="0" align="center" cellpadding="5" cellspacing="2" bordercolor="#EEEEEE" bgcolor="#FFFFFF" class="rFont">
          <tr>
            <td nowrap="nowrap" bgcolor="#9A1113" class="rFontW"><div align="center"> &nbsp;&nbsp;ICO - Equivalent Citations Dump Report</div></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap"><div align="right"> <a href="administration.php"> <img alt="Click here to go back" src="../images/icon_back.png" width="20" height="20" border="0" /> </a> </div></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#CCCCCC">
              <table width="100%" border="0" cellpadding="2" cellspacing="1" class="rFontB">

                <tr>
                  <td align="right" bgcolor="#FFFFFF">Equivalent Citations</td>
                  <td bgcolor="#FFFFFF">
                    <input name="chk_referredcitations" type="textbox" id="chk_referredcitations" />
                  </td>
                </tr>
                <tr>
                  <td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFFFFF">
                     <?= Html::submitButton('Generate Report', ['class' => 'btn btn-success']) ?>
                  </td>
                </tr>
              </table></td>
          </tr>
        </table>
                  	
                  
           
     
         
      </div>
                    <?php ActiveForm::end(); ?>


      <!-- /.row -->
    </section>
  

  


    <!-- /.content -->
<?php
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');


define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

 if ($IcoCitation){
  $IcoCitation1=IcoCitation::find()->where(['AND',['IN','case_id',$IcoCitation],['LIKE','citation',$chk_referredcitations]])->all();
                    

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("ICO - Backoffice ")
							 ->setLastModifiedBy("ICO - Backoffice")
							 ->setTitle("ICO - Backoffice Document")
							 ->setSubject("ICO - Backoffice Test Document")
							 ->setDescription("ICO - Backoffice XLSX, generated using ICO Backoffice.")
							 ->setKeywords("ICO - Backoffice openxml ")
							 ->setCategory("ICO Dump report result file");


           
					   $objPHPExcel->setActiveSheetIndex(0)
					             ->setCellValue('A1','CITATION')
				 
					             ->setCellValue('B1','CASE NO')
				     ->setCellValue('C1','CASE ID')
				   ->setCellValue('D1','CASE TYPE')
				   ->setCellValue('E1','COURT')	
				->setCellValue('F1','JUDGEMENT DATE')
				 ->setCellValue('G1','PARTIES')
				->setCellValue('H1','LAWYERS')
				->setCellValue('I1','JUDGES')
				->setCellValue('J1','EQUIVALENT CITATIONS')
					->setCellValue('K1','HEADNOTES')
					->setCellValue('L1','PUBLISHED')
					->setCellValue('M1','REMARKS')
					->setCellValue('N1','NO HEADNOTE')
					->setCellValue('O1','KLJ reported')
						->setCellValue('P1','OTHER LANGUAGES')
					 ->setCellValue('Q1','IMAGE/TABLES') 
					->setCellValue('R1','JUDGEMENT')
					 ->setCellValue('S1','REJECT')
					 ->setCellValue('T1','REFERREDCITATION');
					
						$i=2;
  foreach ($IcoCitation1 as $cc1)
                    {
$Cases=TblCases::find()->where(['case_id'=>$cc1->case_id])->one();



								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('A'.$i, stripslashes($Cases['citation']))
							->setCellValue('B'.$i, stripslashes($Cases['case_no']))
						 ->setCellValue('C'.$i, stripslashes($Cases['case_id']))
						 ->setCellValue('D'.$i, stripslashes($Cases['strCaseType']));
						

                            $Courts= TblCourts::find()->where(['court_id'=>$Cases['court_id']])->one();
														$parties = stripslashes($Cases['strParties']).stripslashes($Cases['strPartyAName']).stripslashes($Cases['strPartyBName']);
																$advocates = stripslashes($Cases['strAdvocate']).stripslashes($Cases['strPartyALawyer']).stripslashes($Cases['strPartyBLawyer']);
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('E'.$i, stripslashes($Courts['court_name']))
						->setCellValue('F'.$i, date('d-m-Y', strtotime($Cases['judgement_dt'])))
						 ->setCellValue('G'.$i, stripslashes($parties))
						 ->setCellValue('H'.$i, stripslashes($advocates));
						
                         $judge =  IcoJudge::find()->where(['case_id'=>$Cases['case_id'] ])->all();
						$jname="";
                              foreach($judge as $j){
                             $tj=TblJudges::find() ->where(['judge_id'=> $j->judge_name ])->one();
								    $jname.=$tj['judge_name'];
                           
															}
								$objPHPExcel->setActiveSheetIndex(0)
								  ->setCellValue('I'.$i, stripslashes( $jname));
                  
           
                     
                   
                      $strEquivalentCitationPrint =  $cc1->citation;  
                      //$strEquivalentCitationPrint = substr($strEquivalentCitationPrint, 0, strlen($strEquivalentCitationPrint)-1);
                       	$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('J'.$i, stripslashes($strEquivalentCitationPrint));                      
                    	           
                                             	$objPHPExcel->setActiveSheetIndex(0)
								   
						->setCellValue('K'.$i, stripslashes($Cases['headnote_content']))
						->setCellValue('L'.$i,'PUBLISHED')
						 ->setCellValue('M'.$i,stripslashes($Cases['remarks']))
						 ->setCellValue('N'.$i,stripslashes($Cases['nhn']))
						->setCellValue('O'.$i,stripslashes($Cases['klj_reported']))
						->setCellValue('P'.$i,stripslashes($Cases['languages']))
						->setCellValue('Q'.$i,stripslashes($Cases['img_table']))
						 ->setCellValue('R'.$i,stripslashes($Cases['judgement']))
						->setCellValue('S'.$i,stripslashes($Cases['judgement']))
						   ->setCellValue('T'.$i,stripslashes($Cases['judgement']));
						

                     $i++;
					}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Dump Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);
$filename = './excel/ico_dump_report_ico.xlsx';
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($filename);
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


// Save Excel 95 file
echo date('H:i:s') , " Write to Excel5 format" , EOL;
$callStartTime = microtime(true);
$filename1 = './excel/ico_dump_report_ico.xls';
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save($filename1);
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " ,$filename1 , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


// Echo memory peak usage
echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " Done writing files" , EOL;
echo 'Files have been created in ' , getcwd() , EOL;

echo "<a href='".$filename."'>Download</a>";		

 }
?>



