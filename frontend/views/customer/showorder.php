
<?php
    use yii\widgets\ListView;
?>

<?=

ListView::widget([
//    'dataProvider' => $dataProvider,
    'dataProvider' => $dataProviderCostumer,
    'itemView' => '_view',
])

?>
