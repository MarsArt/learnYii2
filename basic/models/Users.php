<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "securety_users".
 *
 * @property string $id
 * @property string $Name
 * @property string $Password
 * @property string $Type
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'securety_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'Password'], 'required'],
            [['Type'], 'string'],
            [['Name', 'Password'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Имя',
            'Password' => 'Пароль',
            'Type' => 'Тип пользователя',
        ];
    }
    public static function getListUsers(){

        $query = (new \yii\db\Query());
        $res=$query->select('id, Name')
            ->from('securety_users')->all();
        return ArrayHelper::map($res,'id','Name');
    }
}
