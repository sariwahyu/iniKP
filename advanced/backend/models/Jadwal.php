<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jadwal".
 *
 * @property int $U_ID
 * @property int $A_ID
 * @property string $U_TANGGAL
 * @property string $U_DIBUAT
 *
 * @property Admin $a
 * @property Pada[] $padas
 * @property Sesi[] $ss
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
            [['U_ID', 'U_DIBUAT'], 'required'],
            [['U_ID', 'A_ID'], 'integer'],
            [['U_TANGGAL', 'U_DIBUAT'], 'safe'],
            [['U_ID'], 'unique'],
            [['A_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['A_ID' => 'A_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'U_ID' => 'U ID',
            'A_ID' => 'A ID',
            'U_TANGGAL' => 'U Tanggal',
            'U_DIBUAT' => 'U Dibuat',
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
    public function getPadas()
    {
        return $this->hasMany(Pada::className(), ['U_ID' => 'U_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSs()
    {
        return $this->hasMany(Sesi::className(), ['S_ID' => 'S_ID'])->viaTable('pada', ['U_ID' => 'U_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuangans()
    {
        return $this->hasMany(Ruangan::className(), ['U_ID' => 'U_ID']);
    }
}
