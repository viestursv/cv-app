<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\CvEducationData;


class CvPersonalInfo extends ActiveRecord
{

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['name','last_name','phone', 'e_mail'], 'trim'],
            [['name','last_name','phone', 'e_mail'], 'required', 'message' => 'Lauks nevar būt tukšs'],
            ['e_mail', 'email', 'message' => 'E-pasts ievadīts nepareizi'],
            [['name', 'last_name'],'string', 'max' => 32, 'tooLong' => 'Ievadītais teksts ir par garu'],
            [['e_mail'], 'string', 'max' => 50, 'tooLong' => 'Ievadītais teksts ir par garu'],
            [['phone'], 'number', 'max' => 99999999, 'min' => 11111111,
            'tooBig' => 'Tālruņa numurs ir par garu', 'message' => 'Tālrunim jābūt ciparu formātā', 'tooSmall' => 'Tālruņa numurs ir par īsu'],
           
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Vārds',
            'last_name' => 'Uzvārds',
            'e_mail' => 'E-pasts',
            'phone' => 'Tālrunis',
        ];
    }

    public function getCvEducationData()
    {
        return $this->hasMany(CvEducationData::class, ['cv_personal_info_id' => 'id']);
    }

    public function getCvEmploymentHistory()
    {
        return $this->hasMany(CvEmploymentHistory::class, ['cv_personal_info_id' => 'id']);
    }

    public function getCvSkillsAndAchievements()
    {
        return $this->hasMany(CvSkillsAndAchievements::class, ['cv_personal_info_id' => 'id']);
    }

    public function getCvAddress()
    {
        return $this->hasMany(CvAddress::class, ['cv_personal_info_id' => 'id']);
    }
}