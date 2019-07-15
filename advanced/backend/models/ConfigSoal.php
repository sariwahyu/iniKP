<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "config_soal".
 *
 * @property int $C_ID
 * @property int $K_ID
 * @property int $S_ID
 * @property int $C_JUMLAH
 *
 * @property Sesi $s
 * @property Kategori $k
 * @property Kategori[] $kategoris
 */
class ConfigSoal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config_soal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['C_ID'], 'required'],
            [['C_ID', 'K_ID', 'S_ID', 'C_JUMLAH'], 'integer'],
            [['C_ID'], 'unique'],
            [['S_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Sesi::className(), 'targetAttribute' => ['S_ID' => 'S_ID']],
            [['K_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['K_ID' => 'K_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'C_ID' => 'C ID',
            'K_ID' => 'K ID',
            'S_ID' => 'S ID',
            'C_JUMLAH' => 'C Jumlah',
        ];
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
    public function getK()
    {
        return $this->hasOne(Kategori::className(), ['K_ID' => 'K_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategoris()
    {
        return $this->hasMany(Kategori::className(), ['C_ID' => 'C_ID']);
    }
}
