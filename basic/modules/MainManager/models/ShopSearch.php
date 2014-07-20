<?php

namespace app\modules\MainManager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\MainManager\models\Shop;

/**
 * ShopSearch represents the model behind the search form about `app\modules\MainManager\models\Shop`.
 */
class ShopSearch extends Shop
{
    public $manager;
    public function rules()
    {
        return [
            [['id', 'id_Admin'], 'integer'],
            [['Opisanie', 'Region','manager'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Shop::find()->joinWith('manager');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {

            return $dataProvider;

        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_Admin' => $this->id_Admin,
        ]);

        $query->andFilterWhere(['like', 'Opisanie', $this->Opisanie])
            ->andFilterWhere(['like', 'Region', $this->Region]);


        return $dataProvider;
    }
}
