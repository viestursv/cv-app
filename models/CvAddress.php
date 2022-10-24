<?php

namespace app\models;

use yii\db\ActiveRecord;

class CvAddress extends ActiveRecord
{

    public function rules()
    {
        return [
            [['country','zip_code','street','city','number'], 'default', 'value' => null],
            [['country','zip_code','street','city','number'],'string', 'max' => 50, 'tooLong' => 'Ievadītais teksts ir par garu'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'country' => 'Valsts',
            'city' => 'Pilsēta',
            'street' => 'Iela',
            'number' => 'Numurs',
            'zip_code' => 'Pasta indekss',
        ];
    }

    public function getCvPersonalInfo()
    {
        return $this->hasOne(CvPersonalInfo::class, ['cv_personal_info_id' => 'id']);
    }

}