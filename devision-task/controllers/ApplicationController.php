<?php

namespace app\controllers;

use app\models\Plot;
use app\models\PlotForm;
use app\models\Tractor;
use app\models\TractorForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;


/**
 * ApplicationController implements the CRUD actions for Plot model.
 */
class ApplicationController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    return $this->goHome();
                },
                'only' => ['index', 'create-tractor', 'create-plot'],
                'rules' => [
                    [
                        'actions' => ['index', 'create-tractor', 'create-plot'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateTractor()
    {
        $model = new TractorForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->createTractor(new Tractor())) {
                Yii::$app->FlashMessage->setMessage('createTractor', 'Successfully create tractor');
                $this->redirect(['index']);
            }
        }

        return $this->render('createTractor', [
            'model' => $model
        ]);
    }

    public function actionCreatePlot()
    {
        $model = new PlotForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->createPlot(new Plot())) {
                Yii::$app->FlashMessage->setMessage('createPlot', 'Successfully create plot');
                $this->redirect(['index']);
            }
        }

        return $this->render('createPlot', [
            'model' => $model
        ]);
    }
}
