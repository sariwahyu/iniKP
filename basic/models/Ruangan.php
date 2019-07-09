<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ruangan".
 *
 * @property int $R_ID
 * @property int $U_ID
 * @property string $R_LOKASI
 *
 * @property Peserta[] $pesertas
 * @property Jadwal $u
 */
class Ruangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ruangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['R_ID'], 'required'],
            [['R_ID', 'U_ID'], 'integer'],
            [['R_LOKASI'], 'string', 'max' => 100],
            [['R_ID'], 'unique'],
            [['U_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['U_ID' => 'U_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'R_ID' => 'R ID',
            'U_ID' => 'U ID',
            'R_LOKASI' => 'R Lokasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertas()
    {
        return $this->hasMany(Peserta::className(), ['R_ID' => 'R_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(Jadwal::className(), ['U_ID' => 'U_ID']);
    }
}
