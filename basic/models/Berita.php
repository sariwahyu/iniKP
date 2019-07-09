<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property int $B_ID
 * @property int $PEN_ID
 * @property int $S_ID
 * @property int $B_ABSEN
 * @property int $B_CURANG
 * @property string $B_LAIN
 *
 * @property Sesi $s
 * @property Pengawas $pEN
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['B_ID'], 'required'],
            [['B_ID', 'PEN_ID', 'S_ID', 'B_ABSEN', 'B_CURANG'], 'integer'],
            [['B_LAIN'], 'string', 'max' => 1024],
            [['B_ID'], 'unique'],
            [['S_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Sesi::className(), 'targetAttribute' => ['S_ID' => 'S_ID']],
            [['PEN_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Pengawas::className(), 'targetAttribute' => ['PEN_ID' => 'PEN_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'B_ID' => 'B ID',
            'PEN_ID' => 'Pen ID',
            'S_ID' => 'S ID',
            'B_ABSEN' => 'B Absen',
            'B_CURANG' => 'B Curang',
            'B_LAIN' => 'B Lain',
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
    public function getPEN()
    {
        return $this->hasOne(Pengawas::className(), ['PEN_ID' => 'PEN_ID']);
    }
}
