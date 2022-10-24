<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use app\models\CvPersonalInfo;
use app\models\CvEducationData;
use app\models\CvEmploymentHistory;
use app\models\CvSkillsAndAchievements;
use app\models\CvAddress;

class CvViewController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        
        if ($request->get('id') && is_numeric($request->get('id'))) {
            $selected_cv = CvPersonalInfo::findOne($request->get('id'));
        }
        
        return $this->render('index', [
            'selected_cv' => $selected_cv,
        ]);
    }
}