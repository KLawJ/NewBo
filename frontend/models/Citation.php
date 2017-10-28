<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblCitation;

/**
 * Citation represents the model behind the search form about `common\models\TblCitation`.
 */
class Citation extends TblCitation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['citation_id', 'enabled'], 'integer'],
            [['citation_title', 'citation_format', 'citation_template'], 'safe'],
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
        $query = TblCitation::find();

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
            'citation_id' => $this->citation_id,
            'enabled' => $this->enabled,
        ]);

        $query->andFilterWhere(['like', 'citation_title', $this->citation_title])
            ->andFilterWhere(['like', 'citation_format', $this->citation_format])
            ->andFilterWhere(['like', 'citation_template', $this->citation_template]);

        return $dataProvider;
    }
}
