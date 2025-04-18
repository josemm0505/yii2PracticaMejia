<?php

namespace app\controllers;

use app\models\Playlist_Has_Cancion;
use app\models\Playlist_Has_CancionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Playlist_Has_CancionController implements the CRUD actions for Playlist_Has_Cancion model.
 */
class Playlist_Has_CancionController extends Controller
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
     * Lists all Playlist_Has_Cancion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Playlist_Has_CancionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Playlist_Has_Cancion model.
     * @param int $playlist_idplaylist Playlist Idplaylist
     * @param int $playlist_usuario_idusuario Playlist Usuario Idusuario
     * @param int $cancion_idcancion Cancion Idcancion
     * @param int $cancion_album_idalbum Cancion Album Idalbum
     * @param int $cancion_album_artista_idartista Cancion Album Artista Idartista
     * @param int $cancion_genero_idgenero Cancion Genero Idgenero
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($playlist_idplaylist, $playlist_usuario_idusuario, $cancion_idcancion, $cancion_album_idalbum, $cancion_album_artista_idartista, $cancion_genero_idgenero)
    {
        return $this->render('view', [
            'model' => $this->findModel($playlist_idplaylist, $playlist_usuario_idusuario, $cancion_idcancion, $cancion_album_idalbum, $cancion_album_artista_idartista, $cancion_genero_idgenero),
        ]);
    }

    /**
     * Creates a new Playlist_Has_Cancion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Playlist_Has_Cancion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'playlist_idplaylist' => $model->playlist_idplaylist, 'playlist_usuario_idusuario' => $model->playlist_usuario_idusuario, 'cancion_idcancion' => $model->cancion_idcancion, 'cancion_album_idalbum' => $model->cancion_album_idalbum, 'cancion_album_artista_idartista' => $model->cancion_album_artista_idartista, 'cancion_genero_idgenero' => $model->cancion_genero_idgenero]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Playlist_Has_Cancion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $playlist_idplaylist Playlist Idplaylist
     * @param int $playlist_usuario_idusuario Playlist Usuario Idusuario
     * @param int $cancion_idcancion Cancion Idcancion
     * @param int $cancion_album_idalbum Cancion Album Idalbum
     * @param int $cancion_album_artista_idartista Cancion Album Artista Idartista
     * @param int $cancion_genero_idgenero Cancion Genero Idgenero
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($playlist_idplaylist, $playlist_usuario_idusuario, $cancion_idcancion, $cancion_album_idalbum, $cancion_album_artista_idartista, $cancion_genero_idgenero)
    {
        $model = $this->findModel($playlist_idplaylist, $playlist_usuario_idusuario, $cancion_idcancion, $cancion_album_idalbum, $cancion_album_artista_idartista, $cancion_genero_idgenero);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'playlist_idplaylist' => $model->playlist_idplaylist, 'playlist_usuario_idusuario' => $model->playlist_usuario_idusuario, 'cancion_idcancion' => $model->cancion_idcancion, 'cancion_album_idalbum' => $model->cancion_album_idalbum, 'cancion_album_artista_idartista' => $model->cancion_album_artista_idartista, 'cancion_genero_idgenero' => $model->cancion_genero_idgenero]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Playlist_Has_Cancion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $playlist_idplaylist Playlist Idplaylist
     * @param int $playlist_usuario_idusuario Playlist Usuario Idusuario
     * @param int $cancion_idcancion Cancion Idcancion
     * @param int $cancion_album_idalbum Cancion Album Idalbum
     * @param int $cancion_album_artista_idartista Cancion Album Artista Idartista
     * @param int $cancion_genero_idgenero Cancion Genero Idgenero
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($playlist_idplaylist, $playlist_usuario_idusuario, $cancion_idcancion, $cancion_album_idalbum, $cancion_album_artista_idartista, $cancion_genero_idgenero)
    {
        $this->findModel($playlist_idplaylist, $playlist_usuario_idusuario, $cancion_idcancion, $cancion_album_idalbum, $cancion_album_artista_idartista, $cancion_genero_idgenero)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Playlist_Has_Cancion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $playlist_idplaylist Playlist Idplaylist
     * @param int $playlist_usuario_idusuario Playlist Usuario Idusuario
     * @param int $cancion_idcancion Cancion Idcancion
     * @param int $cancion_album_idalbum Cancion Album Idalbum
     * @param int $cancion_album_artista_idartista Cancion Album Artista Idartista
     * @param int $cancion_genero_idgenero Cancion Genero Idgenero
     * @return Playlist_Has_Cancion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($playlist_idplaylist, $playlist_usuario_idusuario, $cancion_idcancion, $cancion_album_idalbum, $cancion_album_artista_idartista, $cancion_genero_idgenero)
    {
        if (($model = Playlist_Has_Cancion::findOne(['playlist_idplaylist' => $playlist_idplaylist, 'playlist_usuario_idusuario' => $playlist_usuario_idusuario, 'cancion_idcancion' => $cancion_idcancion, 'cancion_album_idalbum' => $cancion_album_idalbum, 'cancion_album_artista_idartista' => $cancion_album_artista_idartista, 'cancion_genero_idgenero' => $cancion_genero_idgenero])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
