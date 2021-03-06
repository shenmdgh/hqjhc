<?php
namespace Admin\Controller;
use \Common\Controllers\BaseController;
class IndexController extends BaseController {
    CONST DATAFLAG=0;
   /**
    * 管理员列表
    */
    public function index()
    {    
        if ($_GET) 
        {   
           $loginName = I('get.loginName');
           $createTime = I('createTime');
           $con['loginName'] = isset($loginName) ? ['like',"%".I('get.loginName')."%"] : '';
           $con['createTime'] = isset($createTime) ? ['gt',$createTime] : '';
           $con = array_filter($con);
        }
        $con['dataFlag'] = self::DATAFLAG;
        $Data = M('staffs');
        $count      = $Data->where($con)->count();  
        $Page = $Page = new \Think\Page($count, 15);
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');  
        $Page->setConfig('prev', '上一页');  
        $Page->setConfig('next', '下一页');  
        $Page->setConfig('last', '末页');  
        $Page->setConfig('first', '首页');  
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');  
        $Page->lastSuffix = false;//最后一页不显示为总页数
        $show       = $Page->show();
        $orderby['stffid']='desc';
        $list = $Data->where($con)->order($orderby)->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $value) {
            $updatestaffid = $value['updatestaffid'];
            $createstaffid = $value['createstaffid'];
            if($updatestaffid != '')
            {
                $staffModel = new \Common\Model\StaffsModel();
                $res = $staffModel ->modelStaffsByid($updatestaffid);
                $list[$key]['updatestaffname'] = $res['loginname'];
            }
            else
            {
                $list[$key]['updatestaffname'] = '';
            }
            if($createstaffid != '')
            {
                $staffModel = new \Common\Model\StaffsModel();
                $res = $staffModel ->modelStaffsByid($createstaffid);
                $list[$key]['createstaffname'] = $res['loginname'];
            }
            else
            {
                $list[$key]['createstaffname'] = '';
            }

        }
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }
    /**
     * 添加管理员
     */
    public function addUserPage()
    {   
        $this->assign("data",$this->_data);
        $this->display();
    }
    /**
     * 修改管理员页面
     */
    public function editUserPage()
    {
        $stffid = I('get.stffid');
        $StaffsModel = new \Common\Model\StaffsModel();
        $info = $StaffsModel->modelStaffsByid($stffid);
        $this->assign('info',$info);
        $this->assign('data',$this->_data);
        $this->display();
    }
    /**
     * 添加管理员操作
     */
    public function doAddUser()
    {
        $StaffsModel = new \Common\Model\StaffsModel();
        $res = $StaffsModel->modelAddstaffs();
        if($res == 1)
        {
            $this->success('管理员添加操作成功！');
        } else {
            $this->error($res);
        }
    }
    /**
     * 修改管理员操作
     */
    public function doEditUser()
    {
        $StaffsModel = new \Common\Model\StaffsModel();
        $res = $StaffsModel->modelEditstaffs();
        if($res == 1)
        {
            $this->success('管理员修改操作成功！');
        } else {
            $this->error($res);
        }
    }
    /**
     * 删除管理员信息
     */
    public function delete()
    {
        $stffid = I('get.stffid');
        $StaffsModel = new \Common\Model\StaffsModel();
        $res = $StaffsModel->modeldelete($stffid);
        if($res)
        {
            $this->success('成功删除操作职员');
        }
        else
        {
            $this->error('删除职员操作失败');
        }
        
    }
    /**
     * 文章回收站列表
     */
    public function recycle()
    {
        $this->display();
    }
    /**
     * 重新设置密码页面
     */
    public function resetpwdpage()
    {
        $stffid = I('get.stffid');
        $StaffsModel = new \Common\Model\StaffsModel();
        $info = $StaffsModel->modelStaffsByid($stffid);
        $this->assign('info',$info);
        $this->assign('data',$this->_data);
        $this->display();
    }
    /**
     * 更改密码
     */
    public function doResetPwd()
    {
        $StaffsModel = new \Common\Model\StaffsModel();
        $res = $StaffsModel->modelEditstaffs();
        if($res == 1)
        {
            $this->success('管理员密码修改操作成功！');
        } else {
            $this->error($res);
        }
    }
}