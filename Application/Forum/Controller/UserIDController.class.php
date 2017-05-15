<?php
namespace Forum\Controller;

use Think\Controller;

class UserIDController extends BaseController
{
	/**
	 * 验证原密码后修改
	 * @return null
	 */
    public function modify()
    {
    	$this->islogin();
    	if($_POST)
    	{
    		if($_POST['for_password']==$_POST['new_password'])
    		{
	    		$user=D('UserID');
	    		$who['for_id']=$_SESSION['name'];
	    		$oldPassword=$user->where($who)->field('for_password')->find();
	    		if($oldPassword['for_password']==$_POST['old_password'])
	    		{
	    			$newPassword['for_password']=$_POST['for_password'];

		    		$status=$user->where($who)->field('for_password')->save($newPassword)?0:1;
		            if(!$status)
		            {
		                $this->success('修改成功');
		            }
		            else
		            {
		                $this->error('修改失败');
		            }
	    		}
	    		else
	    		{
	    			$this->error('原密码不正确！');
	    			$this->display();
	    		}
    		}
    		else
    		{
    			$this->error('两次输入新密码不相同！');
    			$this->display();
    		}
    	}
    	else
    	{
    		$this->display();
    	}

    }
}