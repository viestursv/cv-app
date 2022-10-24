<?php

namespace app\models;

use yii\db\ActiveRecord;

class CvEducationData extends ActiveRecord
{
    const FINISHED = 'PABEIGTAS';
    const STOPPED = 'PĀRTRAUKTAS';
    const STUDYING = 'MĀCĀS';
    const STATUS = [CvEducationData::FINISHED, CvEducationData::STOPPED, CvEducationData::STUDYING];

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['institution_name','faculty','study_programme','education_level','status','years_studied', 'status'], 
                'default', 'value' => null],
            [['institution_name','faculty','study_programme','education_level'],'string', 'max' => 50, 
                'tooLong' => 'Ievadītais teksts ir par garu'],
            [['status'], 'in', 'range' => CvEducationData::STATUS, 'message' => 'Kļūda izvēlētajā statusā'],
            [['years_studied'], 'number', 'max' => 10, 'tooBig' => 'Gadu skaits nevar pārsniegt 10', 'message' => 'Gadu skaitam jābūt ciparu formā'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'institution_name' => 'Izglītības iestādes nosaukums',
            'faculty' => 'Fakultāte',
            'study_programme' => 'Studiju programma',
            'education_level' => 'Izglītības līmenis',
            'status' => 'Statuss',
            'years_studied' => 'Pavadītais laiks (gadi)',
        ];
    }

    public function getCvPersonalInfo()
    {
        return $this->hasOne(CvPersonalInfo::class, ['cv_personal_info_id' => 'id']);
    }

}