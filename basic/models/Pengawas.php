<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengawas".
 *
 * @property int $PEN_ID
 * @property string $PEN_USERNAME
 * @property string $PEN_PASSWORD
 *
 * @property Beritum[] $berita
 */
class Pengawas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengawas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PEN_ID'], 'required'],
            [['PEN_ID'], 'integer'],
            [['PEN_USERNAME', 'PEN_PASSWORD'], 'string', 'max' => 100],
            [['PEN_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PEN_ID' => 'Pen ID',
            'PEN_USERNAME' => 'Pen Username',
            'PEN_PASSWORD' => 'Pen Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBerita()
    {
        return $this->hasMany(Beritum::className(), ['PEN_ID' => 'PEN_ID']);
    }
}
