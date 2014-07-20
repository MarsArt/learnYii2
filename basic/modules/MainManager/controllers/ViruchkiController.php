<?php

namespace app\modules\MainManager\controllers;

use app\models\Viruchki;
use Yii;
use app\models\ViruchkiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ViruchkiController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ViruchkiSearch();
        $dataProvider = $searchModel->getSQLProvider(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex1()
    {
        $searchModel = new ViruchkiSearch();
        echo'<hr><br><br><br>';

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id){
        $ViruchInfo=Viruchki::findOne($id);
        $dataProviderInfoProd=$ViruchInfo->getDataProviderInfoVir();
        $dataProviderInfoRash=$ViruchInfo->getDataProviderInfoRash();

      return $this->render('prodaji',[
          'ViruchInfo' => $ViruchInfo,
          'dataProviderInfoProd' => $dataProviderInfoProd,
          'dataProviderInfoRash' => $dataProviderInfoRash
         ]);
    }


    protected function findModel($id)
    {
        if (($model = Viruchki::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
