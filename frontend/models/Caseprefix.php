<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblCasePrefix;

/**
 * Caseprefix represents the model behind the search form about `common\models\TblCasePrefix`.
 */
class Caseprefix extends TblCasePrefix
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prefix_id', 'court_id'], 'integer'],
            [['prefix_content', 'created_on', 'modified_on'], 'safe'],
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
        $query = TblCasePrefix::find();

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
            'prefix_id' => $this->prefix_id,
            'court_id' => $this->court_id,
            'created_on' => $this->created_on,
            'modified_on' => $this->modified_on,
        ]);

        $query->andFilterWhere(['like', 'prefix_content', $this->prefix_content]);

        return $dataProvider;
    }
}
