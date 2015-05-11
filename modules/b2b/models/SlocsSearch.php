<?php

namespace app\modules\b2b\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\b2b\models\Slocs;

/**
 * SlocsSearch represents the model behind the search form about `app\modules\b2b\models\Slocs`.
 */
class SlocsSearch extends Slocs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SLoc', 'Description'], 'safe'],
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
        $query = Slocs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'RowVer' => $this->RowVer,
        ]);

        $query->andFilterWhere(['like', 'SLoc', $this->SLoc])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
}
