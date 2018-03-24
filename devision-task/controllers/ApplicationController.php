<?php

namespace app\controllers;

use app\models\Plot;
use app\models\PlotForm;
use app\models\PlotTractor;
use app\models\Tractor;
use app\models\TractorForm;
use app\models\TreatedParcelForm;
use app\models\TreatedParcelSearch;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
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

    public function actionTreatedParcel()
    {
        $allTractors = ArrayHelper::map(Tractor::find()->asArray()->all(), 'id', 'name');
        $allPlots = Plot::getPlotsInfoDropDown();

        $model = new TreatedParcelForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->date = Yii::$app->formatter->asDatetime($model->date, 'php:Y-m-d H:i:s');
            if ($model->addData(new PlotTractor())) {
                Yii::$app->FlashMessage->setMessage('plotTractorData', 'Successfully add application data');
                $this->redirect(['index']);
            }
        }

        return $this->render('treatedParcel', [
            'model' => $model,
            'allTractors' => $allTractors,
            'allPlots' => $allPlots
        ]);
    }

    public function actionTreatedParcelData()
    {
        $searchModel = new TreatedParcelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('treatedParcelData', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
