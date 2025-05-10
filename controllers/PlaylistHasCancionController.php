<?php

namespace app\controllers;

use app\models\PlaylistHasCancion;
use app\models\PlaylistHasCancionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlaylistHasCancionController implements the CRUD actions for PlaylistHasCancion model.
 */
class PlaylistHasCancionController extends Controller
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
     * Lists all PlaylistHasCancion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlaylistHasCancionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlaylistHasCancion model.
     * @param int $playlist_idplaylist Playlist Idplaylist
     * @param int $cancion_idcancion Cancion Idcancion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($playlist_idplaylist, $cancion_idcancion)
    {
        return $this->render('view', [
            'model' => $this->findModel($playlist_idplaylist, $cancion_idcancion),
        ]);
    }

    /**
     * Creates a new PlaylistHasCancion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PlaylistHasCancion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'playlist_idplaylist' => $model->playlist_idplaylist, 'cancion_idcancion' => $model->cancion_idcancion]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PlaylistHasCancion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $playlist_idplaylist Playlist Idplaylist
     * @param int $cancion_idcancion Cancion Idcancion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($playlist_idplaylist, $cancion_idcancion)
    {
        $model = $this->findModel($playlist_idplaylist, $cancion_idcancion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'playlist_idplaylist' => $model->playlist_idplaylist, 'cancion_idcancion' => $model->cancion_idcancion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PlaylistHasCancion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $playlist_idplaylist Playlist Idplaylist
     * @param int $cancion_idcancion Cancion Idcancion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($playlist_idplaylist, $cancion_idcancion)
    {
        $this->findModel($playlist_idplaylist, $cancion_idcancion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PlaylistHasCancion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $playlist_idplaylist Playlist Idplaylist
     * @param int $cancion_idcancion Cancion Idcancion
     * @return PlaylistHasCancion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($playlist_idplaylist, $cancion_idcancion)
    {
        if (($model = PlaylistHasCancion::findOne(['playlist_idplaylist' => $playlist_idplaylist, 'cancion_idcancion' => $cancion_idcancion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
