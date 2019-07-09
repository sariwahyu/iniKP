<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peserta".
 *
 * @property int $PES_ID
 * @property int $R_ID
 * @property string $PES_NAMA
 * @property string $PES_ALAMAT
 * @property string $PES_EMAIL
 * @property string $PES_JURUSAN
 * @property string $PES_USERNAME
 * @property string $PES_PASSWORD
 *
 * @property Ruangan $r
 */
class Peserta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peserta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PES_ID'], 'required'],
            [['PES_ID', 'R_ID'], 'integer'],
            [['PES_NAMA', 'PES_ALAMAT', 'PES_EMAIL', 'PES_JURUSAN', 'PES_USERNAME', 'PES_PASSWORD'], 'string', 'max' => 100],
            [['PES_ID'], 'unique'],
            [['R_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Ruangan::className(), 'targetAttribute' => ['R_ID' => 'R_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PES_ID' => 'Pes ID',
            'R_ID' => 'R ID',
            'PES_NAMA' => 'Pes Nama',
            'PES_ALAMAT' => 'Pes Alamat',
            'PES_EMAIL' => 'Pes Email',
            'PES_JURUSAN' => 'Pes Jurusan',
            'PES_USERNAME' => 'Pes Username',
            'PES_PASSWORD' => 'Pes Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getR()
    {
        return $this->hasOne(Ruangan::className(), ['R_ID' => 'R_ID']);
    }
}
