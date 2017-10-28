<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblCases as TblCasesModel;

/**
 * TblCases represents the model behind the search form about `common\models\TblCases`.
 */
class TblCases extends TblCasesModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_id', 'court_id', 'oldCaseID', 'CD', 'HN', 'JD', 'QC', 'PB', 'overruled'], 'integer'],
            [['strCaseType', 'case_no', 'judgement_dt', 'strPartyType', 'strOppPartyType', 'strPartyAName', 'strPartyBName', 'strParties', 'strPartyALawyer', 'strPartyBLawyer', 'strAdvocate', 'strAppearingLawyers', 'strJudges', 'headnote_content', 'citation', 'strReferredCitation', 'strAmicuscurie', 'strJudgementData', 'strFileName', 'strEquivalentCitation', 'lastupdated', 'remarks', 'shorthead', 'nhn', 'reporters', 'ico_reported', 'klj_reported', 'alignment', 'links', 'languages', 'img_table', 'scan', 'source', 'judgement', 'proof1', 'proof2', 'reject', 'hlinks'], 'safe'],
            [['isNew'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblCasesModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
          'sort'=> ['defaultOrder' => ['lastupdated' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'case_id' => $this->case_id,
            'court_id' => $this->court_id,
            'judgement_dt' => $this->judgement_dt,
            'isNew' => $this->isNew,
            'oldCaseID' => $this->oldCaseID,
            'lastupdated' => $this->lastupdated,
            'CD' => $this->CD,
            'HN' => $this->HN,
            'JD' => $this->JD,
            'QC' => $this->QC,
            'PB' => $this->PB,
            'overruled' => $this->overruled,
        ]);

        $query->andFilterWhere(['like', 'strCaseType', $this->strCaseType])
            ->andFilterWhere(['like', 'case_no', $this->case_no])
     
            ->andFilterWhere(['like', 'strPartyType', $this->strPartyType])
            ->andFilterWhere(['like', 'strOppPartyType', $this->strOppPartyType])
            ->andFilterWhere(['like', 'strPartyAName', $this->strPartyAName])
            ->andFilterWhere(['like', 'strPartyBName', $this->strPartyBName])
            ->andFilterWhere(['like', 'strParties', $this->strParties])
         //  ->andFilterWhere(['strParties'=> $this->strParties])
            ->andFilterWhere(['like', 'strPartyALawyer', $this->strPartyALawyer])
            ->andFilterWhere(['like', 'strPartyBLawyer', $this->strPartyBLawyer])
            ->andFilterWhere(['like', 'strAdvocate', $this->strAdvocate])
            ->andFilterWhere(['like', 'strAppearingLawyers', $this->strAppearingLawyers])
            ->andFilterWhere(['like', 'strJudges', $this->strJudges])
            ->andFilterWhere(['like', 'headnote_content', $this->headnote_content])
           // ->andFilterWhere(['like', 'citation', $this->citation])
              ->andFilterWhere([ 'citation'=> $this->citation])
            ->andFilterWhere(['like', 'strReferredCitation', $this->strReferredCitation])
            ->andFilterWhere(['like', 'strAmicuscurie', $this->strAmicuscurie])
            ->andFilterWhere(['like', 'strJudgementData', $this->strJudgementData])
            ->andFilterWhere(['like', 'strFileName', $this->strFileName])
            ->andFilterWhere(['like', 'strEquivalentCitation', $this->strEquivalentCitation])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'shorthead', $this->shorthead])
            ->andFilterWhere(['like', 'nhn', $this->nhn])
            ->andFilterWhere(['like', 'reporters', $this->reporters])
            ->andFilterWhere(['like', 'ico_reported', $this->ico_reported])
            ->andFilterWhere(['like', 'klj_reported', $this->klj_reported])
            ->andFilterWhere(['like', 'alignment', $this->alignment])
            ->andFilterWhere(['like', 'links', $this->links])
            ->andFilterWhere(['like', 'languages', $this->languages])
            ->andFilterWhere(['like', 'img_table', $this->img_table])
            ->andFilterWhere(['like', 'scan', $this->scan])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'judgement', $this->judgement])
            ->andFilterWhere(['like', 'proof1', $this->proof1])
            ->andFilterWhere(['like', 'proof2', $this->proof2])
            ->andFilterWhere(['like', 'reject', $this->reject])
            ->andFilterWhere(['like', 'hlinks', $this->hlinks]);

        return $dataProvider;
    }
}
