<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use app\models\CvPersonalInfo;
use app\models\CvEducationData;
use app\models\CvEmploymentHistory;
use app\models\CvSkillsAndAchievements;
use app\models\CvAddress;


class CvFormController extends Controller
{
    public function actionCreate()
    {
        $related_models_array = [
            'education_models' => [new CvEducationData(), new CvEducationData()],
            'address_models' => [new CvAddress(), new CvAddress()],
            'employment_models' => [new CvEmploymentHistory(), new CvEmploymentHistory()],
            'skills_and_achievemements_models' => [new CvSkillsAndAchievements(), new CvSkillsAndAchievements()]
        ];

        // Save main record
        $cv_personal_info = new CvPersonalInfo();
        if ($cv_personal_info->load(Yii::$app->request->post())) {

            if (!$cv_personal_info->save()) {
                Yii::$app->session->setFlash('cvSaveError');

                return $this->render('form', [
                    'error' => 'CV saglabāšanā notikusi kļūda',
                    'cv_personal_info' => $cv_personal_info,
                    ...$related_models_array
                ]);
            }

            foreach ($related_models_array as $related_models) {
                if ($related_models[0]::loadMultiple($related_models, Yii::$app->request->post())) {
                    foreach ($related_models as $related_model) {
                        $related_model->cv_personal_info_id = $cv_personal_info->id;
                        $related_model->save();
                    }
                }
            }
            Yii::$app->session->setFlash('cvFormSubmitted');
        }

        return $this->render('form', [
            'cv_personal_info' => $cv_personal_info,
            ...$related_models_array
        ]);
    }

    public function actionEdit()
    {
        $request = Yii::$app->request;
        
        if ($request->get('id') && is_numeric($request->get('id'))) {
            $cv_personal_info = CvPersonalInfo::findOne($request->get('id'));
            if (!$cv_personal_info) {
                throw new NotFoundHttpException("The record was not found.");
            }
        }

        $related_models_array = [
            'education_models' => $cv_personal_info->cvEducationData,
            'employment_models' => $cv_personal_info->cvEmploymentHistory,
            'skills_and_achievemements_models' => $cv_personal_info->cvSkillsAndAchievements,
            'address_models' => $cv_personal_info->cvAddress
        ];

        
        if($cv_personal_info->load(Yii::$app->request->post())){
            if (!$cv_personal_info->save()) {
                Yii::$app->session->setFlash('cvSaveError');

                return $this->render('form', [
                    'error' => 'CV saglabāšanā notikusi kļūda',
                    $cv_personal_info, 
                    ...$related_models_array
                ]);
            }
            
            foreach ($related_models_array as $related_models) {
                if ($related_models[0]::loadMultiple($related_models, Yii::$app->request->post())) {
                    foreach ($related_models as $related_model) {
                        $related_model->save();
                    }
                }
            }
    
            Yii::$app->session->setFlash('cvFormSubmitted');
        }
        
        return $this->render('form', ['cv_personal_info' => $cv_personal_info, ...$related_models_array]);
    }

    
}