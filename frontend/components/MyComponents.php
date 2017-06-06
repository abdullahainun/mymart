<?php
    namespace frontend\components;

    use frontend\models\Statistic;
    use yii\base\Component;
    use yii;

    class MyComponents extends Component
    {
        const EVENT_STATISTIC = "action-statistic";
        public function Statistic()
        {
            $statistic = new Statistic();
            $userHostname = Yii::$app->request->getUserHost();
            $userIP = Yii::$app->request->getUserIP();
            $pathInfo = Yii::$app->request->getPathInfo();
            $queryString = Yii::$app->request->getQueryString();
            // insert a new row of data
            $statistic->access_time= date("Y-m-d H:i:s");
            $statistic->user_host = $userHostname;
            $statistic->user_ip= $userIP;
            $statistic->path_info= $pathInfo;
            $statistic->query_string= $queryString;
            $statistic->save();
        }
    }
?>