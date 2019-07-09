<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property int $K_ID
 * @property int $C_ID
 * @property string $K_NAMA
 *
 * @property Banksoal[] $banksoals
 * @property ConfigSoal[] $configSoals
 * @property ConfigSoal $c
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['K_ID'], 'required'],
            [['K_ID', 'C_ID'], 'integer'],
            [['K_NAMA'], 'string', 'max' => 100],
            [['K_ID'], 'unique'],
            [['C_ID'], 'exist', 'skipOnError' => true, 'targetClass' => ConfigSoal::className(), 'targetAttribute' => ['C_ID' => 'C_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'K_ID' => 'K ID',
            'C_ID' => 'C ID',
            'K_NAMA' => 'K Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanksoals()
    {
        return $this->hasMany(Banksoal::className(), ['K_ID' => 'K_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfigSoals()
    {
        return $this->hasMany(ConfigSoal::className(), ['K_ID' => 'K_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(ConfigSoal::className(), ['C_ID' => 'C_ID']);
    }
}
