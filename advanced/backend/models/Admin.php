<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $A_ID
 * @property string $A_USERNAME
 * @property string $A_PASSWORD
 *
 * @property Jadwal[] $jadwals
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['A_ID'], 'required'],
            [['A_ID'], 'integer'],
            [['A_USERNAME', 'A_PASSWORD'], 'string', 'max' => 100],
            [['A_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'A_ID' => 'A ID',
            'A_USERNAME' => 'A Username',
            'A_PASSWORD' => 'A Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['A_ID' => 'A_ID']);
    }
}
