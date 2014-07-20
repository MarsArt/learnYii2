<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "zajavki".
 *
 * @property integer $idZajavki
 * @property string $Status
 * @property string $securety_users_id_dest
 * @property string $securety_users_id_sours
 * @property string $Vrema_Dobavl
 * @property string $Vrema_podtv
 */
class Zajavki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zajavki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Status'], 'string'],
            [['securety_users_id_dest', 'securety_users_id_sours'], 'required'],
            [['securety_users_id_dest', 'securety_users_id_sours'], 'integer'],
            [['Vrema_Dobavl', 'Vrema_podtv','userDest'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idZajavki' => 'Id Zajavki',
            'Status' => 'Статус',
            'securety_users_id_dest' => 'Кому',
            'securety_users_id_sours' => 'От кого',
            'Vrema_Dobavl' => 'Время добавления',
            'Vrema_podtv' => 'Время подтверждения',
            'userDest.Name'=>'Кому',
            'userSours.Name'=>'От кого',
            'sumZajav'=>'Сумма по заявке',
        ];
    }

    public function getUserDest(){
        return $this->hasOne(Users::className(),['id'=>'securety_users_id_dest']);
    }

    public function getUserSours(){
        return $this->hasOne(Users::className(),['id'=>'securety_users_id_sours']);
    }

    public function getContentZajav(){
        return $this->hasMany(TovariVZayavSearch::className(),['Zajavki_idZajavki'=>'idZajavki']);
    }


    public function getSumZajav(){
        return $this->hasMany(TovariVZayav::className(),['Zajavki_idZajavki'=>'idZajavki'])->sum('CountTov*Cena');
    }

    public function getContent(){
        return $this->hasMany(TovariVZayav::className(),['Zajavki_idZajavki'=>'idZajavki']);
    }

}
