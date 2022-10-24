<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use app\models\CvPersonalInfo;

class CvListController extends Controller
{
    public function actionIndex()
    {
        $query = CvPersonalInfo::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $cv_results = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'cv_results' => $cv_results,
            'pagination' => $pagination,
        ]);
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        
        if ($request->get('id') && is_numeric($request->get('id'))) {
            $cv_personal_info = CvPersonalInfo::findOne($request->get('id'));

            if (!$cv_personal_info) {
                throw new NotFoundHttpException("The record was not found.");
            }
            $cv_personal_info->delete();
        }

        if (!$cv_personal_info->delete()) {
            Yii::$app->session->setFlash('cvDeleteSuccess');
        } else {
            Yii::$app->session->setFlash('cvDeleteError');
        }
        return $this->redirect(['/cv-list']);

    }
    
}