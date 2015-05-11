<?php

namespace app\modules\b2b\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\b2b\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `app\modules\b2b\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProdId', 'ProdName', 'ProdAcronym', 'RowVer'], 'safe'],
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
        $query = Products::find();

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

        $query->andFilterWhere(['like', 'ProdId', $this->ProdId])
            ->andFilterWhere(['like', 'ProdName', $this->ProdName])
            ->andFilterWhere(['like', 'ProdAcronym', $this->ProdAcronym]);

        return $dataProvider;
    }
}
