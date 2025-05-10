<?php

namespace app\controllers;

use Yii;
use app\models\Album;
use app\models\AlbumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * AlbumController implements the CRUD actions for Album model.
 */
class AlbumController extends Controller
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
     * Lists all Album models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlbumSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Album model.
     * @param int $idalbum Idalbum
     * @param int $artista_idartista Artista Idartista
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idalbum, $artista_idartista)
    {
        return $this->render('view', [
            'model' => $this->findModel($idalbum, $artista_idartista),
        ]);
    }

    /**
     * Creates a new Album model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

     public function actionCreate()
     {
         $model = new Album();
         $message = '';
     
         if ($this->request->isPost) {
             $transaction = Yii::$app->db->beginTransaction();
     
             try {
                 if ($model->load($this->request->post())) {
                     $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
     
                     // Si no se sube imagen, usar una por defecto
                     if (!$model->imageFile) {
                         $model->portadaAlbum = 'default.jpg'; // Asegúrate que exista en /web/portadas/
                     }
     
                     // Guardar el modelo primero para obtener el ID
                     if ($model->save(false)) {
                         // Si hay imagen, subirla
                         if ($model->imageFile && !$model->upload()) {
                             throw new \Exception('Error al subir la imagen.');
                         }
     
                         $transaction->commit();
                         Yii::$app->session->setFlash('success', 'Álbum creado correctamente.');
                         return $this->redirect(['view', 'idalbum' => $model->idalbum, 'artista_idartista' => $model->artista_idartista]);
                     } else {
                         throw new \Exception('Error al guardar el álbum.');
                     }
                 }
             } catch (\Exception $e) {
                 $transaction->rollBack();
                 Yii::error($e->getMessage(), __METHOD__); // Guarda el error en el log
                 Yii::$app->session->setFlash('error', 'Ocurrió un error inesperado: ' . $e->getMessage());
             }
         } else {
             $model->loadDefaultValues();
         }
     
         return $this->render('create', [
             'model' => $model,
             'message' => $message
         ]);
     }
     
    /**
     * Updates an existing Album model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idalbum Idalbum
     * @param int $artista_idartista Artista Idartista
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($idalbum, $artista_idartista)
    {
        $model = $this->findModel($idalbum, $artista_idartista);
        $message = '';

        if($this -> request -> isPost && $model -> load($this -> request -> post())){
            $model -> imageFile = UploadedFile::getInstance($model, 'imageFile');

            if($model -> save() && (!$model ->imageFile || $model-> upload())){
                return $this->redirect(['view', 'idalbum' => $model->idalbum, 'artista_idartista' => $model->artista_idartista]);
            }else{
                Yii::$app->session->setFlash('error', 'Error al guardar la portada');
                $message = 'Error al guardar la portada'; 
            }
        }

        return $this->render('update', [
            'model' => $model,
            'message' => $message
        ]);
    }

    /**
     * Deletes an existing Album model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idalbum Idalbum
     * @param int $artista_idartista Artista Idartista
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idalbum, $artista_idartista)
    {
        $model = $this->findModel($idalbum, $artista_idartista);
        $model -> deletePortada();
        $model -> delete();
            return $this->redirect(['index']);
    }

    /**
     * Finds the Album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idalbum Idalbum
     * @param int $artista_idartista Artista Idartista
     * @return Album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idalbum, $artista_idartista)
    {
        if (($model = Album::findOne(['idalbum' => $idalbum, 'artista_idartista' => $artista_idartista])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
