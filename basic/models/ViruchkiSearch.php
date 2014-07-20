<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\SqlDataProvider;
use yii\db\Query;


/**
 * UsersSearch represents the model behind the search form about `app\models\Users`.
 */
class ViruchkiSearch extends Viruchki
{
    public function rules()
    {
        return [
            [['id', 'id_minishop'], 'integer'],
            [['Date'], 'date'],
            [['Coment'], 'string'],
            [['viruchki_Date','minishop_Opisanie','res','securety_users_Name','rash', 'prib'], 'safe']
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['viruchki_Date', 'minishop_Opisanie', 'res','securety_users_Name','rash', 'prib']);
    }


   /* public function search($params)
    {


        $query = Viruchki::find()->innerjoinWith([
            'shop',
            'prodaji' => function ($query) {
                    $query->select('prodaji.*, SUM(CountProd*CenaProd) as sumProd');
                }
        ]);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'Date', $this->Date])
            ->andFilterWhere(['LIKE', 'shop.Opisanie', $this->getAttribute('shop.Opisanie')]);
        return $dataProvider;
    }*/

    /*Метод возвращающий SQLВDataProvider для выручек*/
    public function getSQLProvider($params) {


        $sqlHaving='';
        if (($this->load($params) && $this->validate())) {
//            echo'<hr><br><br><br><br><br><br><br><br><br>';
            foreach($this as $key => $value) {
                if (($sqlHaving)==''and($value!=''))
                    $sqlHaving='(`'.$key.'` LIKE \'%'.$value.'%\')';
                elseif($value!='')
                    $sqlHaving.=' AND (`'.$key.'` LIKE \'%'.$value.'%\')';
        }

        }


            if($sqlHaving!='') $sqlHaving='HAVING '.$sqlHaving;
            echo $sqlHaving;
        $count = Yii::$app->db->createCommand('SELECT COUNT(*),
                                                       `rashodi`.`idRashodi` AS `rashodi_idRashodi`,
                                                       `rashodi`.`id_vir` AS `rashodi_id_vir`,
                                                       `minishop`.`id` AS `minishop_id`,
                                                       `minishop`.`Opisanie` AS `minishop_Opisanie`,
                                                       `securety_users`.`id` AS `securety_users_id`,
                                                       `securety_users`.`Name` AS `securety_users_Name`,
                                                       `viruchki_id`,
                                                       `viruchki_Date`,
                                                       `res`,
                                                        IFNULL(SUM(`val`),0) AS `rash`,
                                                       (IFNULL(`res`,0)-IFNULL(SUM(`val`),0)) AS `prib`
                                               FROM `rashodi`
                                               RIGHT JOIN
                                                               (SELECT `viruchki`.`id` AS `viruchki_id`,
                                                                       `viruchki`.`Date` AS `viruchki_Date`,
                                                                       `viruchki`.`id_minishop` AS `viruchki_id_minishop`,
                                                                       `prodaji`.`idProdaji` AS `prodaji_idProdaji`,
                                                                       `prodaji`.`viruchki_id` AS `prodaji_viruchki_id`,
                                                                       `prodaji`.`tovari_idtovari` AS `prodaji_tovari_idtovari`,
                                                                        SUM(`CountProd`*`CenaProd`) AS `res`
                                                                FROM `viruchki`
                                                                LEFT JOIN `prodaji`
                                                                ON `viruchki`.`id`=`prodaji`.`viruchki_id`
                                                                GROUP BY `prodaji_viruchki_id`) AS `a`
                                               ON `a`.`viruchki_id`=`rashodi`.`id_vir`
                                               LEFT JOIN `minishop` ON `minishop`.`id`=`a`.`viruchki_id_minishop`
                                               LEFT JOIN `securety_users` ON `securety_users`.`id`=`minishop`.`id_Admin`
                                               GROUP BY `prodaji_viruchki_id`'.$sqlHaving)->queryScalar();




        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT `rashodi`.`idRashodi` AS `rashodi_idRashodi`,
                               `rashodi`.`id_vir` AS `rashodi_id_vir`,
                               `minishop`.`id` AS `minishop_id`,
                               `minishop`.`Opisanie` AS `minishop_Opisanie`,
                               `securety_users`.`id` AS `securety_users_id`,
                               `securety_users`.`Name` AS `securety_users_Name`,
                               `viruchki_id`,
                               `viruchki_Date`,
                               `res`,
                                IFNULL(SUM(`val`),0) AS `rash`,
                               (IFNULL(`res`,0)-IFNULL(SUM(`val`),0)) AS `prib`
                      FROM `rashodi`
                      RIGHT JOIN
                                       (SELECT `viruchki`.`id` AS `viruchki_id`,
                                               `viruchki`.`Date` AS `viruchki_Date`,
                                               `viruchki`.`id_minishop` AS `viruchki_id_minishop`,
                                               `prodaji`.`idProdaji` AS `prodaji_idProdaji`,
                                               `prodaji`.`viruchki_id` AS `prodaji_viruchki_id`,
                                               `prodaji`.`tovari_idtovari` AS `prodaji_tovari_idtovari`,
                                                SUM(`CountProd`*`CenaProd`) AS `res`
                                        FROM `viruchki`
                                        LEFT JOIN `prodaji`
                                        ON `viruchki`.`id`=`prodaji`.`viruchki_id`
                                        GROUP BY `prodaji_viruchki_id`) AS `a`
                      ON `a`.`viruchki_id`=`rashodi`.`id_vir`
                      LEFT JOIN `minishop` ON `minishop`.`id`=`a`.`viruchki_id_minishop`
                      LEFT JOIN `securety_users` ON `securety_users`.`id`=`minishop`.`id_Admin`
                      GROUP BY `prodaji_viruchki_id` '.$sqlHaving,
            'totalCount' => $count,
            'key'=>'viruchki_id',
            'sort' => [
                'attributes' => [
                    'minishop_Opisanie',
                    'viruchki_Date',
                    'res',
                    'securety_users_Name',
                    'rash',
                    'prib',
                ],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

     return $dataProvider;

    }

}
