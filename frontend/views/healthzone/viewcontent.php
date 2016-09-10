<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
$this->title = 'Content';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
//foreach($_SERVER as $key => $value){
//echo '$_SERVER["'.$key.'"] = '.$value."<br />";
//}
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
<?php
echo Url::base();
$resultData=$dataprovider;
//print_r($resultData);
$count=count($resultData);
$x='';
$x.='<table class="table table-condensed table-bordered"><thead><tr><th>Category</th><th>Sub Category</th><th>content</th><th>Image</th><th>Date</th></tr></thead>';
for($i=0;$i<$count;$i++){
    $x.="<tr>";
    $x.="<td>".$resultData[$i]['Category']."</td>";
    $x.="<td>".$resultData[$i]['Sub Category']."</td>";
    $x.="<td>".$resultData[$i]['content']."</td>";
    $x.="<td><img src=".Url::base()."/post/".$resultData[$i]['cat_id']."/".$resultData[$i]['image']."></td>";
    $x.="<td>".$resultData[$i]['datetime_added']."</td>";
    $x.="</tr>";
}
$x.='</table>';
echo $x;
//$dataProvider = new ArrayDataProvider([
//        'key'=>'id',
//        'allModels' => $resultData,
//        'sort' => [
//            'attributes' => [],
//        ],
//        'pagination' => [
//            'pageSize' => 5,
//        ],
//    'sort' => ['attributes' => ['content']]
//]);
// \yii\widgets\Pjax::begin();
//echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => [
//           // ['class' => 'yii\grid\SerialColumn'],
//            'Category','Sub Category',
//            [
//                'label'=>'Image',
//                'format'=>'raw',
//                'value' => function($data){
//                 $url = Url::base().'/post/'.$data['cat_id'].'/'.$data['image'];
//                 return Html::img($url,['alt'=>'yii']); 
//             }
//            ],
//            [
//            'attribute' => 'content', 
//            'value' => 'content',
//            'format' => 'html'
//            ],
//            [
//                'attribute' => 'Action',
//                'format' => 'raw',
//                'value' => function ($data) {                      
//                        return '<div id='.$data['id'].'>Update</div><div id='.$data['id'].'>Delete</div>';
//                },
//            ],
//            
//
//    ],
//    'tableOptions' =>['class' => 'table table-bordered table-hover'],
//    'options'=>['class'=>'table-responsive'],
//    
//
//]);
//\yii\widgets\Pjax::end();
?>
<input type="hidden" id="limitpass" value="5"/>   
</div>
<?php
$script=<<< JS
        $(window).scroll(function() {
            if (document.body.scrollHeight == document.body.scrollTop +  window.innerHeight) {
                sum=0;
                pass_limit=$('#limitpass').val();
                $.ajax({
                url: "../socialhealthnetwork/viewcontent",
                dataType: "json",
                data : {pass_limit:pass_limit},
                type: "post",
                success: function(data) {
                    var datalength=data.length;
                    var x='';
                    for(var i=0;i<datalength;i++){
                        var x=x+"<tr><td>"+data[i]['Category']+"</td><td>"+data[i]['Sub Category']+"</td><td>"+data[i]['content']+"</td><td>"+data[i]['image']+"</td><td>"+data[i]['datetime_added']+"</td></tr>"
                    }
                    $('tbody').append(x);
                    var sum=parseInt($('#limitpass').val())+parseInt(5);
                    $('#limitpass').val(sum);
                },
                error :function(data){
                    
                }
            });
            }
        });
JS;
$this->registerJs($script);            
?>