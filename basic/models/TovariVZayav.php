<?php

namespace app\models;

use app\modules\MainManager\models\Tovari;
use Yii;

/**
 * This is the model class for table "tovari_v_zayav".
 *
 * @property integer $idtovariVZalav
 * @property string $CountTov
 * @property double $Cena
 * @property integer $Zajavki_idZajavki
 * @property integer $tovari_idtovari
 */
class TovariVZayav extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tovari_v_zayav';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CountTov', 'Zajavki_idZajavki', 'tovari_idtovari'], 'integer'],
            [['Cena'], 'number'],
            [['Zajavki_idZajavki', 'tovari_idtovari'], 'required'],


        ];
    }





    /**
     * @var User property contain Summa from possition(ненадо незнаю почему)
     */
   // public $sumPos;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtovariVZalav' => 'Idtovari Vzalav',
            'CountTov' => 'Количество',
            'Cena' => 'Цена',
            'Zajavki_idZajavki' => 'Zajavki Id Zajavki',
            'tovari_idtovari' => 'Tovari Idtovari',
            'attribTovar' =>'Наименование',
            'sumPos'=>'Сумма по позиции'

        ];
    }

    public function getAttribTovar(){

        return $this->hasOne(Tovari::className(),['idtovari'=>'tovari_idtovari']);
    }
  //  public $sumPos;

    public function getSumPos(){
        return $this->Cena*$this->CountTov;
    }


}
