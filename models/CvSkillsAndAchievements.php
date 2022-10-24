<?php

namespace app\models;

use yii\db\ActiveRecord;

class CvSkillsAndAchievements extends ActiveRecord
{
    const PRIMARY_JOB = 'PAMATDARBS';
    const ACHIEVEMENT = 'SASNIEGUMS';
    const EXTRA_SKILL = 'PAPILDUS_PRASME';
    const TYPES = [CvSkillsAndAchievements::ACHIEVEMENT, CvSkillsAndAchievements::PRIMARY_JOB, CvSkillsAndAchievements::EXTRA_SKILL];

    public function rules()
    {
        return [
            [['description','type'], 'default', 'value' => null],
            [['description'],'string', 'max' => 120, 'message' => 'Ievadītais teksts ir par garu'],
            ['type', 'in', 'range' => CvSkillsAndAchievements::TYPES, 'message' => 'Kļūda izvēlētajā prasmju veidā'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'description' => 'Apraksts',
            'type' => 'Prasmju veids',
        ];
    }

    public function getCvPersonalInfo()
    {
        return $this->hasOne(CvPersonalInfo::class, ['cv_personal_info_id' => 'id']);
    }

}