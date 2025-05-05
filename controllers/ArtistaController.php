<?php

namespace app\controllers;

use Yii;
use app\models\Artista;
use app\models\ArtistaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        $message = '';
    
        if ($this->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
    
            try {
                if ($model->load($this->request->post())) {
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
    
                    // Si no se sube imagen, usar una por defecto
                    if (!$model->imageFile) {
                        $model->imagenArtista = 'default.jpg'; // Asegúrate que exista en /web/portadas/
                    }
    
                    // Guardar el modelo primero para obtener el ID
                    if ($model->save(false)) {
                        // Si hay imagen, subirla
                        if ($model->imageFile && !$model->upload()) {
                            throw new \Exception('Error al subir la imagen.');
                        }
    
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', 'Álbum creado correctamente.');
                        return $this->redirect(['view', 'idartista' => $model->idartista]);
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
     * Updates an existing Artista model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idartista Idartista
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idartista)
    {
        $model = $this->findModel($idartista);
        $message = '';

        if($this -> request -> isPost && $model -> load($this -> request -> post())){
            $model -> imageFile = UploadedFile::getInstance($model, 'imageFile');

            if($model -> save() && (!$model ->imageFile || $model-> upload())){
                return $this->redirect(['view', 'idartista' => $model->idartista]);
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
     * Deletes an existing Artista model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idartista Idartista
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idartista)
    {
        $model = $this->findModel($idartista);
        $model -> deleteArtista();
        $model -> delete();
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
