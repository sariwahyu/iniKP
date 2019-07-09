<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jadwal".
 *
 * @property int $U_ID
 * @property int $S_ID
 * @property int $A_ID
 * @property string $U_TANGGAL
 *
 * @property Admin $a
 * @property Sesi $s
 * @property Ruangan[] $ruangans
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['U_ID'], 'required'],
            [['U_ID', 'S_ID', 'A_ID'], 'integer'],
            [['U_TANGGAL'], 'safe'],
            [['U_ID'], 'unique'],
            [['A_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['A_ID' => 'A_ID']],
            [['S_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Sesi::className(), 'targetAttribute' => ['S_ID' => 'S_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'U_ID' => 'U ID',
            'S_ID' => 'S ID',
            'A_ID' => 'A ID',
            'U_TANGGAL' => 'U Tanggal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getA()
    {
        return $this->hasOne(Admin::className(), ['A_ID' => 'A_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS()
    {
        return $this->hasOne(Sesi::className(), ['S_ID' => 'S_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuangans()
    {
        return $this->hasMany(Ruangan::className(), ['U_ID' => 'U_ID']);
    }
}
