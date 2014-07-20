<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zajavki;

/**
 * ZajavkiSearch represents the model behind the search form about `app\models\Zajavki`.
 */
class ZajavkiSearch extends Zajavki
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idZajavki', 'securety_users_id_dest', 'securety_users_id_sours'], 'integer'],
            [['Status', 'Vrema_Dobavl', 'Vrema_podtv', 'userDest.Name', 'userSours.Name', 'sumZajav'], 'safe'],
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


    public $sumZajav;

    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['userDest.Name','userSours.Name']);
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
        $query = Zajavki::find();

        $subQuery = TovariVZayav::find()
            ->select('Zajavki_idZajavki, SUM(CountTov*Cena) as sum_zajav')
            ->groupBy('Zajavki_idZajavki');

        $query->leftJoin(['sumZajav' => $subQuery], 'sumZajav.Zajavki_idZajavki = idZajavki');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        /*Добавление сортировки по связаным полям*/
        $query->JoinWith(['userDest' => function($query) {
                             $query->from(['userDest' => 'securety_users']);
                              },
                          'userSours' => function($query) {
                             $query->from(['userSours' => 'securety_users']);
                              },
                         //  'sumZajav' => $subQuery
            ]);
        $dataProvider->sort->attributes['userDest.Name'] = [
            'asc' => ['userDest.Name' => SORT_ASC],
            'desc' => ['userDest.Name' => SORT_DESC],
        ];
         $dataProvider->sort->attributes['userSours.Name']=[
             'asc' => ['userSours.Name' => SORT_ASC],
             'desc' => ['userSours.Name' => SORT_DESC],
         ];

        $dataProvider->sort->attributes['sumZajav']=[
            'asc' => ['sumZajav.sum_zajav' => SORT_ASC],
            'desc' => ['sumZajav.sum_zajav' => SORT_DESC],
        ];


        /*Конец добавление сортировки по связаным полям*/


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $query->andFilterWhere([
            'idZajavki' => $this->idZajavki,
            'securety_users_id_dest' => $this->securety_users_id_dest,
            'securety_users_id_sours' => $this->securety_users_id_sours,
            'Vrema_Dobavl' => $this->Vrema_Dobavl,
            'Vrema_podtv' => $this->Vrema_podtv,
        ]);


        $query->andFilterWhere(['like', 'Status', $this->Status])
              ->andFilterWhere(['like','userDest.Name', $this->getAttribute('userDest.Name')])
              ->andFilterWhere(['like','userSours.Name', $this->getAttribute('userSours.Name')]);

      if($this->sumZajav!=''){
          $query->andWhere(['sumZajav.sum_zajav'=>$this->sumZajav]);
      }



        return $dataProvider;
    }
}
