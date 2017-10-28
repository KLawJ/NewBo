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
            <td nowrap="nowrap"  class="rFontW"><div align="center"> &nbsp;&nbsp;ICO - Headnote Dump Report</div></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap"></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#CCCCCC">
              <table width="100%" border="0" cellpadding="2" cellspacing="1" class="rFontB">
              
                
                 <tr>
                  <td align="right" bgcolor="#FFFFFF">Citation</td>
                  <td bgcolor="#FFFFFF">
                  <input type="text" size="20" id="citation" name="citation" class="rFontB" />
                  </td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Equvalent Citation</td>
                  <td bgcolor="#FFFFFF">
                  	<input type="text" size="20" id="eqcitation" name="eqcitation" class="rFontB"/>
                  </td>
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




                 
					   $objPHPExcel->setActiveSheetIndex(0)
					             ->setCellValue('A1','CITATION');
				  
				
					
					$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('B1','Equvalent Citation');
					
						
						$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('C1','JUDGEMENT DATE');
	$objPHPExcel->setActiveSheetIndex(0)
					                ->setCellValue('D1','HEADNOTES');
						
						$i=2;

					foreach ($Tbl_cases as $Tc ){

                    



						//CITATION COLUMN
						
					

								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('A'.$i, stripslashes(strip_tags($Tc->citation)));
							  $IcoCitation=IcoCitation::find()->where(['case_id'=>$Tc->case_id])->all();
                      $citation="";$ci=0;
                    if($IcoCitation)
                    {
                    foreach ($IcoCitation as $c)
                    {
                    
                    if ($ci==0){
                    $citation=$c->citation;
                    }
                    else
                    {
                     $citation.=";".$c->citation;
                    }
                    $ci++;
                    }
                    
                    }
                    else
                    {
                    $citation="";
                    }
                    $objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('B'.$i, stripslashes(strip_tags($citation)));
							 $hdnote=IcoHeadnote::find()->where(['case_id'=>$Tc->case_id])->count();
                    
                            if ($hdnote>0)  
                            {
                             $Headnote=$hdnote." Headnote Created"; 
                            }
                            else
                            {
                              $Headnote="Blank Headnote"; 
                            }
							
						// CASE ID
					
								$objPHPExcel->setActiveSheetIndex(0)
							
							     ->setCellValue('C'.$i, stripslashes(strip_tags($Tc->judgement_dt)))
                               
					     ->setCellValue('D'.$i, stripslashes(strip_tags($Headnote)));

                     $i++;
					}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Dump Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);
$filename = './excel/ico_headnote_dump_report.xlsx';
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



