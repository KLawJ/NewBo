<?php
use yii\helpers\Html;
use yii\helpers\Url ;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\IcoLog;



/* @var $this yii\web\View */
/* @var $searchModel app\models\Tblil */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ICO Log - ICO';
$this->params['breadcrumbs'][] = $this->title;


 

?>

   



  <section class="content">
    <?php $form = ActiveForm::begin(['id' => 'dumpreport-form ',
                  
                  'options' => [
                  
                  'class' => 'form'
                   ],
                   ]);
    
                ?>
<div class="tbl-il-index">
 
                   <table width="36%" border="0" align="center" cellpadding="5" cellspacing="2" bordercolor="#EEEEEE" bgcolor="#FFFFFF" class="rFont">
          <tr>
            <td nowrap="nowrap"  class="rFontW"><div align="center"> &nbsp;&nbsp;ICO - Log Dump Report</div></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap"><div align="right"> </div></td>
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



 if ($IcoLog)  {

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
					             ->setCellValue('A1','Table Name')
				                  ->setCellValue('B1','Table Pid')
					             ->setCellValue('C1','User')
				     ->setCellValue('D1','Mode')
				   ->setCellValue('E1','Date');
					
						$i=2;

					foreach ($IcoLog as $il ){

								$objPHPExcel->setActiveSheetIndex(0)
								             ->setCellValue('A'.$i, stripslashes($il['tbl_name']))
							->setCellValue('B'.$i, stripslashes($il['tbl_pid']))
						 ->setCellValue('C'.$i, stripslashes($il['user_id']))
						 ->setCellValue('D'.$i, stripslashes($il['mode']))
						 ->setCellValue('E'.$i,$il['date']);
											

                     $i++;
					}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Dump Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);
$filename = './excel/ico_dump_report_icolog.xlsx';
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



