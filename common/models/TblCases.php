<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_cases".
 *
 * @property integer $case_id
 * @property integer $court_id
 * @property string $strCaseType
 * @property string $case_no
 * @property string $judgement_dt
 * @property string $strPartyType
 * @property string $strOppPartyType
 * @property string $strPartyAName
 * @property string $strPartyBName
 * @property string $strParties
 * @property string $strPartyALawyer
 * @property string $strPartyBLawyer
 * @property string $strAdvocate
 * @property string $strAppearingLawyers
 * @property string $strJudges
 * @property string $headnote_content
 * @property string $citation
 * @property string $strReferredCitation
 * @property string $strAmicuscurie
 * @property resource $strJudgementData
 * @property string $strFileName
 * @property boolean $isNew
 * @property integer $oldCaseID
 * @property string $strEquivalentCitation
 * @property string $lastupdated
 * @property integer $CD
 * @property integer $HN
 * @property integer $JD
 * @property integer $QC
 * @property integer $PB
 * @property string $remarks
 * @property string $shorthead
 * @property string $nhn
 * @property string $reporters
 * @property string $ico_reported
 * @property string $klj_reported
 * @property string $alignment
 * @property string $links
 * @property string $languages
 * @property string $img_table
 * @property string $scan
 * @property string $source
 * @property string $judgement
 * @property string $proof1
 * @property string $proof2
 * @property string $reject
 * @property string $hlinks
 * @property integer $overruled
 */
class TblCases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

     public $year;
     public $vol;
     public $X;
// public $PB_D;
public $strreferredcitation;
public $judgement_content;
public $strJudges_Class;
public $strjudges_value;
    
    public static function tableName()
    {
        //return 'ico_cases';
     return 'tbl_cases';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_id', 'court_id','judgement_dt'], 'required'],
            [['case_id', 'court_id', 'oldCaseID', 'CD', 'HN', 'JD', 'QC', 'PB','PB_D', 'overruled','vol'], 'integer'],
            [['strCaseType', 'strPartyType', 'strOppPartyType', 'strPartyAName', 'strPartyBName', 'strParties', 'strPartyALawyer', 'strPartyBLawyer', 'strAdvocate', 'strAppearingLawyers', 'strJudges', 'headnote_content', 'citation', 'strReferredCitation', 'strAmicuscurie', 'judgement_content', 'strFileName', 'strEquivalentCitation', 'remarks'], 'string'],
            [['judgement_dt', 'lastupdated'], 'safe'],
            [['isNew'], 'boolean'],
            [['case_no'], 'string', 'max' => 250],
            [['shorthead', 'nhn', 'ico_reported', 'klj_reported', 'scan', 'judgement', 'reject'], 'string', 'max' => 5],
            [['reporters', 'alignment', 'source'], 'string', 'max' => 150],
            [['links'], 'string', 'max' => 30],
            [['languages'], 'string', 'max' => 200],
            [['img_table'], 'string', 'max' => 100],
            [['proof1', 'proof2'], 'string', 'max' => 11],
            [['hlinks'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'case_id' => 'Case ID',
            'court_id' => 'Court',
            'strCaseType' => 'Case Type',
            'case_no' => 'Case No',
            'judgement_dt' => 'Judgement Date',
            'strPartyType' => 'Party Type',
            'strOppPartyType' => 'Opposite Party Type',
            'strPartyAName' => 'Party A Name',
            'strPartyBName' => 'Party B Name',
            'strParties' => 'Parties',
            'strJudges_Class'  => 'Judge Class',
            'strPartyALawyer' => 'Party A Lawyer',
            'strPartyBLawyer' => 'Party B Lawyer',
            'strAdvocate' => 'Advocate',
            'strAppearingLawyers' => 'Appearing Lawyers',
            'strJudges' => 'Judges',
            'headnote_content' => 'Headnote Content',
            'citation' => 'ICO Number',
            'strReferredCitation' => 'Referred Citations',
            'strAmicuscurie' => 'Amicuscurie',
            'strJudgementData' => 'Judgement',
            'strFileName' => 'File Name',
            'isNew' => 'Is New',
            'oldCaseID' => 'Old Case ID',
            'strEquivalentCitation' => 'Citation',
            'lastupdated' => 'Lastupdated',
            'CD' => 'Cd',
            'HN' => 'Hn',
            'JD' => 'Jd',
            'QC' => 'Qc',
            'PB' => 'Publish To Web',
            'PB_D' => 'Publish To Desktop',
            'remarks' => 'Remarks',
            'shorthead' => 'Shorthead',
            'nhn' => 'Nhn',
            'reporters' => 'Reporters',
            'ico_reported' => 'Ico Reported',
            'klj_reported' => 'Klj Reported',
            'alignment' => 'Alignment',
            'links' => 'Links',
            'languages' => 'Languages',
            'img_table' => 'Img Table',
            'scan' => 'Scan',
            'source' => 'Source',
            'judgement' => 'Judgement',
            'proof1' => 'Proof1',
            'proof2' => 'Proof2',
            'reject' => 'Reject',
            'hlinks' => 'Hlinks',
            'overruled' => 'Overruled',
        ];
    }

     public static function primaryKey()
    {
        return ['case_id'];
    }
    
}
