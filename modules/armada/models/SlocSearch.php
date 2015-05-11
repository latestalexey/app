<?php

namespace app\modules\armada\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\armada\models\Sloc;

/**
 * SlocSearch represents the model behind the search form about `app\modules\armada\models\Sloc`.
 */
class SlocSearch extends Sloc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'safe'],
       //     [['status', 'create_at', 'updated_at', 'userID'], 'integer'],
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
        $query = Sloc::find();

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
            'status' => $this->status,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'userID' => $this->userID,
            'status' => $this->status=1,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
    
     
}
