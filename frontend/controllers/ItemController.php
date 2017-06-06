<?php

namespace frontend\controllers;

use frontend\models\Statistic;
use Yii;
use common\models\Item\Item;
use common\models\Item\ItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
//    start
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Yii::$app->mycomponents->trigger(\frontend\components\MyComponents::EVENT_STATISTIC);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        Yii::$app->mycomponents->trigger(\frontend\components\MyComponents::EVENT_STATISTIC);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
// end


    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
