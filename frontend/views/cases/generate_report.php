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
 
                   <td height="81" valign="top"><br />
    
        <table width="36%" border="0" align="center" cellpadding="5" cellspacing="2" bordercolor="#EEEEEE" bgcolor="#FFFFFF" class="rFont">
          <tr>
            <td nowrap="nowrap"  class="rFontW"><div align="center"> &nbsp;&nbsp;ICO - Dump Report</div></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap"></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#CCCCCC">
              <table width="100%" border="0" cellpadding="2" cellspacing="1" class="rFontB">
              
                
                 <tr>
                  <td align="right" bgcolor="#FFFFFF">From Date</td>
                  <td bgcolor="#FFFFFF">
                  <input type="text" size="20" id="fromDate" name="fromDate" class="rFontB"/>
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">To Date</td>
                  <td bgcolor="#FFFFFF">
                  	<input type="text" size="20" id="toDate" name="toDate" class="rFontB"/>
                  </td>
                </tr>

                  <tr>
                  <td align="right" bgcolor="#FFFFFF">Citation</td>
                  <td bgcolor="#FFFFFF">
                  	<input name="chk_citation" type="checkbox" id="chk_citation" value="1" />
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Case No</td>
                  <td bgcolor="#FFFFFF">
                    <input name="chk_caseno" type="checkbox" id="chk_caseno" value="1" />
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Case ID</td>
                  <td bgcolor="#FFFFFF"><input name="chk_caseid" type="checkbox" id="chk_caseid" value="1" /></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Case Type</td>
                  <td bgcolor="#FFFFFF"><input name="chk_casetype" type="checkbox" id="chk_casetype" value="1" /></td>
                </tr>

                <tr>
                  <td align="right" bgcolor="#FFFFFF">Court Name</td>
                  <td bgcolor="#FFFFFF"><input name="chk_court" type="checkbox" id="chk_court" value="1" /></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Judgement Date</td>
                  <td bgcolor="#FFFFFF">
                    <input name="chk_judgementdate" type="checkbox" id="chk_judgementdate" value="1" />
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Parties</td>
                  <td bgcolor="#FFFFFF">
                    <input name="chk_parties" type="checkbox" id="chk_parties" value="1" />
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Lawers</td>
                  <td bgcolor="#FFFFFF">
                    <input name="chk_lawyers" type="checkbox" id="chk_lawyers" value="1" />
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Judges</td>
                  <td bgcolor="#FFFFFF">
                    <input name="chk_judges" type="checkbox" id="chk_judges" value="1" />
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Equivalent Citations</td>
                  <td bgcolor="#FFFFFF">
                    <input name="chk_referredcitations" type="checkbox" id="chk_referredcitations" value="1" />
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Head Notes</td>
                  <td bgcolor="#FFFFFF">
                    <input name="chk_headnotes" type="checkbox" id="chk_headnotes" value="1" />
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#EBEBEB">Published</td>
                  <td bgcolor="#EBEBEB"><input name="chk_published" type="checkbox" id="chk_published" value="1" /></td>
                </tr>
                <tr>
                  <td align="right" nowrap="nowrap" bgcolor="#EBEBEB">Quality Check</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#EBEBEB"><input name="chk_qualitycheck" type="checkbox" id="chk_qualitycheck" value="1" /></td>
                </tr>
                <tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">Internal Comments/Remarks</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="chk_remarks" type="checkbox" id="chk_remarks" value="1" /></td>
                </tr>

				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">Shorthead</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="chk_shorthead" type="checkbox" id="chk_shorthead" value="1" /></td>
                </tr>

				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">No Headnote</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="nhn" type="checkbox" value="1" /></td>
                </tr>

				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">Reporters</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="chk_reporters" type="checkbox" id="chk_shorthead" value="1" /></td>
                </tr>

				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">Referred Citation</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="chk_ReferredCitation" type="checkbox" id="chk_ReferredCitation" value="1" /></td>
                </tr>

				<td align="right" nowrap="nowrap" bgcolor="#FFFFFF">ICO Reported</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="ico_reported" type="checkbox"  value="1" /></td>
                </tr>

				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">KLJ Reported</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="klj_reported" type="checkbox"  value="1" /></td>
                </tr>
				
				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">ALIGNMENT</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="alignment" type="checkbox"  value="1" /></td>
                </tr>
				
				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">LINKS</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="links" type="checkbox"  value="1" /></td>
                </tr>
				
				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">OTHER LANGUAGES</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="languages" type="checkbox"  value="1" /></td>
                </tr>
				
				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">Images/Table</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="img_table" type="checkbox"  value="1" /></td>
                </tr>
				
				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">Scan</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="scan" type="checkbox"  value="1" /></td>
                </tr>
				
				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">Source</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="source" type="checkbox"  value="1" /></td>
                </tr>

				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">Judgement</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="judgement" type="checkbox"  value="1" /></td>
                </tr>
				
				<tr>
                  <td align="right" nowrap="nowrap" bgcolor="#FFFFFF">Reject</td>
                  <td valign="top" nowrap="nowrap" bgcolor="#FFFFFF"><input name="reject" type="checkbox"  value="1" /></td>
                </tr>
				
				
                <tr>
                  <td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFFFFF">
                  	
                  <?= Html::submitButton('Generate Report', ['class' => 'btn btn-success']) ?>
                  </td>
                </tr>
              </td>
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

if (isset($x['chk_citation']))

if ($Tbl_cases)  {

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


                   if(isset($x['chk_citation'])&& $x['chk_citation'] == 1)
				   {
					   $objPHPExcel->setActiveSheetIndex(0)
					             ->setCellValue('A1','CITATION');
				   } 
					if(isset($x['chk_caseno'])&& $x['chk_caseno'] == 1)
					{ $objPHPExcel->setActiveSheetIndex(0)
					             ->setCellValue('B1','CASE NO');
				    }
					if(isset($x['chk_caseid'])&& $x['chk_caseid'] == 1)
					{ $objPHPExcel->setActiveSheetIndex(0)
					             ->setCellValue('C1','CASE ID');
				    }
					if(isset($x['chk_casetype'])&& $x['chk_casetype']==1)
					{
					
						$objPHPExcel->setActiveSheetIndex(0)
					             ->setCellValue('D1','CASE TYPE');
				    }
					if(isset($x['chk_court'])&& $x['chk_court'] == 1)
					{
						
						$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('E1','COURT');	
					}
					if(isset($x['chk_judgementdate'])&& $x['chk_judgementdate'] == 1)
					{
					
					$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('F1','JUDGEMENT DATE');
					}
					if(isset($x['chk_parties'])&& $x['chk_parties'] == 1)
					{
						$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('G1','PARTIES');
					}
					if(isset($x['chk_lawyers'])&& $x['chk_lawyers'] == 1)
					{
					 
						$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('H1','LAWYERS');
					}
					if(isset($x['chk_judges'])&& $x['chk_judges'] == 1)
					{
						
						$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('I1','JUDGES');
					}
					if(isset($x['chk_referredcitations'])&& $x['chk_referredcitations'] == 1)
					{
						
						$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('J1','EQUIVALENT CITATIONS');
						}
					if(isset($x['chk_headnotes']) && $x['chk_headnotes'] == 1)
					{
						
						$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('K1','HEADNOTES');
						}
					if(isset($x['chk_published'])&& $x['chk_published'] == 1)
					{
						
						$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('L1','PUBLISHED');
						 }
					if(isset($x['chk_remarks'])&& $x['chk_remarks'] == 1)
					{
				
							$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('M1','REMARKS');
						 }
					if(isset($x['nhn'])&& $x['nhn'] == 1)
					{
						
							$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('N1','NO HEADNOTE');
						 }
					if(isset($x['klj_reported'])&& $x['klj_reported'] == 1)
					{
						
							$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('O1','KLJ reported');
						 }
					if(isset($x['languages'])&& $x['languages'] != "")
					{
						
							$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('P1','OTHER LANGUAGES');
						 }
					if(isset($x['img_table'])&& $x['img_table'] != "")
					{
					
							$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('Q1','IMAGE/TABLES'); 
						}
					if(isset($x['judgement'])&& $x['judgement'] != "")
					{
						
							$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('R1','JUDGEMENT');
						}
					if(isset($x['reject'])&& $x['reject'] != "")
					{
					
							$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('S1','REJECT');
						 }
					if(isset($x['chk_ReferredCitation'])&& $x['chk_ReferredCitation'] == 1)
					{
						
							$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('T1','REFERREDCITATION');
						}
						$i=2;

					foreach ($Tbl_cases as $Cases ){

						//CITATION COLUMN
						if(isset($x['chk_citation'])&& $x['chk_citation'] == 1){
							if(trim(stripslashes($Cases['citation']))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('A'.$i, stripslashes($Cases['citation']));
							
							}else{ $objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('A'.$i,''); }
						}
						// CASE NO
						if(isset($x['chk_caseno'])&& $x['chk_caseno'] == 1){
							if(trim(stripslashes($Cases['case_no']))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('B'.$i, stripslashes($Cases['case_no']));
							}else{ 
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('B'.$i,""); }
						}
						// CASE ID
						if(isset($x['chk_caseid'])&& $x['chk_caseid'] == 1){
							if(trim(stripslashes($Cases['case_id']))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('C'.$i, stripslashes($Cases['case_id']));
							}else{ $objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('C'.$i,""); }
						}
						// CASE TYPE
						if(isset($x['chk_casetype'])&& $x['chk_casetype'] == 1){
							if(trim(stripslashes($Cases['strCaseType']))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('D'.$i, stripslashes($Cases['strCaseType']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('D'.$i, "");}
						}
						// COURT NAME
						if(isset($x['chk_court'])&& $x['chk_court'] == 1){

                            $Courts= TblCourts::find()->where(['court_id'=>$Cases['court_id']])->one();
								if(trim(stripslashes($Cases['court_id']))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('E'.$i, stripslashes($Courts['court_name']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('E'.$i, "");}

						}
						// JUDGEMENT DATE
						if(isset($x['chk_judgementdate'])&& $x['chk_judgementdate'] = 1){
							if(trim($Cases['judgement_dt'])!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('F'.$i, date('d-m-Y', strtotime($Cases['judgement_dt'])));
								
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('F'.$i, "");}
						}
						// PARTIES
						if(isset($x['chk_parties'])&& $x['chk_parties'] == 1){
							$parties = stripslashes($Cases['strParties']).stripslashes($Cases['strPartyAName']).stripslashes($Cases['strPartyBName']);
							if(trim(stripslashes($parties))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('G'.$i, stripslashes($parties));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('G'.$i, "");}
						}
						// LAWYERS
						if(isset($x['chk_lawyers'])&& $x['chk_lawyers'] == 1){
							$advocates = stripslashes($Cases['strAdvocate']).stripslashes($Cases['strPartyALawyer']).stripslashes($Cases['strPartyBLawyer']);
							if(trim($advocates)!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('H'.$i, stripslashes($advocates));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('H'.$i, "");}
						}
						// JUDEGES
						if(isset($x['chk_judges'])&& $x['chk_judges'] == 1){
                         $judge =  IcoJudge::find()->where(['case_id'=>$Cases['case_id'] ])->all();
							if($judge){
                              foreach($judge as $j){
                             $tj=TblJudges::find() ->where(['judge_id'=> $j->judge_name ])->one();
								
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('I'.$i, stripslashes($tj['judge_name']));
                              }
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('I'.$i, "");}
						}
						// REFERRED CITATION
						if(isset($x['chk_referredcitations'])&& $x['chk_referredcitations'] == 1){
							    $IcoCitation=IcoCitation::find()->where(['case_id'=>$Cases['case_id']])->all();
              
                     $strEquivalentCitationPrint="";
                    $ii=0;
                     foreach($IcoCitation as $j){
                     if ($ii==0){
                      $strEquivalentCitationPrint = $strEquivalentCitationPrint. $j['citation'];  
                     }
                     else
                     {
                      $strEquivalentCitationPrint = $strEquivalentCitationPrint.";". $j['citation'];  
                     }
                     $ii++;
								            
                     }
							if(trim(stripslashes($strEquivalentCitationPrint))!=""){
								
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('J'.$i, stripslashes($strEquivalentCitationPrint));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('J'.$i, "");}
						}
						// HEAD CONTENT
						if(isset($x['chk_headnotes'])&& $x['chk_headnotes'] == 1){
							if(trim(stripslashes($Cases['headnote_content']))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('K'.$i, stripslashes($Cases['headnote_content']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('K'.$i, "");}
						}
						// PUBLISHED
						if(isset($x['chk_published'])&& $x['chk_published'] == 1){
							if($Cases['PB']==1){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('L'.$i,'PUBLISHED');
							}else{
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('L'.$i,'');
							}
						}
						
						// REMARKS
						if(isset($x['chk_remarks'])&& $x['chk_remarks'] == 1){
							if(trim(stripslashes($Cases['remarks']))!=""){
							$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('M'.$i,stripslashes($Cases['remarks']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('M'.$i,'');
							}

						}

					

						if(isset($x['nhn'])&& $x['nhn'] == 1){
							if(trim(stripslashes($Cases['nhn']))!=""){
							$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('N'.$i,stripslashes($Cases['nhn']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('N'.$i,'');}

						}



						if(isset($x['klj_reported'])&& $x['klj_reported']){
							if(trim(stripslashes($Cases['klj_reported']))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('O'.$i,stripslashes($Cases['klj_reported']));
								
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('O'.$i,'');}

						}
						
						
						

						if( isset($x['languages'])&& $x['languages']){
							if(trim(stripslashes($Cases['languages']))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('P'.$i,stripslashes($Cases['languages']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('P'.$i,'');}

						}
						
						
						if(isset($x['img_table'])&& $x['img_table']){
							if(trim(stripslashes($Cases['img_table']))!=""){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('Q'.$i,stripslashes($Cases['img_table']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('Q'.$i,'');}

						}
						
					
						
						if(isset($x['judgement'])&& $x['judgement']){
							if(trim(stripslashes($Cases['judgement']))){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('R'.$i,stripslashes($Cases['judgement']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('R'.$i,'');}

						}
						
						if(isset($x['reject'])&& $x['reject']){
							if(trim(stripslashes($Cases['reject']))){
								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('S'.$i,stripslashes($Cases['judgement']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('S'.$i,'');}

						}
						
						if(isset($x['chk_ReferredCitation'])&& $x['chk_ReferredCitation'] == 1)  {
							if(trim(stripslashes($Cases['strReferredCitation']))!=""){
							$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('T'.$i,stripslashes($Cases['judgement']));
							}else{$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('T'.$i,'');}

						}

                     $i++;
					}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Dump Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);
$filename = './excel/ico_dump_report.xlsx';
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

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
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



