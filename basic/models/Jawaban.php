<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jawaban".
 *
 * @property int $J_ID
 * @property int $BS_ID
 * @property string $J_JAWABAN
 * @property int $J_KOREKSI
 *
 * @property Banksoal[] $banksoals
 * @property Banksoal $bS
 */
class Jawaban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jawaban';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['J_ID'], 'required'],
            [['J_ID', 'BS_ID', 'J_KOREKSI'], 'integer'],
            [['J_JAWABAN'], 'string', 'max' => 1],
            [['J_ID'], 'unique'],
            [['BS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Banksoal::className(), 'targetAttribute' => ['BS_ID' => 'BS_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'J_ID' => 'J ID',
            'BS_ID' => 'Bs ID',
            'J_JAWABAN' => 'J Jawaban',
            'J_KOREKSI' => 'J Koreksi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanksoals()
    {
        return $this->hasMany(Banksoal::className(), ['J_ID' => 'J_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBS()
    {
        return $this->hasOne(Banksoal::className(), ['BS_ID' => 'BS_ID']);
    }
}
