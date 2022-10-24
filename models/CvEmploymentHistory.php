<?php

namespace app\models;

use yii\db\ActiveRecord;

class CvEmploymentHistory extends ActiveRecord
{

    public function rules()
    {
        return [
            [['company_name','position','employment_type','years_worked'], 'default', 'value' => null],
            [['company_name','position','employment_type'],'string', 'max' => 50, 'tooLong' => 'Ievadītais teksts ir par garu'],
            [['years_worked'], 'number', 'max' => 50, 'tooBig' => 'Gadu skaits nevar pārsniegt 50', 'message' => 'Gadu skaitam jābūt ciparu formā'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'company_name' => 'Darba vietas nosaukums',
            'position' => 'Ieņemamais amats',
            'employment_type' => 'Slodzes apmērs',
            'years_worked' => 'Stāžs (gadi)',
        ];
    }

    public function getCvPersonalInfo()
    {
        return $this->hasOne(CvPersonalInfo::class, ['cv_personal_info_id' => 'id']);
    }

}