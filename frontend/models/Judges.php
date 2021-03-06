<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblJudges;

/**
 * Judges represents the model behind the search form about `common\models\TblJudges`.
 */
class Judges extends TblJudges
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judge_id', 'court_id', ], 'integer'],
            [['judge_name'], 'safe'],
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
        $query = TblJudges::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'judge_id' => $this->judge_id,
            'court_id' => $this->court_id,
            'j_label' => $this->j_label,
         
        ]);

        $query->andFilterWhere(['like', 'judge_name', $this->judge_name]);

        return $dataProvider;
    }
}
