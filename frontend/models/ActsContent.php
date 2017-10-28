<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IcoActsContent;

/**
 * ActsContent represents the model behind the search form about `common\models\IcoActsContent`.
 */
class ActsContent extends IcoActsContent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['act_id'], 'integer'],
            [['act_content'], 'safe'],
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
        $query = IcoActsContent::find();

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
            'act_id' => $this->act_id,
        ]);

        $query->andFilterWhere(['like', 'act_content', $this->act_content]);

        return $dataProvider;
    }
}
