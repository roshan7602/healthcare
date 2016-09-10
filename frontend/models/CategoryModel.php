<?php

namespace frontend\models;
use Yii;
use yii\db\Query;

/**
 * Login form
 */
class CategoryModel extends \yii\db\ActiveRecord
{
    public $category_id;

    public static function tableName()
    {
        return 'category';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['category_id'], 'required']
        ];
    }
    public function maincategory(){
        $connection = \Yii::$app -> db;
        $sql = "SELECT * FROM MainCategory where Status='1'";
        $command= $connection -> createCommand($sql)->queryAll();
        return $command;
        
    }
    public function Relationcategory($id){
        $connection = \Yii::$app -> db;
        $sql = "SELECT a.category_id,a.name FROM category a inner join `RelationMainCategory` b on a.category_id=b.CategoryId WHERE MainCatId='".trim($id)."'";
        $command= $connection -> createCommand($sql)->queryAll();
        return $command;
        
    }
    public function subcategory($id){
        $connection = \Yii::$app -> db;
        $sql = "SELECT * FROM category where status='1' and main_category='".trim($id)."'";
        $command= $connection -> createCommand($sql)->queryAll();
        return $command;
        
    }
    public function insertcontent($category_id,$content,$subcat,$image_name_save,$datatitle){
        $connection = \Yii::$app -> db;
        $connection->createCommand()
	->insert('content_insert', [
			'cat_id' => $category_id,
			'sub_cat_id' => $subcat,
                        'title' => $datatitle,
                        'content' => $content,
                        'image' => $image_name_save,
                        'user_id' => '1',
                        'user_type' => '',
                        'approved_status' => '0'
                        ])
	->execute();
    }
    public function content_view($start,$end){
        $connection = \Yii::$app -> db;
        $end=5;
        $sql = "SELECT a.id,a.cat_id,b.name as `Category`,a.`datetime_added`,(select name from category where category_id=a.sub_cat_id) as `Sub Category`,a.content,a.image FROM content_insert a inner join category b on a.cat_id=b.category_id where a.approved_status='1' order by a.datetime_added desc limit ".$start.",".$end."";
        $command_view= $connection -> createCommand($sql)->queryAll();
        return $command_view;
    }
    public function content_view_count(){
        $connection = \Yii::$app -> db;
        $end=5;
        $sql = "SELECT a.id,a.cat_id,b.name as `Category`,(select name from category where category_id=a.sub_cat_id) as `Sub Category`,a.content,a.image FROM content_insert a inner join category b on a.cat_id=b.category_id order by a.datetime_added limit ".$start.",".$end."";
        $command_view= $connection -> createCommand($sql)->queryAll();
        return $command_view;
    }
}
