<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IcoSubcontents;

/**
 * Subcontents represents the model behind the search form about `common\models\IcoSubcontents`.
 */
class Subcontents extends IcoSubcontents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'own_id', 'subject_id', 'subs_id'], 'integer'],
            [['contents'], 'safe'],
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
        $query = IcoSubcontents::find();

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
            'id' => $this->id,
            'own_id' => $this->own_id,
            'subject_id' => $this->subject_id,
            'subs_id' => $this->subs_id,
        ]);

        $query->andFilterWhere(['like', 'contents', $this->contents]);

        return $dataProvider;
    }
}
