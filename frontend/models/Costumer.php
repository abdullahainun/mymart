<?php

/*HAZNA AT THOORIQOH*/

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "costumer".
 *
 * @property integer $id
 * @property string $nama
 * @property string $email
 * @property integer $user_id
 *
 * @property Order $order
 */
class Costumer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'costumer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'email'], 'required'],
            [['user_id'], 'integer'],
            [['nama', 'email'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'email' => Yii::t('app', 'Email'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['customer_id' => 'id']);
    }
}
