<?php

namespace app\modules\b2b\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\b2b\models\CustomerSLocs;

/**
 * CustomerSLocsSearch represents the model behind the search form about `app\modules\b2b\models\CustomerSLocs`.
 */
class CustomerSLocsSearch extends CustomerSLocs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CustId', 'SLoc', 'RowVer'], 'safe'],
            [['IsActive'], 'integer'],
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
        $query = CustomerSLocs::find();

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
            'IsActive' => $this->IsActive,
            'RowVer' => $this->RowVer,
            'CustId' => $this->CustId=Yii::$app->user->identity->username,
        ]);

        $query->andFilterWhere(['like', 'CustId', $this->CustId])
            ->andFilterWhere(['like', 'SLoc', $this->SLoc]);

        return $dataProvider;
    }
}
