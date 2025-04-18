<?php

namespace app\controllers;

use app\models\Artista;
use app\models\ArtistaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtistaController implements the CRUD actions for Artista model.
 */
class ArtistaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Artista models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArtistaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Artista model.
     * @param int $idartista Idartista
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idartista)
    {
        return $this->render('view', [
            'model' => $this->findModel($idartista),
        ]);
    }

    /**
     * Creates a new Artista model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Artista();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idartista' => $model->idartista]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Artista model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idartista Idartista
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idartista)
    {
        $model = $this->findModel($idartista);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idartista' => $model->idartista]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Artista model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idartista Idartista
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idartista)
    {
        $this->findModel($idartista)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Artista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idartista Idartista
     * @return Artista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idartista)
    {
        if (($model = Artista::findOne(['idartista' => $idartista])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
