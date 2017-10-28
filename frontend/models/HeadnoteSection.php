<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IcoHeadnoteSection;

/**
 * HeadnoteSection represents the model behind the search form about `common\models\IcoHeadnoteSection`.
 */
class HeadnoteSection extends IcoHeadnoteSection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'headnote_id', 'subject_id', 'section_id', 'value_1', 'value_2', 'value_3'], 'integer'],
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
        $query = IcoHeadnoteSection::find();

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
            'headnote_id' => $this->headnote_id,
            'subject_id' => $this->subject_id,
            'section_id' => $this->section_id,
            'value_1' => $this->value_1,
            'value_2' => $this->value_2,
            'value_3' => $this->value_3,
        ]);

        return $dataProvider;
    }
}
