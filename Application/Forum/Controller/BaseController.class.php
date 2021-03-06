<?php
namespace Forum\Controller;

use Think\Controller;

class BaseController extends Controller
{
	/**
	 * 检测是否登录
	 * @return no
	 */
    protected function isLogin()
	{
    	$s = session('login');
        if($s!='is_login'){
    		$this->redirect("Login/login");
    	}
    }
        /**
     * 检测管理员是否登录
     * @return no
     */
    protected function isLoginadm()
    {
        $s = session('loginAdm');

        if($s!='is_login'){
            $this->redirect("Adm/login");
        }
    }
    /**
     * 插入一条记录
     * @param table $model 数据表的实例化模型类指针
     */
    protected function addDate($model)
    {
        if(IS_POST)
        {
            if($model->create())
            {
                $result = $model->add();
                if($result) {
                    $this->success('操作成功！');
                }else{
                    $this->error('数据添加错误！');
                }
            }else{
                $this->error($model->getError());
            }
        }
        else
        {
            $this->display();
        }
    }

    /**
     * 修改表
     * @param  table $Model 数据表对应的模型实例化
     * @return no
     */
    protected function alterDate($Model)
    {
        if(IS_post)
        {
            $Model->alterMember()?$this->error('修改失败'):$this->success('修改成功');
        }
    }

    /**
     * 删除一条记录
     * @param  table $Model 数据表模型类的实例化
     * @return no
     */
    protected function deleteDate($Model)
    {
        $Model->deleteMember()?$this->error('删除失败'):$this->success('删除成功');
    }
    
    /**
     * 查找
     * @param  table $_table     数据表的实例化模型
     * @param  string $field     要查询的字段
     * @param  string $order     排序规则
     * @param  string $thead     表头
     * @param  string $condition 查询条件
     * @return no
     */
    protected function search($_table,$field,$order,$thead='',$condition='')
    {

        $count = $_table->where($condition)->count();// 查询满足要求的总记录数

        $Page  = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->rollPage=5;
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');

        $show = $Page->show();// 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性

        $list = $_table->where($condition)->field($field)->order($reder)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    /**
     * 更新论坛用户经验值
     * @param [type] $ID    [用户ID]
     * @param [type] $value [新的用户经验值]
     */
    protected function updateUserValue($ID,$value,$status=1)
    {
        $who['for_id']=$ID;
        if($status==1)
        {
            $newValue['for_value']=$value;
        }
        else
        {
            $findValue=M("tfor_detail")->where($who)->field('for_value')->find();
            $newValue['for_value']=$value+intval($findValue['for_value']);            
        }
        $newValue['for_level']=$this->newLevel($newValue['for_value']);
        $ret=M('tfor_detail')->where($who)->save($newValue);
    }

    /**
     * 更新用户经验等级
     * @param  [type] $value [用户经验值]
     * @return [type]        [等级]
     */
    protected function newLevel($value)
    {
        $count=-1;
        ++$value;
        if($value<100)
        {
            for ($i=1; $value>0; $i+=$count)
            { 
                $value-=$i*15;
                ++$count;
            }
            return $count;
        }
        else
        {       
            $count=2; 
            for ($i=1; $value>0; $i+=($count-3))
            { 
                $value-=$i*100;
                ++$count;
            }
            return $count;
        }
    }
    /**
     * 修改用户未读消息
     * @param [type]  $who    [description]
     * @param integer $status [description]
     */
    protected function modifyMessage($who,$status=1)
    {
        $condition['for_id']=$who;
        if($status==1)
        {
            $message=M('tfor_detail')->where($condition)->field('for_message')->find();
            $message['for_message']+=1;
            $ret=M('tfor_detail')->where($condition)->save($message);       
        }
        else
        {
            $message['for_message']=0;
            $ret=M('tfor_detail')->where($condition)->save($message);
        }
    }
}