<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banksoal".
 *
 * @property int $BS_ID
 * @property int $K_ID
 * @property int $J_ID
 * @property string $BS_SOAL
 * @property string $BS_KUNCI
 *
 * @property Kategori $k
 * @property Jawaban $j
 * @property Jawaban[] $jawabans
 */
class Banksoal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banksoal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['BS_ID'], 'required'],
            [['BS_ID', 'K_ID', 'J_ID'], 'integer'],
            [['BS_SOAL'], 'string'],
            [['BS_KUNCI'], 'string', 'max' => 1],
            [['BS_ID'], 'unique'],
            [['K_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['K_ID' => 'K_ID']],
            [['J_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Jawaban::className(), 'targetAttribute' => ['J_ID' => 'J_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'BS_ID' => 'Bs ID',
            'K_ID' => 'K ID',
            'J_ID' => 'J ID',
            'BS_SOAL' => 'Bs Soal',
            'BS_KUNCI' => 'Bs Kunci',
        ];
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
    public function getJ()
    {
        return $this->hasOne(Jawaban::className(), ['J_ID' => 'J_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJawabans()
    {
        return $this->hasMany(Jawaban::className(), ['BS_ID' => 'BS_ID']);
    }
}
