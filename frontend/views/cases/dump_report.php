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
                   ],]);
    
                ?>
<div class="tbl-cases-index">
 
                   <td height="81" valign="top"><br />
      <form id="report" name="report" method="post" action="rpt_generate_dump_report.php">
        <table width="36%" border="0" align="center" cellpadding="5" cellspacing="2" bordercolor="#EEEEEE" bgcolor="#FFFFFF" class="rFont">
          <tr>
            <td nowrap="nowrap"  class="rFontW"><div align="center"> &nbsp;&nbsp;ICO - Dump Report</div></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap"></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#CCCCCC">
              <table width="100%" border="0" cellpadding="2" cellspacing="1" class="rFontB">
              	<!--
                <tr>
                  <td width="46%" align="right" nowrap="nowrap" bgcolor="#EBEBEB">Judgement Year</td>
                  <td bgcolor="#EBEBEB" width="54%"><select name="year" size="1" id="year" class="rFontB">
                    <option value="0" selected>Select Year</option>
                    <?php
					  	for($i=2011;$i > 1599; $i--){
							echo('<option value="'.$i.'">'.$i.'</option>');
						}
					  ?>
                  </select>
                  </td>
                </tr>
                -->
                <tr>
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