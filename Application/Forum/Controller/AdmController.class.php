<?php
namespace  Forum\Controller;
class AdmController extends BaseController
{

	//后台首页
	public function index()
	{
		$this->isLoginadm();
		$this->assign('admName',session('admName'));
		$this->display();
	}
	/**
	 * 管理员登陆界面
	 * @return [type] [description]
	 */
	public function login()
	 {
        if(session('loginAdm')=='is_login')$this->success('你已登录',U('Forum/Adm/index'));
	 	else if(IS_POST)
        {
        	if($_POST['name'] && $_POST['password'])
        	{
	            $data=$_POST;

	            $count=D("Adm")->where(array('adm_name'=>$data['name']))->count();
	            if($count)
	            {
	            	$result=D("Adm")->where(array('adm_name'=>$data['name']))->field('adm_password')->find();
	            	if($result['adm_password']==$data['password'])
	            	{
	            		session('admName',$data['name']);
	                    //session(array('login'=>'is_login','expire'=>1800));
	                    session('loginAdm','is_login');
	                    $this->upRecord('管理员登陆',$data['name']);
	            		$this->success('登录成功',U('Forum/Adm/index'));
	            	}
	                else{
	                	$this->error('密码错误');
	                }
	            }
	            else
	            {
	                $this->error('用户名不存在');
	            }
        	}
        	else
        	{
        		if($_POST['name'])
        		{
        			$this->error('密码不能为空！');
        		}
        		else
        		{
        			$this->error('用户名不能为空！');
        		}
        	}
        }
        else
        {
            $this->display();
        }
	 }

	 /**
	  * 退出登录
	  * @return no 
	  */
	 public function logout()		
	 {
        $this->upRecord("管理员注销",$_SESSION['admName']);
	 	session('admName',null);
        session('loginAdm',null);
	 	$this->success('退出成功',U('Forum/Adm/login'));
	 }


	/**
	 * 增加管理员
	 */
	public function addUser()
	{
		$this->isLoginadm();
		$Admin=D("Adm");
		if($Admin->checkPermission())
		{
			echo "权限不够";
			$this->upRecord("添加管理员",$_SESSION['admName'],0);
			return ;
		}
		$this->upRecord("添加管理员",$_SESSION['admName']);
		$this->addDate($Admin);
	}

	/**
	 * 删除管理员
	 * ??？为什么不能直接调用另一个方法
	 * @return no
	 */
	function deleteUser()
	{
		$this->isLoginadm();
		if(D('Adm')->checkPermission())
		{
			echo "权限不够";
			$this->upRecord("删除管理员",$_SESSION['admName'],0);
			return ;
		}
		$this->upRecord("删除管理员",$_SESSION['admName']);
		$this->delete(D('Adm'));
	}


	/**
	 * 查找管理员
	 * @return no
	 */
	public function searchUser()
	{
		$this->isLoginadm();
		$Admin=D("Adm");
		if($Admin->checkPermission())
		{
			//echo "权限不够";
			return ;
		}
		$thead='<thead><tr><th>姓名</th><th>联系方式</th><th>权限</th><th>删除</th><th>修改</th></tr></thead>';
        $order='adm_name';
        $field='adm_name,adm_permission,adm_contact';
 		if(IS_POST)$condition[$_POST["type"]]=$_POST['name'];
        $this->search($Admin,$field,$order,$thead,$condition);
	}
	/**
	 * 分页显示所有信息
	 * @return no
	 */
	public function showAll()
	{
		$this->isLoginadm();
		$table = D('Adm');
		$field='adm_name,adm_idcard,adm_contact,adm_permission';
		$order='adm_name';
		$this->search($table,$field,$order);
	}
	/**
	 * 显示个人信息
	 * @return no
	 */
	public function showPersonInfo($name='')//必须要有默认值
	{
		$this->isLoginadm();
		$result=$this->showInfo($name);
		if($result)
		{
			$this->assign('result',$result);
			$this->display();
		}
		else
		{
			$this->error('wrong!');
		}
	}
	/**
	 * 显示某个管理员的信息
	 * @param  string $name 管理员姓名
	 * @return no       [description]
	 */
	public function showUserInfo()
	{
		$this->isLoginadm();

		if(D("Adm")->checkPermission())
		{
			//echo "权限不够";
			return ;
		}
		$result=$this->showInfo(I('adm_name'));
		if($result)
		{
			$this->assign('result',$result);
			$this->display();
		}
	}

	/**
	 * 修改个人信息
	 * @return no
	 */
	public function changePersonInfo()
	{
		$this->changeInfo();
	}

	public function changeUserInfo()
	{
		if(D("Adm")->checkPermission())
		{
			echo "权限不够";
			return ;
		}
		$this->changeInfo();
	}


	protected function showInfo($name='')
	{
		if($name!='')
		{
			$condition['adm_name']=$name;
		}
		else
		{
			$condition['adm_name']=$_SESSION['admName'];
		}
		return D("Adm")->where($condition)->find();
	}

	protected function changeInfo()
	{
		$this->isLoginadm();
		if(IS_POST)
		{
		    $Admin= D("Adm");
		    // 更新的条件
		    $condition['adm_name'] = $_POST['adm_name'];

		    $data=$_POST;
		    $result = $Admin->where($condition)->field('adm_password,adm_idcard,adm_contact,adm_permission')->save($data);
		    //或者：$resul t= $Dao->where($condition)->data($data)->save();
		    if($result !== false){
		    	$this->upRecord("修改管理员信息",$_POST['adm_name']);
		        $this->success("修改成功");
		    }else{
		    	$this->upRecord("修改管理员信息",$_POST['adm_name'],0);
		        $this->error("修改失败");
		    }
		}
	}

	/**
	 * 拼接字符串
	 * @param  [number] $str [日期]
	 * @return [string]      [拼接的字符串]
	 */
	protected function stitch($str)
	{
		if(strlen($str)==1)
		{
			$ret="0".$str;
			return $ret;
		}
		return $str;
	}
	/**
	 * 条件模糊搜索主帖
	 * @param  [type] $model     [列表]
	 * @param  [type] $condition [条件]
	 * @return [type]            [description]
	 */
	protected function findMain($model , $postValue, $condition)
	{
		if($postValue)
		{
			return $model->where($condition);
		}
		return $model;
	}
	/**
     * 回帖举报查看
     * @return [type] [description]
     */
    public function reportReply()
    {
    	$orderMethod="for_report desc";
    	$this->orderMethodReply($orderMethod);
    }
	/**
     * 管理员检索回帖
     * @return [type] [description]
     */
    public function searchReply()
    {
    	$orderMethod="for_time desc";
    	$this->orderMethodReply($orderMethod);
    }
	 /**
     * 检索回贴
     * @return [type] [description]
     */
    protected function orderMethodReply($orderMethod)
    {
        $this->isLoginadm();

        if(IS_POST || $_GET)
        {
	        if(IS_POST){$condition=$_POST;} 
	        else if($_GET){$condition=$_GET;} 

	    	
	    	if($condition['for_id'])
	    	{
	    		$searchTemp="%".$condition['for_id']."%";
	    		$searchID['tfor_reply.for_id']=array('like',$searchTemp);
	    		// echo $searchTemp."**";
	    	}

	    	if($condition['for_text'])
	    	{
	    		$searchTemp="%".$condition['for_text']."%";
	    		$searchText['tfor_reply.for_text']=array('like',$searchTemp);
	    		// echo $searchTemp."**";
	    	}
	    	if($condition['for_year'] || $condition['for_month'] || $condition['for_day'] || $condition['for_hour'])
	    	{
	    		$time=1;
	    	}
	    	else
	    	{
	    		$time=0;
	    	}
	    	if($time==1)
	    	{
	    		if($condition['for_year'])
	    		{
	        		$searchTemp="%".$condition['for_year'];
	        		if($condition['for_month'])
	        		{
	        			$searchTemp=$searchTemp."-".$this->stitch($condition['for_month']);
	        			if($condition['for_day'])
	        			{
	        				$searchTemp=$searchTemp."-".$this->stitch($condition['for_day']);
	        				if($condition['for_hour'])
	        				{
	        					$searchTemp=$searchTemp." ".$this->stitch($condition['for_hour']);
	        					if($condition['for_minute'])
	        					{
	        						$searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
	        					}
	        				}
	        			}
	        		}
	    		}
	    		else
	    		{
	        		if($condition['for_month'])
	        		{
		        		$searchTemp="%".$this->stitch($condition['for_month']);
	        			if($condition['for_day'])
	        			{
	        				$searchTemp=$searchTemp."-".$this->stitch($condition['for_day']);
	        				if($condition['for_hour'])
	        				{
	        					$searchTemp=$searchTemp." ".$this->stitch($condition['for_hour']);
	        					if($condition['for_minute'])
	        					{
	        						$searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
	        					}
	        				}
	        			}
	        		}
	        		else
	        		{
	        			if($condition['for_day'])
	        			{
			        		$searchTemp="%".$this->stitch($condition['for_day']);
	        				if($condition['for_hour'])
	        				{
	        					$searchTemp=$searchTemp." ".$this->stitch($condition['for_hour']);
	        					if($condition['for_minute'])
	        					{
	        						$searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
	        					}
	        				}
	        			}
	        			else
	        			{
	        				if($condition['for_hour'])
	        				{
		        				$searchTemp="%".$this->stitch($condition['for_hour']);
	        					if($condition['for_minute'])
	        					{
	        						$searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
	        					}
	        				}
	        			}
	        		}
	        	}
				$searchTemp=$searchTemp."%";
	    		$searchTime['tfor_reply.for_time']=array('like',$searchTemp);
	    	}
	    	if($_POST['for_flag'])
	    	{
	    		if($_POST['for_flag']=="是") {$flag['tfor_reply.for_flag']=array('eq',0);}
	    		else if($_POST['for_flag']=="否") {$flag['tfor_reply.for_flag']=array('eq',1);}
	    		else {$flag['tfor_reply.for_flag']=array('eq',3);}
	    	}
	    	else
	    	{
		        $flag['tfor_reply.for_flag']=array('EGT',0);
	    	}

	        $searchMain =M('tfor_reply');
	        $count=$this->findMain($this->findMain($this->findMain($this->findMain($this->findMain($this->findMain($searchMain,$condition['for_title'],$searchTitle),$condition['for_id'],$searchID),$condition['for_class'],$searchClass),$condition['for_text'],$searchText),$time,$searchTime),1,$flag)->count();

	        if($count)
	        {
				$Page =getpage($count,10);
	            foreach ($condition as $key => $val) 
	            {
	                $Page->parameter[$key] = $val;            
	            }
	            
	            $ReplyPost=$this->findMain($this->findMain($this->findMain($this->findMain($this->findMain($searchMain->join('LEFT JOIN tfor_detail ON tfor_reply.for_id = tfor_detail.for_id')->join('LEFT JOIN tfor_main ON tfor_reply.for_fatherid=tfor_main.for_num'),$condition['for_title'],$searchTitle),$condition['for_id'],$searchID),$condition['for_class'],$searchClass),$condition['for_text'],$searchText),$time,$searchTime)->where($flag)->field('tfor_reply.for_num,tfor_reply.for_time,tfor_reply.for_text,for_fatherid,for_title,tfor_reply.for_up,tfor_reply.for_down,tfor_reply.for_report,for_name,for_head,for_level,for_class')->order($orderMethod)->limit($Page->firstRow.','.$Page->listRows)->select();
		       	for ($i=0; $i < count($ReplyPost,0); $i++)
		        {
		        	$ReplyPost[$i]['for_text']=htmlspecialchars_decode($ReplyPost[$i]['for_text']);
		        }
	            $this->assign('list_post',$ReplyPost);
	            $this->assign('page',$Page->show());
	            $this->display();
	            
	        }
	        else
	        {
	            $this->error("没有查询到相关数据！");
	        }    	
        }
        else
        {
        	$count=M('tfor_reply')->count();
        	$Page =getpage($count,10);
        	$ReplyPost=M('tfor_reply')->field('tfor_reply.for_num,tfor_reply.for_time,tfor_reply.for_text,for_title,for_fatherid,tfor_reply.for_up,tfor_reply.for_down,tfor_reply.for_report,for_name,for_head,for_level,for_class')->join('LEFT JOIN tfor_detail ON tfor_reply.for_id = tfor_detail.for_id')->join('LEFT JOIN tfor_main ON tfor_reply.for_fatherid=tfor_main.for_num')->order($orderMethod)->limit($Page->firstRow.','.$Page->listRows)->select();

        	
            for ($i=0; $i < count($ReplyPost,0); $i++)
	        {
	        	$ReplyPost[$i]['for_text']=htmlspecialchars_decode($ReplyPost[$i]['for_text']);
	        }
        	$this->assign('list_post',$ReplyPost);
	        $this->assign('page',$Page->show());
	        $this->display();
        }
    }
     /**
     * 主贴举报查看
     * @return [type] [description]
     */
    public function reportMain()
    {
    	$orderMethod="for_report desc";
    	$this->orderMethod($orderMethod);
    }
	/**
     * 管理员检索主贴
     * @return [type] [description]
     */
    public function searchMain()
    {
    	$orderMethod="for_time desc";
    	$this->orderMethod($orderMethod);
    }
	/**
     * 检索主贴
     * @return [type] [description]
     */
    protected function orderMethod($orderMethod)
    {
        $this->isLoginadm();

        if(IS_POST || $_GET)
        {
	        if(IS_POST){$condition=$_POST;} 
	        else if($_GET){$condition=$_GET;} 

	    	if($condition['for_title'])
	    	{
	    		$searchTemp="%".$condition['for_title']."%";
	    		$searchTitle['for_title']=array('like',$searchTemp);
	    	}
	    	if($condition['for_id'])
	    	{
	    		$searchTemp="%".$condition['for_id']."%";
	    		$searchID['tfor_main.for_id']=array('like',$searchTemp);
	    	}
	    	if($condition['for_class'])
	    	{
	    		$searchTemp="%".$condition['for_class']."%";
	    		$searchClass['for_class']=array('like',$searchTemp);
	    	}
	    	if($condition['for_text'])
	    	{
	    		$searchTemp="%".$condition['for_text']."%";
	    		$searchText['for_text']=array('like',$searchTemp);
	    	}
	    	if($condition['for_year'] || $condition['for_month'] || $condition['for_day'] || $condition['for_hour'])
	    	{
	    		$time=1;
	    	}
	    	else
	    	{
	    		$time=0;
	    	}
	    	if($time==1)
	    	{
	    		if($condition['for_year'])
	    		{
	        		$searchTemp="%".$condition['for_year'];
	        		if($condition['for_month'])
	        		{
	        			$searchTemp=$searchTemp."-".$this->stitch($condition['for_month']);
	        			if($condition['for_day'])
	        			{
	        				$searchTemp=$searchTemp."-".$this->stitch($condition['for_day']);
	        				if($condition['for_hour'])
	        				{
	        					$searchTemp=$searchTemp." ".$this->stitch($condition['for_hour']);
	        					if($condition['for_minute'])
	        					{
	        						$searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
	        					}
	        				}
	        			}
	        		}
	    		}
	    		else
	    		{
	        		if($condition['for_month'])
	        		{
		        		$searchTemp="%".$this->stitch($condition['for_month']);
	        			if($condition['for_day'])
	        			{
	        				$searchTemp=$searchTemp."-".$this->stitch($condition['for_day']);
	        				if($condition['for_hour'])
	        				{
	        					$searchTemp=$searchTemp." ".$this->stitch($condition['for_hour']);
	        					if($condition['for_minute'])
	        					{
	        						$searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
	        					}
	        				}
	        			}
	        		}
	        		else
	        		{
	        			if($condition['for_day'])
	        			{
			        		$searchTemp="%".$this->stitch($condition['for_day']);
	        				if($condition['for_hour'])
	        				{
	        					$searchTemp=$searchTemp." ".$this->stitch($condition['for_hour']);
	        					if($condition['for_minute'])
	        					{
	        						$searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
	        					}
	        				}
	        			}
	        			else
	        			{
	        				if($condition['for_hour'])
	        				{
		        				$searchTemp="%".$this->stitch($condition['for_hour']);
	        					if($condition['for_minute'])
	        					{
	        						$searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
	        					}
	        				}
	        			}
	        		}
	        	}
				$searchTemp=$searchTemp."%";
	    		$searchTime['for_time']=array('like',$searchTemp);
	    	}
	    	if($_POST['for_flag'])
	    	{
	    		if($_POST['for_flag']=="是") {$flag['for_flag']=array('eq',0);}
	    		else if($_POST['for_flag']=="否") {$flag['for_flag']=array('eq',1);}
	    		else if($_POST['for_flag']=="用户彻底删除") {$flag['for_flag']=array('eq',2);}
	    		else {$flag['for_flag']=array('eq',3);}
	    	}
	    	else
	    	{
		        $flag['for_flag']=array('EGT',0);
	    	}

	        $searchMain =M('tfor_main');
	        $count=$this->findMain($this->findMain($this->findMain($this->findMain($this->findMain($this->findMain($searchMain,$condition['for_title'],$searchTitle),$condition['for_id'],$searchID),$condition['for_class'],$searchClass),$condition['for_text'],$searchText),$time,$searchTime),1,$flag)->count();
	        if($count)
	        {
				$Page =getpage($count,10);
	            foreach ($condition as $key => $val) 
	            {
	                $Page->parameter[$key] = $val;            
	            }
	            
	            $MainPost=$this->findMain($this->findMain($this->findMain($this->findMain($this->findMain($searchMain->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id'),$condition['for_title'],$searchTitle),$condition['for_id'],$searchID),$condition['for_class'],$searchClass),$condition['for_text'],$searchText),$time,$searchTime)->where($flag)->order($orderMethod)->limit($Page->firstRow.','.$Page->listRows)->select();
	            $this->assign('list_post',$MainPost);
	            $this->assign('page',$Page->show());
	            $this->display();
	            
	        }
	        else
	        {
	            $this->error("没有查询到相关数据！");
	        }    	
        }
        else
        {
        	$count=M('tfor_main')->count();
        	$Page =getpage($count,10);
        	$MainPost=M('tfor_main')->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->order($orderMethod)->limit($Page->firstRow.','.$Page->listRows)->select();
        	$this->assign('list_post',$MainPost);
	        $this->assign('page',$Page->show());
	        $this->display();
        }
    }
    /**
     * 管理员删除用户主贴
     * @return [type] [description]
     */
    public function deleteMain()
    {
    	$this->isLoginadm();
    	$condition['for_num']=$_GET['for_num'];
		$flag['for_flag']=3;
		$flag['for_text']="<font color='red'>管理员已删除该主贴内容，如有疑问请联系我们</font>";
		$ret=M('tfor_main')->where($condition)->field('for_text,for_flag')->save($flag);
		if($ret)
		{
			$who=M('tfor_main')->where($condition)->field('for_id')->find();
            $this->updateUserValue($who['for_id'],-50,0);
			$this->upRecord("删除论坛主贴",$_GET['for_num']);
			$this->success("删除成功！",U("Forum/Adm/searchMain"));
		}
		else
		{
			$this->upRecord("删除论坛主贴",$_GET['for_num'],0);
			$this->error('删除失败！',U("Forum/Adm/searchMain"));
		}
    }
    /**
     * 管理员删除用户回贴
     * @return [type] [description]
     */
    public function deleteReply()
    {
    	$this->isLoginadm();
    	$condition['for_num']=$_GET['for_num'];
		$flag['for_flag']=3;
		$flag['for_text']="<font color='red'>管理员已删除该回复信息，如有疑问请联系我们</font>";
		$ret=M('tfor_reply')->where($condition)->field('for_text,for_flag')->save($flag);
		if($ret)
		{
			$who=M('tfor_reply')->where($condition)->field('for_id')->find();
            $this->updateUserValue($who['for_id'],-50,0);
			$this->upRecord("删除论坛回帖",$_GET['for_num']);
			$this->success("删除成功！",U("Forum/Adm/searchReply"));
		}
		else
		{
			$this->upRecord("删除论坛回贴",$_GET['for_num'],0);
			$this->error('删除失败！',U("Forum/Adm/searchReply"));
		}
    }
    /**
     * 管理员管理主贴类别
     * @return [type] [description]
     */
    public function alterClass()
    {
    	$this->isLoginadm();
		$list=M('tfor_class')->field('for_class')->select();
		$this->assign('listClass',$list);
		$this->display();
    }
    /**
     * 管理员搜索主贴类别
     * @return [type] [description]
     */
    public function searchClass()
    {
    	$this->isLoginadm();
    	if(IS_POST)
    	{
    		$searchLike="%".$_POST['class']."%";
	    	$searchClass['for_class']=array('like',$searchLike);
			$list=M('tfor_class')->where($searchClass)->field('for_class')->select();
			if(count($list,0))
			{
				$this->assign('listClass',$list);
				$this->display();
			}
			else
			{
				$this->error('没有查询到相关数据！请重新搜索...',U("Forum/Adm/alterClass"));
			}
    	}
    	else
    	{
    		$this->error('搜索内容为空！',U("Forum/Adm/alterClass"));
    	}

    }
    /**
     * 管理员修改主贴类别
     * @return [type] [description]
     */
    public function modifyClass()
    {
    	$this->isLoginadm();
		if(IS_POST)
		{		
    		$modifyClass['for_class']=$_POST['old_class'];
    		$newClass['for_class']=$_POST['new_class'];
    		$saveModify=M('tfor_class')->where($modifyClass)->save($newClass);
    		if($saveModify)
    		{
    			$this->upRecord("修改主贴类别",$_POST['old_class']." -> ".$_POST['new_class']);
    			$this->success("修改成功！",U("Forum/Adm/alterClass"));
    		}
    		else
    		{
    			$this->upRecord("修改主贴类别",$_POST['old_class']." -> ".$_POST['new_class'],0);
    			$this->error("修改失败！",U("Forum/Adm/alterClass"));
    		}
		}
		else
		{
			$this->error('未输入有效字符！',U("Forum/Adm/alterClass"));
		}
    }
    /**
     * 管理员添加主贴类别
     * @return [type] [description]
     */
    public function addClass()
    {
    	$this->isLoginadm();
    	if(IS_POST)
    	{
    		$addClass['for_class']=$_POST['add_class'];
			$class=M('tfor_class')->add($addClass);
			if($class)
			{
				$this->upRecord("添加主贴类别",$_POST['add_class']);
				$this->success("添加类别成功！",U("Forum/Adm/alterClass"));
			}
			else
			{
				$this->upRecord("添加主贴类别",$_POST['add_class'],0);
				$this->error("添加失败！",U("Forum/Adm/alterClass"));
			}

    	}
    	else
    	{
			$this->error("未输入有效！",U("Forum/Adm/alterClass"));
    	}
    }
    /**
     * 管理员删除主贴类别
     * @return [type] [description]
     */
    public function deleteClass()
    {
    	$this->isLoginadm();
    	$class['for_class']=$_GET['class'];
		$ret=M('tfor_class')->where($class)->delete();
		if($ret)
		{
			$this->upRecord("删除主贴类别",$_GET['class']);
			$this->success("删除成功！",U("Forum/Adm/alterClass"));
		}
		else
		{
			$this->upRecord("删除主贴类别",$_GET['class'],0);
			$this->error('删除失败！',U("Forum/Adm/alterClass"));
		}
    }

    /**
     * 管理员发布通告
     * @return [type] [description]
     */
    public function circular()
    {
    	$this->isLoginadm();
    	if(IS_POST)
    	{
		    $addCircular['adm_name']=$_SESSION['admName'];
		    $addCircular['for_title']=$_POST['for_title'];
    		$addCircular['for_text']=$_POST['for_text'];
			$ret=M('tfor_circular')->add($addCircular);
			if($ret)
			{
				$this->upRecord("发布通告",$_POST['for_title']);
				$this->success("发布通告成功！");
			}
			else
			{
				$this->upRecord("发布通告",$_POST['for_title'],0);
				$this->error("发布失败！");
			}
    	}
    	else
    	{
	        $count =M('tfor_circular')->count();
	        $Page =getpage($count,6);
	        $circular=M('tfor_circular')->order('for_num desc,for_time')->limit($Page->firstRow.','.$Page->listRows)->select();
	        $this->assign('circular',$circular);
	        $this->assign('page',$Page->show());
			$this->display();
    	}
    }
    /**
     * 管理员修改通告
     * @return [type] [description]
     */
    public function modifyCircular()
    {
    	$this->isLoginadm();
		if(IS_POST)
		{		
    		$modifyCircular['for_num']=$_POST['for_num'];
    		$newCircular['for_title']=$_POST['for_title'];
    		$newCircular['for_text']=$_POST['for_text'];
    		$saveModify=M('tfor_circular')->where($modifyCircular)->save($newCircular);
    		if($saveModify)
    		{
    			$this->upRecord("修改通告",$_POST['for_num']." new title : ".$_POST['for_title']);
    			$this->success("修改成功！",U("Forum/Adm/circular"));
    		}
    		else
    		{
    			$this->upRecord("修改通告",$_POST['for_num']." new title : ".$_POST['for_title'],0);
    			$this->error("修改失败！",U("Forum/Adm/circular"));
    		}
		}
		else
		{
			$this->error('未输入有效字符！',U("Forum/Adm/circular"));
		}
    }
    /**
     * 管理员搜索通告
     * @return [type] [description]
     */
    public function searchCircular()
    {
    	$this->isLoginadm();
        if(IS_POST || $_GET)
        {
	        if(IS_POST){$condition=$_POST;} 
	        else if($_GET){$condition=$_GET;} 

    		$searchLike="%".$condition['for_title']."%";
			$searchCircular['for_title']=array('like',$searchLike);
    		$count =M('tfor_circular')->where($searchCircular)->count();
			if($count)
			{
		        $Page =getpage($count,6);
		        foreach ($condition as $key => $val) 
	            {
	                $Page->parameter[$key] = $val;            
	            }
		        $circular=M('tfor_circular')->where($searchCircular)->order('for_num desc,for_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		        $this->assign('circular',$circular);
		        $this->assign('page',$Page->show());
				$this->display();
			}
			else
			{
				$this->error('没有查询到相关数据！请重新搜索...',U("Forum/Adm/circular"));
			}
    	}
    	else
    	{
    		$this->error('搜索内容为空！',U("Forum/Adm/circular"));
    	}

    }
    /**
     * 管理员删除通告
     * @return [type] [description]
     */
    public function deleteCircular()
    {
    	$this->isLoginadm();
    	$circular['for_num']=$_GET['for_num'];
		$ret=M('tfor_circular')->where($circular)->delete();
		if($ret)
		{
			$this->upRecord("删除通告","ID标识为：".$_GET['for_num']);
			$this->success("删除成功！",U("Forum/Adm/circular"));
		}
		else
		{
			$this->upRecord("删除通告",$_GET['for_num'],0);
			$this->error('删除失败！',U("Forum/Adm/circular"));
		}
    }
    /**
     * 管理员删除论坛用户
     * @return [type] [description]
     */
    public function deleteForumUser()
    {
    	$this->isLoginadm();
    	$user['for_id']=$_GET['for_id'];
		$ret=M('tfor_user')->where($user)->delete();
		if($ret)
		{
			$this->upRecord("删除论坛用户","已删除ID为：".$_GET['for_id']."的论坛用户");
			$this->success("删除成功！",U("Forum/Adm/forumUser"));
		}
		else
		{
			$this->upRecord("删除论坛用户","未成功删除ID为：".$_GET['for_id']."的论坛用户",0);
			$this->error('删除失败！',U("Forum/Adm/forumUser"));
		}
    }
        /**
     * 管理员修改论坛用户
     * @return [type] [description]
     */
    public function alterForumUser()
    {
    	$this->isLoginadm();
    	if(IS_POST)
    	{
    		$searchID['for_id']=$_POST['old_id'];
    		$alterUser['for_id']=$_POST['for_id'];
    		if($_POST['for_password'])
    		{
    			$alterUser['for_password']=$_POST['for_password'];
    		}
    		$ret1=M('tfor_user')->where($searchID)->save($alterUser);
    		$alterDetail['for_id']=$_POST['for_id'];
    		$alterDetail['for_name']=$_POST['for_name'];
    		$alterDetail['for_sex']=$_POST['for_sex'];
    		$alterDetail['for_qq']=$_POST['for_qq'];
    		$alterDetail['for_wechat']=$_POST['for_wechat'];
    		$alterDetail['for_tel']=$_POST['for_tel'];
    		$alterDetail['for_email']=$_POST['for_email'];
    		$alterDetail['for_hometown']=$_POST['for_hometown'];
    		$alterDetail['for_constellation']=$_POST['for_constellation'];
    		$alterDetail['for_signature']=$_POST['for_signature'];
    		$ret2=M('tfor_detail')->where($searchID)->save($alterDetail);
;
			$this->updateUserValue($_POST['for_id'],$_POST['for_value']);
			$this->upRecord("修改论坛用户","论坛用户old id: ".$_POST['old_id']."new id: ".$_POST['for_id']);
    		$this->success("修改成功！",U('Forum/Adm/forumUser'));
    	}
    	else
    	{
    		$user['tfor_user.for_id']=$_GET['for_id'];
    		$userInfo=M('tfor_detail')->join('LEFT JOIN tfor_user ON tfor_detail.for_id=tfor_user.for_id')->where($user)->find();
    		$this->assign('for',$userInfo);
    		$this->display();

    	}
    }
    /**
     * 管理论坛用户
     * @return [type] [description]
     */
    public function forumUser()
    {
    	$this->isLoginadm();
    	if(IS_POST)
    	{
		    $addForumUser['for_id']=$_POST['for_id'];
			$addForumUserDetail['for_id']=$_POST['for_id'];
			$addForumUserDetail['for_name']=$_POST['for_id'];
		    if($_POST['for_password'])
		    {
	    		$addForumUser['for_password']=$_POST['for_password'];
		    }
		    else
		    {
		    	$addForumUser['for_password']=$_POST['for_id'];
		    }
			$ret1=M('tfor_user')->add($addForumUser);
			$ret2=M('tfor_detail')->add($addForumUserDetail);
			if($ret1 && $ret2)
			{
				$this->upRecord('添加论坛用户',"新用户ID为：".$_POST['for_id']);
				$this->success("添加论坛用户成功！");
			}
			else
			{
				$this->upRecord('添加论坛用户',"未成功添加的用户ID为：".$_POST['for_id'],0);
				$this->error("添加论坛用户失败！");
			}

    	}
    	else
    	{
	        $count =M('tfor_detail')->count();
	        $Page =getpage($count,10);
	        $forumUser=M('tfor_detail')->join('LEFT JOIN tfor_user ON tfor_detail.for_id=tfor_user.for_id')->order('tfor_detail.for_id')->limit($Page->firstRow.','.$Page->listRows)->select();
	        $this->assign('forumUser',$forumUser);
	        $this->assign('page',$Page->show());
			$this->display();
    	}
    }
    /**
     * 管理员搜索论坛用户
     * @return [type] [description]
     */
    public function searchForumUser()
    {
    	$this->isLoginadm();
        if(IS_POST || $_GET)
        {
	        if(IS_POST){$condition=$_POST;} 
	        else if($_GET){$condition=$_GET;} 

    		$searchLike="%".$condition['for_id']."%";
			$searchUser['tfor_detail.for_id']=array('like',$searchLike);
    		$count =M('tfor_detail')->where($searchUser)->count();
			if($count)
			{
		        $Page =getpage($count,6);
		        foreach ($condition as $key => $val) 
	            {
	                $Page->parameter[$key] = $val;            
	            }
		        $forumUser=M('tfor_detail')->where($searchUser)->join('LEFT JOIN tfor_user ON tfor_detail.for_id=tfor_user.for_id')->order('tfor_detail.for_id desc,tfor_detail.for_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		        $this->assign('forumUser',$forumUser);
		        $this->assign('page',$Page->show());
				$this->display();
			}
			else
			{
				$this->error('没有查询到相关数据！请重新搜索...',U("Forum/Adm/forumUser"));
			}
    	}
    	else
    	{
    		$this->error('搜索内容为空！',U("Forum/Adm/forumUser"));
    	}

    }
    /**
     * 管理员操作记录表的更新
     * @return [type] [description]
     */
    protected function upRecord($item,$content,$result=1)
    {
    	$record['adm_name']=$_SESSION['admName'];
    	$record['for_item']=$item;
    	$record['for_content']=$content;
    	$record['for_result']=$result;
		$ret=M('tfor_record')->add($record);
    }
    /**
     * 查看操作记录(时间顺序)
     * @return [type] [description]
     */
    public function showRecord()
    {
    	$condition='for_time desc';
    	$this->orderRecord($condition);
    }
     /**
     * 分类查看操作记录
     * @return [type] [description]
     */
    protected function orderRecord($orderCondition,$pageCount=20)
    {
    	$this->isLoginadm();
		$count =M('tfor_record')->count();
		$Page =getpage($count,$pageCount);
		$record=M('tfor_record')->order($orderCondition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('record',$record);
		$this->assign('page',$Page->show());
		$this->display();
    }
    /**
     * 查看操作记录(项目类别顺序)
     * @return [type] [description]
     */
    public function showRecordItem()
    {
    	$condition='for_content desc,for_time desc';
    	$this->orderRecord($condition);
    }
     /**
     * 查看操作记录(按管理员顺序)
     * @return [type] [description]
     */
    public function showRecordAdmin()
    {
    	$condition='adm_name desc,for_time desc';
    	$this->orderRecord($condition);
    }
}