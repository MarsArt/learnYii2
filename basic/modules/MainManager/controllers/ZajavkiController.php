<?php

namespace app\modules\MainManager\controllers;


use app\models\TovariVZayavSearch;
use Yii;
use app\models\Zajavki;
use app\models\ZajavkiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ZajavkiController implements the CRUD actions for Zajavki model.
 */
class ZajavkiController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Zajavki models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ZajavkiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Zajavki model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $ZajavkaInfo=$this->findModel($id);
        $contentZajavSerch=new TovariVZayavSearch();
        $contentZajavProvider=$contentZajavSerch->searchToShow(Yii::$app->request->queryParams, $id)['dataProvider'];
      /* echo '<hr><br><br><br><br><br><br><br><br><br>';
        echo 'asdasd';
          var_dump(TovariVZayavSearch::getSumModel($contentZajavProvider,['sumPos','Cena']));
       // $SumModel=/*Исходя из провайдера построить сумму*/
        return $this->render('view', [
            'model' => $ZajavkaInfo,
            'contentZajavProvider'=>$contentZajavProvider,
            'contentZajavSerch'=>$contentZajavSerch,
            //'Summary'=>$SumModel;
        ]);
    }

    /**
     * Creates a new Zajavki model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Zajavki();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idZajavki]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Zajavki model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idZajavki]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Zajavki model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Zajavki model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zajavki the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zajavki::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
