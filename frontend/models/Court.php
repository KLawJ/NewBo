<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblCourts;

/**
 * Court represents the model behind the search form about `common\models\TblCourts`.
 */
class Court extends TblCourts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['court_id', 'enabled', 'sort_order'], 'integer'],
            [['court_code', 'court_name'], 'safe'],
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
        $query = TblCourts::find();

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
            'court_id' => $this->court_id,
            'enabled' => $this->enabled,
            'sort_order' => $this->sort_order,
        ]);

        $query->andFilterWhere(['like', 'court_code', $this->court_code])
            ->andFilterWhere(['like', 'court_name', $this->court_name]);

        return $dataProvider;
    }
}
