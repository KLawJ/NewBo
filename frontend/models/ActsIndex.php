<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IcoActsIndex;

/**
 * ActsIndex represents the model behind the search form about `common\models\IcoActsIndex`.
 */
class ActsIndex extends IcoActsIndex
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_id', 'enabled'], 'integer'],
            [['act_id', 'chapter', 'section', 'updatedon'], 'safe'],
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
        $query = IcoActsIndex::find();

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
            'a_id' => $this->a_id,
            'updatedon' => $this->updatedon,
            'enabled' => $this->enabled,
        ]);

        $query->andFilterWhere(['like', 'act_id', $this->act_id])
            ->andFilterWhere(['like', 'chapter', $this->chapter])
            ->andFilterWhere(['like', 'section', $this->section]);

        return $dataProvider;
    }
}
