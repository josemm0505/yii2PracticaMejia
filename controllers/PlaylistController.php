<?php

namespace app\controllers;

use Yii;
use app\models\Playlist;
use app\models\PlaylistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PlaylistController implements the CRUD actions for Playlist model.
 */
class PlaylistController extends Controller
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
     * Lists all Playlist models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlaylistSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Playlist model.
     * @param int $idplaylist Idplaylist
     * @param int $usuario_idusuario Usuario Idusuario
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idplaylist, $usuario_idusuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($idplaylist, $usuario_idusuario),
        ]);
    }

    /**
     * Creates a new Playlist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Playlist();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idplaylist' => $model->idplaylist, 'usuario_idusuario' => $model->usuario_idusuario]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Playlist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idplaylist Idplaylist
     * @param int $usuario_idusuario Usuario Idusuario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idplaylist, $usuario_idusuario)
    {
        $model = $this->findModel($idplaylist, $usuario_idusuario);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idplaylist' => $model->idplaylist, 'usuario_idusuario' => $model->usuario_idusuario]);
        }

        $model-> canciones = ArrayHelper :: getColumn($model -> getCancionIdcancions()->asArray() -> all(), 'idcancion');

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Playlist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idplaylist Idplaylist
     * @param int $usuario_idusuario Usuario Idusuario
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idplaylist, $usuario_idusuario)
    {
        $this->findModel($idplaylist, $usuario_idusuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Playlist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idplaylist Idplaylist
     * @param int $usuario_idusuario Usuario Idusuario
     * @return Playlist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idplaylist, $usuario_idusuario)
    {
        if (($model = Playlist::findOne(['idplaylist' => $idplaylist, 'usuario_idusuario' => $usuario_idusuario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
