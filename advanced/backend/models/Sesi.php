<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sesi".
 *
 * @property int $S_ID
 * @property int $C_ID
 * @property string $S_KETERANGAN
 *
 * @property Berita[] $beritas
 * @property ConfigSoal[] $configSoals
 * @property Pada[] $padas
 * @property Jadwal[] $us
 * @property ConfigSoal $c
 */
class Sesi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sesi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['S_ID'], 'required'],
            [['S_ID', 'C_ID'], 'integer'],
            [['S_KETERANGAN'], 'safe'],
            [['S_ID'], 'unique'],
            [['C_ID'], 'exist', 'skipOnError' => true, 'targetClass' => ConfigSoal::className(), 'targetAttribute' => ['C_ID' => 'C_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'S_ID' => 'S ID',
            'C_ID' => 'C ID',
            'S_KETERANGAN' => 'S Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeritas()
    {
        return $this->hasMany(Berita::className(), ['S_ID' => 'S_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfigSoals()
    {
        return $this->hasMany(ConfigSoal::className(), ['S_ID' => 'S_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadas()
    {
        return $this->hasMany(Pada::className(), ['S_ID' => 'S_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUs()
    {
        return $this->hasMany(Jadwal::className(), ['U_ID' => 'U_ID'])->viaTable('pada', ['S_ID' => 'S_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(ConfigSoal::className(), ['C_ID' => 'C_ID']);
    }
}
