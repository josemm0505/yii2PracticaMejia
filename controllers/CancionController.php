<?php

namespace app\controllers;

use Yii;
use app\models\Cancion;
use app\models\CancionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CancionController implements the CRUD actions for Cancion model.
 */
class CancionController extends Controller
{
    /**
     * @inheritDoc
     */
       public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions'=>['index'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions'=>['index', 'view', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role == 'admin';
                        }
                    ]
                ],
            ],
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cancion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CancionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cancion model.
     * @param int $idcancion Idcancion
     * @param int $album_idalbum Album Idalbum
     * @param int $album_artista_idartista Album Artista Idartista
     * @param int $genero_idgenero Genero Idgenero
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idcancion, $album_idalbum, $album_artista_idartista, $genero_idgenero)
    {
        return $this->render('view', [
            'model' => $this->findModel($idcancion, $album_idalbum, $album_artista_idartista, $genero_idgenero),
        ]);
    }

    /**
     * Creates a new Cancion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cancion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idcancion' => $model->idcancion, 'album_idalbum' => $model->album_idalbum, 'album_artista_idartista' => $model->album_artista_idartista, 'genero_idgenero' => $model->genero_idgenero]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cancion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idcancion Idcancion
     * @param int $album_idalbum Album Idalbum
     * @param int $album_artista_idartista Album Artista Idartista
     * @param int $genero_idgenero Genero Idgenero
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idcancion, $album_idalbum, $album_artista_idartista, $genero_idgenero)
    {
        $model = $this->findModel($idcancion, $album_idalbum, $album_artista_idartista, $genero_idgenero);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcancion' => $model->idcancion, 'album_idalbum' => $model->album_idalbum, 'album_artista_idartista' => $model->album_artista_idartista, 'genero_idgenero' => $model->genero_idgenero]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cancion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idcancion Idcancion
     * @param int $album_idalbum Album Idalbum
     * @param int $album_artista_idartista Album Artista Idartista
     * @param int $genero_idgenero Genero Idgenero
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idcancion, $album_idalbum, $album_artista_idartista, $genero_idgenero)
    {
        $this->findModel($idcancion, $album_idalbum, $album_artista_idartista, $genero_idgenero)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cancion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idcancion Idcancion
     * @param int $album_idalbum Album Idalbum
     * @param int $album_artista_idartista Album Artista Idartista
     * @param int $genero_idgenero Genero Idgenero
     * @return Cancion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idcancion, $album_idalbum, $album_artista_idartista, $genero_idgenero)
    {
        if (($model = Cancion::findOne(['idcancion' => $idcancion, 'album_idalbum' => $album_idalbum, 'album_artista_idartista' => $album_artista_idartista, 'genero_idgenero' => $genero_idgenero])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
