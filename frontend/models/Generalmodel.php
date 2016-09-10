<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class Generalmodel extends Model
{
    public function userinfo($userid){
        $rows_data = (new \yii\db\Query())
                    ->select("a.*,b.info_status,b.user_type")
                    //->distinct()
                    ->from('doctor_personal_details a')
                    ->join('right JOIN','user b','a.ref_id = b.id')
                    ->where('b.id=:id and b.status=:status' )
                    ->addParams([':id'=>$userid,':status'=>'1'])
                    ->all();
        
        return $rows_data;
    }
    public function activity_log($remoteaddress,$path,$serveraddress,$servername,$serversoftware,$serverprotcol,$datetime,$method){
        $db=Yii::$app -> db;
        $rows_result = $db->createCommand("SELECT * FROM activitylog where remoteaddress ='".$remoteaddress."'")->queryAll();
        
        if(count($rows_result)>0){
            $connection=Yii::$app -> db;
            $increment=$rows_result[0]['count']+1;
            $connection	->createCommand()
			->update("activitylog", ["path" => $path,"serveraddress" =>$serveraddress,"servername" =>$servername,"serversoftware"=>$serversoftware,"serverprotcol" =>$serverprotcol,"datetime_updated"=>$datetime,"method"=>$method,"count" => $increment], "remoteaddress = '".$remoteaddress."'")
			->execute();
        }else{
            $connection=Yii::$app -> db;
            $connection->createCommand()
            ->insert('activitylog', [
			'remoteaddress' =>$remoteaddress,
			'path' =>$path,
                        'serveraddress'=>$serveraddress,
                        'servername' =>$servername,
                        'serversoftware' =>$serversoftware,
                        'serverprotcol' =>$serverprotcol,
                        'serverprotcol' =>$serverprotcol,
                        'count' =>'1',
                        'method' =>$method
                    ])
            ->execute();
        }
       
    }
    public static function get_states_lists(){
         $state_list = (new \yii\db\Query())
         ->select('id,state_name')
         ->from('state')
         ->all();
         return $state_list;
    }
}
