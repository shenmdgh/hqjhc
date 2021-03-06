<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Message\Model;
use Think\Model;
class MobilemessageModel extends Model
{   
    CONST DATAFLAG = 0;
    public $tableName = "mobile_message";
    public function __construct() {
        parent::__construct();
    }
    protected $_validate = array(
    );
    protected $_auto = array ( 
         array('createTime','mydate','1','callback'),
     );
    protected function mydate()
    {
        return date("Y-m-d H:i:s");
    }
    /**
     * 获取发送的信息
     */
    public function mobilemessageInfo()
    {
        $Mobile_message = D('mobile_message');
        return  $Mobile_message->select();
    }
    /**
     * 添加消息
     */
   public function modelAddMessage()
    {   
        $Mobile_message = D('mobile_message');
        if(!$Mobile_message->create())
        {
            return $Mobile_message->getError();
        }
        else 
        {
            $Mobile_message->add();
            return 1;
        }
    }
     /**
     * 修改消息
     */
   public function modelEditMessage()
    {   
        $Messages = D('messages');
        if(!$Messages->create())
        {
            return $Messages->getError();
        }
        else 
        {
            $Messages->save();
            return 1;
        }
    }
    /**
     * 根据文章的id查询
     */
    public function modelgetmessagebyid($messageid)
    {
        $Messages = D('messages');
        return $Messages->where(['messageid'=>$messageid,'data_flag'=>self::DATAFLAG])->find();
    }
    /**
     * 删除文章
     */
    public function modeldelete(array $data)
    {
        $Aessages = D('messages');
        return $Aessages->save($data);
    }


}